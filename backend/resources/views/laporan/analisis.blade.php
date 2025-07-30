<!DOCTYPE html>
<html>
<head>
    <title>Analisis Aduan Masyarakat</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .header { text-align: center; margin-bottom: 20px; }
        .header h2 { margin-bottom: 5px; }
        .header p { margin-top: 0; color: #555; }
        .periode { text-align: right; font-style: italic; }
        .section { margin-bottom: 30px; }
        .section h3 { border-bottom: 1px solid #ddd; padding-bottom: 5px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        table, th, td { border: 1px solid #ddd; }
        th, td { padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .chart { margin-top: 20px; height: 200px; border: 1px solid #eee; }
        .footer { margin-top: 50px; text-align: right; font-size: 12px; }
    </style>
</head>
<body>
    <div class="header">
        <h2>ANALISIS PENGADUAN MASYARAKAT</h2>
        <p>Dinas Pelayanan Masyarakat Kota Yogyakarta</p>
    </div>

    <div class="periode">
        Periode: {{ $periode }}
    </div>

    <div class="section">
        <h3>Statistik Pengaduan</h3>
        <table>
            <tr>
                <th>Total Pengaduan</th>
                <td>{{ $total_pengaduan }}</td>
            </tr>
            <tr>
                <th>Pengaduan Bulan Ini</th>
                <td>{{ $pengaduan_bulan_ini }}</td>
            </tr>
            <tr>
                <th>Kategori Terbanyak</th>
                <td>{{ $kategori_terbanyak }}</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <h3>Distribusi Status (Grafik Sederhana)</h3>
        <div style="margin-top: 20px;">
            @foreach($status_distribusi as $status)
            <div style="margin-bottom: 10px;">
                <div style="display: flex; align-items: center;">
                    <div style="width: 100px; margin-right: 10px;">
                        {{ ucfirst($status->status_laporan) }}
                    </div>
                    <div style="flex-grow: 1; background: #f0f0f0; height: 20px;">
                        <div style="background: #3490dc; width: {{ ($status->total/$max_total)*100 }}%; height: 100%;"></div>
                    </div>
                    <div style="width: 50px; text-align: right; margin-left: 10px;">
                        {{ $status->total }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="section">
        <h3>Trend Bulanan ({{ date('Y') }})</h3>
        <table>
            <tr>
                <th>Bulan</th>
                <th>Jumlah Pengaduan</th>
            </tr>
            @for($i = 1; $i <= 12; $i++)
            <tr>
                <td>{{ date('F', mktime(0, 0, 0, $i, 1)) }}</td>
                <td>
                    {{ $trend_bulanan->where('bulan', $i)->first()->total ?? 0 }}
                </td>
            </tr>
            @endfor
        </table>
    </div>

    <div class="footer">
        <p>Dicetak pada: {{ date('d F Y H:i:s') }}</p>
        {{-- <p>Petugas: {{ auth()->user()->name }}</p> --}}
    </div>
</body>
</html>
