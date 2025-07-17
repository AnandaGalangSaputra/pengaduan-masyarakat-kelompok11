@extends('layouts.app')

@section('title', 'Riwayat Pengaduan')

@section('content')
<style>
    .action-buttons a {
        position: relative;
        z-index: 2;
    }
</style>

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 fw-bold">Riwayat Pengaduan</h1>
    <p class="mb-4">
        Berikut adalah riwayat pengaduan yang telah diteruskan. Anda dapat memfilter berdasarkan rentang tanggal dan melihat detail tiap pengaduan.
    </p>

    <!-- Filter Tanggal -->
    <form method="GET" class="mb-4 row g-3">
        <div class="col-md-3">
            <label for="start_date" class="form-label">Tanggal Mulai</label>
            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ request('start_date') }}">
        </div>
        <div class="col-md-3">
            <label for="end_date" class="form-label">Tanggal Akhir</label>
            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ request('end_date') }}">
        </div>
        <div class="col-md-3 d-flex align-items-end">
            <button type="submit" class="btn btn-primary w-100">Filter</button>
        </div>
    </form>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pengaduan Diteruskan</h6>
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
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengaduans as $p)
                            <tr>
                                <td>{{ $p->judul_laporan }}</td>
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->kategori }}</td>
                                <td>{{ $p->lokasi_kejadian }}</td>
                                <td>{{ $p->created_at->format('d M Y') }}</td>
                                <td>
                                    <span class="badge badge-info">Diteruskan</span>
                                </td>
                                <td class="action-buttons">
                                    <a href="{{ route('pengaduan.show', $p->id) }}" class="btn btn-sm btn-primary">Lihat</a>
                                    @if($p->surat_tindak)
                                    <a href="{{ asset('storage/surat/' . $p->surat_tindak) }}" target="_blank" class="btn btn-sm btn-secondary">Surat</a>
                                    @endif
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
</div>
@endsection
