@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
<div class="container">
    <h1 class="h3 mb-3">Edit Kategori</h1>

    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label for="nama_kategori" class="form-label">Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control" value="{{ old('nama_kategori', $kategori->nama_kategori) }}" required>
        </div>

       
    </form>
</div>
@endsection
