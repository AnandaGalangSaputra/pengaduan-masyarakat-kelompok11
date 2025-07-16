@extends('layouts.app')

@section('title', 'Pengaduan Masuk')

@section('content')

    <style>
        .action-buttons a {
            position: relative;
            z-index: 2;
        }
    </style>

    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800 fw-bold">Pengaduan Masuk</h1>
        <p class="mb-4">
            Berikut ini adalah daftar pengaduan yang masuk dari masyarakat. Anda dapat melihat detail pengaduan,
            memberikan tanggapan, mengubah status pengaduan, dan mencetak laporan formal ke instansi berwajib.
        </p>


        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Laporan Masuk</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Judul Laporan</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Lokasi Kejadian</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengaduans as $p)
                                <tr style="cursor: pointer;"
                                    onclick="window.location='{{ route('pengaduan.show', $p->id) }}'"
                                    onmouseover="this.style.backgroundColor='#f8f9fa'"
                                    onmouseout="this.style.backgroundColor='white'">
                                    <td>{{ $p->judul_laporan }}</td>
                                    <td>{{ $p->nama }}</td>
                                    <td>{{ $p->kategori }}</td>
                                    <td>{{ $p->lokasi_kejadian }}</td>
                                    <td>
                                        @if ($p->status_laporan == 'diproses')
                                            @if ($p->status_waktu == 'baru')
                                                <span class="badge badge-primary">Baru</span>
                                            @else
                                                <span class="badge badge-warning text-dark">Diproses</span>
                                            @endif
                                        @elseif ($p->status_laporan == 'diteruskan')
                                            <span class="badge badge-info">Diteruskan</span>
                                        @elseif ($p->status_laporan == 'selesai')
                                            <span class="badge badge-success">Selesai</span>
                                        @else
                                            <span class="badge badge-danger">{{ ucfirst($p->status_laporan) }}</span>
                                        @endif
                                    </td>
                                    <td class="action-buttons" style="pointer-events: auto;">
                                        {{-- <a href="{{ route('pengaduan.cetak', $p->id) }}" class="btn btn-sm btn-secondary">
                                            <i class="fas fa-print"></i> Print Surat
                                        </a> --}}
                                        <a href="{{ route('pengaduan.show', $p->id) }}"
                                            class="btn btn-sm btn-primary">Lihat</a>
                                        <a href="{{ route('pengaduan.tindak', $p->id) }}"
                                            class="btn btn-sm btn-warning">Tindak</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                    <div class="d-flex justify-content-center mt-4">
                        {{ $pengaduans->links() }}
                    </div>
                </div>
            </div>
        </div>
        <p class="mb-4 text-danger">
            *Mohon print surat pengaduan terlebih dahulu untuk disampaikan ke Pengguna sebelum melakukan tindak. Pastikan
            semua data sudah lengkap dan benar sebelum mencetak.
        </p>
    </div>
@endsection
