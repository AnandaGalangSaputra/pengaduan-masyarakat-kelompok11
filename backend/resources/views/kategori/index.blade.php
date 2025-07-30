@extends('layouts.app')

@section('title', 'Daftar Kategori')

@section('content')
<div class="container">
    <h1 class="h3 mb-3">Manajemen Kategori</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('kategori.create') }}" class="btn btn-primary mb-3">+ Tambah Kategori</a>

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Kategori</th>
                        <th>Deskripsi</th>
                        <th>Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kategoris as $kategori)
                    <tr>
                        <td>{{ $kategori->nama_kategori }}</td>
                        <td>{{ $kategori->deskripsi }}</td>
                        <td>{{ $kategori->created_at->format('d M Y') }}</td>
                        <td>
                            <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" style="display:inline-block;">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Yakin hapus kategori?')" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-3">
                {{ $kategoris->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
