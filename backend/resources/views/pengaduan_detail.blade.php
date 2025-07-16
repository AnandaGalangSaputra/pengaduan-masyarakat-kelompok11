@extends('layouts.app')

@section('title', 'Detail Pengaduan')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-3 text-gray-800">Detail Laporan Pengaduan</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3">Judul Laporan</dt>
                <dd class="col-sm-9">{{ $pengaduan->judul_laporan }}</dd>

                <dt class="col-sm-3">Nama Pelapor</dt>
                <dd class="col-sm-9">{{ $pengaduan->nama }}</dd>

                <dt class="col-sm-3">No. KTP</dt>
                <dd class="col-sm-9">{{ $pengaduan->ktp }}</dd>

                <dt class="col-sm-3">Kategori</dt>
                <dd class="col-sm-9">{{ $pengaduan->kategori }}</dd>

                <dt class="col-sm-3">Lokasi Kejadian</dt>
                <dd class="col-sm-9">{{ $pengaduan->lokasi_kejadian }}</dd>

                <dt class="col-sm-3">Isi Laporan</dt>
                <dd class="col-sm-9">{{ $pengaduan->isi_laporan }}</dd>

                <dt class="col-sm-3">Status</dt>
                <dd class="col-sm-9">
                    <span class="badge badge-{{
                        $pengaduan->status_laporan == 'diproses' ? 'warning' :
                        ($pengaduan->status_laporan == 'diteruskan' ? 'info' :
                        ($pengaduan->status_laporan == 'selesai' ? 'success' : 'danger'))
                    }}">
                        {{ ucfirst($pengaduan->status_laporan) }}
                    </span>
                </dd>

                <dt class="col-sm-3">Bukti Foto</dt>
                <dd class="col-sm-9">
                    @if ($pengaduan->bukti_foto)
                        <img src="{{ asset('storage/bukti/' . $pengaduan->bukti_foto) }}" alt="Bukti Foto" class="img-fluid" style="max-width: 400px;">
                    @else
                        <p class="text-muted">Tidak ada foto</p>
                    @endif
                </dd>

                <dt class="col-sm-3">Tanggal Lapor</dt>
                <dd class="col-sm-9">{{ $pengaduan->created_at->format('d M Y H:i') }}</dd>
            </dl>

            <a href="{{ route('pengaduan_masuk.index') }}" class="btn btn-secondary">Kembali</a>
            <a class="btn btn-danger">Hapus Pengaduan</a>
        </div>
    </div>
</div>
@endsection
