<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>LAPORAN RESMI PENGADUAN MASYARAKAT</title>
    <style>
        /* Gaya Utama */
        @page { margin: 2.5cm; size: A4; }
        body {
            font-family: "Book Antiqua", "Times New Roman", serif;
            font-size: 12pt;
            line-height: 1.6;
            color: #000;
        }

        /* Header */
        .letterhead {
            border-bottom: 3px double #000;
            padding-bottom: 15px;
            margin-bottom: 25px;
        }
        .letterhead img.logo {
            height: 85px;
            float: left;
            margin-right: 20px;
        }
        .letterhead .institution {
            text-align: center;
            padding-top: 10px;
        }
        .letterhead .institution h1 {
            font-size: 14pt;
            margin: 0;
            letter-spacing: 1.5px;
        }
        .letterhead .institution p {
            font-size: 11pt;
            margin: 3px 0;
            font-style: italic;
        }

        /* Nomor Surat */
        .document-number {
            text-align: center;
            font-weight: bold;
            margin: 20px 0;
        }

        /* Konten Utama */
        .content-title {
            text-align: center;
            text-decoration: underline;
            font-size: 13pt;
            margin: 30px 0;
        }

        /* Tabel Data */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
        }
        .data-table tr td {
            padding: 8px 5px;
            vertical-align: top;
            border: 1px solid #ddd;
        }
        .data-table tr td:first-child {
            width: 30%;
            font-weight: bold;
            background-color: #f5f5f5;
        }

        /* Lampiran */
        .attachment {
            margin: 30px 0;
            page-break-inside: avoid;
        }
        .attachment img {
            max-width: 150px;
            border: 1px solid #aaa;
            margin: 5px;
        }

        /* Tanda Tangan */
        .signature-block {
            margin-top: 80px;
            float: right;
            width: 50%;
        }
        .signature-line {
            border-bottom: 1px solid #000;
            width: 70%;
            margin: 60px 0 5px;
        }
        .official-stamp {
            position: absolute;
            right: 100px;
            opacity: 0.9;
            z-index: -1;
        }

        /* Footer */
        .footer-note {
            font-size: 10pt;
            border-top: 1px solid #000;
            margin-top: 100px;
            padding-top: 10px;
            text-align: center;
            font-style: italic;
        }
    </style>
</head>
<body>
    <!-- Kop Surat Resmi -->
    <div class="letterhead">
        <img src="" alt="Logo Jogja">
        <div class="institution">
            <h1>PEMERINTAH KOTA YOGYAKARTA</h1>
            <h1>DINAS PELAYANAN MASYARAKAT</h1>
            <p>Jalan Malioboro No. 10, Yogyakarta | Telp. (0274) 555555</p>
            <p>Email: pengaduan@yogyakarta.go.id | Website: www.yogyakarta.go.id</p>
        </div>
        <div style="clear: both;"></div>
    </div>

    <!-- Nomor Surat -->
    <div class="document-number">
        NOMOR: {{ $pengaduan->tiket_lacak }}/SPP/{{ date('Y') }}
    </div>

    <!-- Judul Dokumen -->
    <div class="content-title">
        LAPORAN RESMI PENGADUAN MASYARAKAT
    </div>

    <!-- Data Pelapor -->
    <table class="data-table">
        <tr>
            <td colspan="2" style="background-color: #e0e0e0; text-align: center; font-weight: bold;">
                IDENTITAS PELAPOR
            </td>
        </tr>
        <tr>
            <td>Nomor Registrasi</td>
            <td>{{ $pengaduan->tiket_lacak }}</td>
        </tr>
        <tr>
            <td>Tanggal Pengaduan</td>
            <td>{{ $pengaduan->created_at->translatedFormat('l, d F Y \p\u\k\u\l H:i') }} WIB</td>
        </tr>
        <tr>
            <td>Nama Lengkap</td>
            <td>{{ strtoupper($pengaduan->nama) }}</td>
        </tr>
        <tr>
            <td>Nomor Identitas (KTP)</td>
            <td>{{ $pengaduan->ktp }}</td>
        </tr>
        <tr>
            <td>Alamat Lengkap</td>
            <td>{{ $pengaduan->alamat ?: 'Tidak dicantumkan' }}</td>
        </tr>
        <tr>
            <td>Kontak Telepon</td>
            <td>{{ $pengaduan->no_telp ?: '-' }}</td>
        </tr>
    </table>

    <!-- Detail Pengaduan -->
    <table class="data-table">
        <tr>
            <td colspan="2" style="background-color: #e0e0e0; text-align: center; font-weight: bold;">
                DETAIL PENGADUAN
            </td>
        </tr>
        <tr>
            <td>Judul Laporan</td>
            <td>{{ $pengaduan->judul_laporan }}</td>
        </tr>
        <tr>
            <td>Kategori Masalah</td>
            <td>
                {{ ucwords($pengaduan->kategori) }}
                @if($pengaduan->subkategori)
                    <br><small>(Subkategori: {{ $pengaduan->subkategori }})</small>
                @endif
            </td>
        </tr>
        <tr>
            <td>Lokasi Kejadian</td>
            <td>
                {{ $pengaduan->lokasi_kejadian }}<br>
                <small>Koordinat: {{ $pengaduan->koordinat ?: 'Tidak dicantumkan' }}</small>
            </td>
        </tr>
        <tr>
            <td>Waktu Kejadian</td>
            <td>
                {{ $pengaduan->tanggal_kejadian ? \Carbon\Carbon::parse($pengaduan->tanggal_kejadian)->translatedFormat('l, d F Y') : 'Tidak diketahui' }}
                @if($pengaduan->waktu_kejadian)
                    <br>Pukul {{ date('H:i', strtotime($pengaduan->waktu_kejadian)) }} WIB
                @endif
            </td>
        </tr>
        <tr>
            <td>Uraian Lengkap</td>
            <td style="text-align: justify;">
                {{ $pengaduan->isi_laporan }}
            </td>
        </tr>
        <tr>
            <td>Status Penanganan</td>
            <td style="font-weight: bold; color:
                @if($pengaduan->status_laporan == 'selesai') #2e7d32
                @elseif($pengaduan->status_laporan == 'diproses') #fb8c00
                @else #c62828 @endif">
                {{ strtoupper($pengaduan->status_laporan) }}
                @if($pengaduan->updated_at)
                    <br><small>(Terakhir diperbarui: {{ $pengaduan->updated_at->translatedFormat('d/m/Y H:i') }})</small>
                @endif
            </td>
        </tr>
    </table>

    <!-- Lampiran -->
    @if($pengaduan->lampiran)
    <div class="attachment">
        <h3 style="margin-bottom: 10px;">LAMPIRAN DOKUMEN</h3>
        <p style="margin-top: 5px;">Berikut dokumen pendukung yang dilampirkan:</p>
        <div style="margin-top: 15px;">
            @foreach(explode(',', $pengaduan->lampiran) as $file)
                <img src="{{ storage_path('app/public/lampiran/'.$file) }}" alt="Lampiran {{ $loop->iteration }}" style="max-height: 150px;">
            @endforeach
        </div>
    </div>
    @endif

    <!-- Timeline Proses -->
    <h3 style="margin: 30px 0 15px; border-bottom: 1px solid #ddd; padding-bottom: 5px;">
        TIMELINE PROSES PENANGANAN
    </h3>
    <table style="width: 100%; border-collapse: collapse;">
        <tr style="background-color: #f5f5f5;">
            <th style="padding: 8px; text-align: left; width: 20%;">Tanggal</th>
            <th style="padding: 8px; text-align: left; width: 30%;">Status</th>
            <th style="padding: 8px; text-align: left;">Keterangan</th>
        </tr>
        @foreach($pengaduan->timelines ?? [] as $timeline)
        <tr style="border-bottom: 1px solid #eee;">
            <td style="padding: 8px;">{{ $timeline->created_at->format('d/m/Y H:i') }}</td>
            <td style="padding: 8px;">{{ ucfirst($timeline->status) }}</td>
            <td style="padding: 8px;">{{ $timeline->keterangan }}</td>
        </tr>
        @endforeach
        @if(!$pengaduan->timelines || count($pengaduan->timelines) == 0)
        <tr>
            <td colspan="3" style="padding: 15px; text-align: center; font-style: italic;">
                Proses penanganan belum memiliki timeline
            </td>
        </tr>
        @endif
    </table>

    <!-- Tanda Tangan -->
    <div style="position: relative;">
        <img class="official-stamp" src="{{ public_path('images/stamp.png') }}" alt="Cap Resmi" width="120">

        <div class="signature-block">
            <p style="margin-bottom: 50px;">Yogyakarta, {{ now()->translatedFormat('d F Y') }}</p>
            <div class="signature-line"></div>
            <p style="margin: 5px 0; font-weight: bold;">{{ auth()->user()->name ?? '[Nama Petugas]' }}</p>
            <p style="margin: 0; font-size: 11pt;">NIP. {{ auth()->user()->nip ?? '....................' }}</p>
            <p style="margin: 5px 0 0; font-size: 11pt;">Jabatan: Petugas</p>
        </div>
    </div>

    <!-- Catatan Kaki -->
    <div class="footer-note">
        Dokumen ini dicetak secara otomatis oleh Sistem Pengaduan Masyarakat Kota Yogyakarta<br>
        Untuk verifikasi cek status laporan, silakan kunjungi www.yogyakarta.go.id/verify/{{ $pengaduan->tiket_lacak }}
    </div>
</body>
</html>
