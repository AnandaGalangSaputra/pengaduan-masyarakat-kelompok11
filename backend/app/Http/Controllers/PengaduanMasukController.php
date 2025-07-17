<?php

namespace App\Http\Controllers;

use App\Models\log_status_pengaduan;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
// use PDF;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Svg\Tag\Rect;

class PengaduanMasukController extends Controller
{

    public function index()
    {
        $pengaduans = Pengaduan::where('status_laporan', 'diproses')
            ->orderBy('created_at', 'desc')
            ->simplePaginate(10);

        foreach ($pengaduans as $pengaduan) {
            $pengaduan->status_waktu = Carbon::parse($pengaduan->created_at)->diffInHours(now()) < 24 ? 'baru' : 'diproses';
        }

        return view('pengaduan_masuk', compact('pengaduans'));
    }



    public function show($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        return view('pengaduan_detail', compact('pengaduan'));
    }


    public function cetak($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $pdf = Pdf::loadView('laporan.cetak', compact('pengaduan'));
        return $pdf->stream('Laporan-Pengaduan-' . $pengaduan->id . '.pdf');
    }

    public function tindak($id)
    {
        try {
            $pengaduan = Pengaduan::findOrFail($id);
            return view('pengaduan_tindak', compact('pengaduan'))->with('success', 'Data pengaduan berhasil ditemukan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menemukan data pengaduan!');
        }
    }
    public function prosesTindak(Request $request, $id)
    {
        $request->validate([
            'tanggapan' => 'required|string',
            'status_laporan' => 'required|in:diteruskan,selesai,ditolak',
            'surat' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->status_laporan = $request->status_laporan;
        $pengaduan->tanggapan = $request->tanggapan;

        if ($request->hasFile('surat')) {
            $file = $request->file('surat');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/surat', $namaFile);
            $pengaduan->surat_tindak = $namaFile;
        }

        $pengaduan->save();

        log_status_pengaduan::create([
            'pengaduan_id' => $pengaduan->id,
            'status_laporan' => $request->status_laporan,
            'catatan' => $request->tanggapan,
            'waktu_perubahan' => now(),
            // 'petugas_id' => auth()->id(), // pastikan user login
            'diteruskan_ke' => $request->status_laporan === 'diteruskan' ? $request->diteruskan_ke : null,
        ]);

        return redirect()->route('pengaduan_masuk.index')->with('success', 'Pengaduan berhasil ditindaklanjuti.');
    }

    public function cetakAnalisis()
    {
        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();
        $status_distribusi = Pengaduan::select('status_laporan', DB::raw('COUNT(*) as total'))
            ->groupBy('status_laporan')
            ->get();
        $max_total = $status_distribusi->max('total') ?? 1; // Default 1 jika tidak ada data

        $data = [
            'periode' => $startDate->format('d M Y') . ' - ' . $endDate->format('d M Y'),
            'total_pengaduan' => Pengaduan::count(),
            'pengaduan_bulan_ini' => Pengaduan::whereBetween('created_at', [$startDate, $endDate])->count(),
            'kategori_terbanyak' => Pengaduan::select('kategori')
                ->groupBy('kategori')
                ->orderByRaw('COUNT(*) DESC')
                ->first()->kategori ?? '-',
            'status_distribusi' => $status_distribusi,
            'trend_bulanan' => Pengaduan::select(DB::raw('MONTH(created_at) as bulan'), DB::raw('COUNT(*) as total'))
                ->whereYear('created_at', date('Y'))
                ->groupBy('bulan')
                ->get(),
            'max_total' => $max_total,
        ];


        $pdf = PDF::loadView('laporan.analisis', $data)
            ->setPaper('A4', 'portrait')
            ->setOptions([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
                'defaultFont' => 'sans-serif'
            ]);
        return $pdf->stream('analisis-aduan-' . date('Y-m-d') . '.pdf');
    }
    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids');

        if ($ids) {
            Pengaduan::whereIn('id', $ids)->delete();
            return redirect()->back()->with('success', 'Data berhasil dihapus!');
        }

        return redirect()->back()->with('error', 'Tidak ada data yang dipilih!');
    }

    public function riwayatPengaduan(Request $request)
    {
        // Ambil filter tanggal jika ada
        $start = $request->input('start_date');
        $end = $request->input('end_date');

        // Query hanya pengaduan yang sudah diteruskan
        $query = Pengaduan::where('status_laporan', 'diteruskan');

        // Filter berdasarkan tanggal jika tersedia
        if ($start && $end) {
            $query->whereBetween('created_at', [
                Carbon::parse($start)->startOfDay(),
                Carbon::parse($end)->endOfDay()
            ]);
        }

        $pengaduans = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('riwayat_pengaduan', compact('pengaduans', 'start', 'end'));
    }
}
