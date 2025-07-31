@extends('layouts.app')

@section('title', 'Tambah Pengguna')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 fw-bold">Tambah Pengguna</h1>
    <p class="mb-4">Isi form berikut untuk menambahkan pengguna baru.</p>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" value="{{ old('nama') }}" required>
                    @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" required>
                    @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="role">Role</label>
                    <select name="role" class="form-control" required>
                        <option value="">-- Pilih Role --</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                    @error('role') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="no_hp">No HP</label>
                    <input type="text" class="form-control" name="no_hp" value="{{ old('no_hp') }}">
                    @error('no_hp') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
