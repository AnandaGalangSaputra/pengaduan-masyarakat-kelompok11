<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
    // Ambil data dari tabel pengaduan
    $data = DB::table('pengaduan')
        ->select(DB::raw("DATE_FORMAT(created_at, '%m') as bulan"), DB::raw("COUNT(*) as jumlah"))
        ->whereYear('created_at', date('Y')) // hanya tahun ini
        ->groupBy('bulan')
        ->orderBy('bulan', 'ASC')
        ->get()
        ->pluck('jumlah', 'bulan'); // format: ['01' => 5, '03' => 8, ...]

    // Inisialisasi semua bulan 01–12
    $labels = [
        '01' => 'Januari', '02' => 'Februari', '03' => 'Maret',
        '04' => 'April', '05' => 'Mei', '06' => 'Juni',
        '07' => 'Juli', '08' => 'Agustus', '09' => 'September',
        '10' => 'Oktober', '11' => 'November', '12' => 'Desember',
    ];

    // Gabungkan data dari DB dengan semua bulan, isi kosong jadi 0
    $values = [];
    foreach ($labels as $num => $name) {
        $values[] = $data->get($num, 0); // get jumlah jika ada, kalau tidak isi 0
    }

    $chartData = [
        'diproses' => DB::table('pengaduan')->where('status_laporan', 'diproses')->count(),
        'selesai'  => DB::table('pengaduan')->where('status_laporan', 'selesai')->count(),
        'ditolak'  => DB::table('pengaduan')->where('status_laporan', 'ditolak')->count(),
    ];
    // Kirim ke view
    return view('dashboard', [
        'labels' => array_values($labels),
        'values' => $values,
        'chartData' => $chartData,
    ]);
    }
}
