<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use Illuminate\Support\Str;

class PengaduanController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul_laporan' => 'required|string|max:255',
            'nama' => 'required|string|max:100',
            'ktp' => 'required|string|max:20', // ganti dari no_ktp
            'kategori' => 'required|string|max:50',
            'lokasi_kejadian' => 'required|string|max:255',
            'isi_laporan' => 'required|string',
            'bukti_foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'setuju' => 'required|in:1',
        ]);

        $path = $request->file('bukti_foto')->store('pengaduan_foto', 'public');

        $pengaduan = Pengaduan::create([
            'judul_laporan' => $validated['judul_laporan'],
            'nama' => $validated['nama'],
            'ktp' => $validated['ktp'], // ganti dari no_ktp
            'kategori' => $validated['kategori'],
            'lokasi_kejadian' => $validated['lokasi_kejadian'],
            'isi_laporan' => $validated['isi_laporan'],
            'bukti_foto' => $path,
            'setuju' => true,
            'tiket_lacak' => strtoupper('TIKET-' . Str::random(10)),
        ]);

        return response()->json(['message' => 'Pengaduan berhasil disimpan'], 201);
    }

    public function tampil()
    {
        $pengaduan = Pengaduan::all();
        return response()->json($pengaduan);
    }

    public function lacak(Request $request)
    {
        $tiket = $request->query('tiket');
        $ktp = $request->query('ktp');
    
        if (!$tiket || !$ktp) {
            return response()->json(['message' => 'Tiket dan KTP harus diisi.'], 400);
        }
    
        $pengaduan = Pengaduan::where('tiket_lacak', $tiket)
        ->where('ktp', $ktp) // ganti dari no_ktp
        ->first();
    
    
        if (!$pengaduan) {
            return response()->json(['message' => 'Pengaduan tidak ditemukan.'], 404);
        }
    
        return response()->json($pengaduan);
    }
    
}
