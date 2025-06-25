<?php

namespace App\Http\Controllers;

use App\Models\Kategori_Pengaduan;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\TelegramUser;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PengaduanController extends Controller
{
    public function store(Request $request)
    {

        $validated = $request->validate([
            'judul_laporan' => 'required|string|max:255',
            'nama' => 'required|string|max:100',
            'ktp' => 'required|string|max:20',
            'telegram_username' => 'required|string|max:100', // pakai username, bukan id
            'kategori' => 'required|string|max:50',
            'lokasi_kejadian' => 'required|string|max:255',
            'isi_laporan' => 'required|string',
            'bukti_foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'setuju' => 'required|in:1',
        ]);


        $path = $request->file('bukti_foto')->store('pengaduan_foto', 'public');

        // Ambil chat_id berdasarkan username dari DB
        $username = ltrim($validated['telegram_username'], '@');
        $chat_id = TelegramUser::where('username', $username)->value('chat_id');

        if (!$chat_id) {
            return response()->json(['error' => 'Username Telegram belum start bot atau tidak ditemukan.'], 422);
        }


        $pengaduan = Pengaduan::create([
            'judul_laporan' => $validated['judul_laporan'],
            'nama' => $validated['nama'],
            'ktp' => $validated['ktp'],
            'telegram_id' => $chat_id,
            'kategori' => $validated['kategori'],
            'lokasi_kejadian' => $validated['lokasi_kejadian'],
            'isi_laporan' => $validated['isi_laporan'],
            'bukti_foto' => $path,
            'setuju' => true,
            'tiket_lacak' => strtoupper('TIKET-' . Str::random(10)),
        ]);

        // Kirim notifikasi ke Telegram (
        try {
            $token = env('TELEGRAM_BOT_TOKEN');
            $tanggal = now()->format('d F Y');

            $text = "📝 *Laporan Pengaduan Baru Telah Diterima!*\n\n"
                . "📌 *Judul:* {$pengaduan->judul_laporan}\n"
                . "🧑‍💼 *Nama Pelapor:* {$pengaduan->nama}\n"
                . "🆔 *Nomor KTP:* {$pengaduan->ktp}\n"
                . "🏷️ *Kategori:* {$pengaduan->kategori}\n"
                . "📍 *Lokasi Kejadian:* {$pengaduan->lokasi_kejadian}\n"
                . "🗒️ *Isi Laporan:*\n{$pengaduan->isi_laporan}\n\n"
                . "📨 *Nomor Tiket:* `{$pengaduan->tiket_lacak}`\n"
                . "📅 *Tanggal:* {$tanggal}\n\n"
                . "Terima kasih telah melaporkan. Tim kami akan menindaklanjuti laporan ini. 🙏";

            Http::post("https://api.telegram.org/bot{$token}/sendMessage", [
                'chat_id' => $chat_id,
                'text' => $text,
                'parse_mode' => 'Markdown'
            ]);
        } catch (\Exception $e) {
            Log::error('Gagal kirim ke Telegram:', [$e->getMessage()]);
        }

        return response()->json(['message' => 'Pengaduan berhasil disimpan'], 201);
    }


    public function tampil()
    {
        $pengaduan = Pengaduan::all();
        return response()->json($pengaduan);
    }

    public function getKategori()
    {
        $kategori = Kategori_Pengaduan::all();
        return response()->json($kategori);
    }



    public function lacak(Request $request)
    {
        $tiket = $request->query('tiket');
        $ktp = $request->query('ktp');

        if (!$tiket || !$ktp) {
            return response()->json(['message' => 'Tiket dan KTP harus diisi.'], 400);
        }

        $pengaduan = Pengaduan::where('tiket_lacak', $tiket)
        ->where('ktp', $ktp)
        ->first();


        if (!$pengaduan) {
            return response()->json(['message' => 'Pengaduan tidak ditemukan.'], 404);
        }

        return response()->json($pengaduan);
    }

}
