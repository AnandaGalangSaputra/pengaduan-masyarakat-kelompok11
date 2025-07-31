@extends('layouts.app')

@section('title', 'Edit Pengguna')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 fw-bold">Edit Pengguna</h1>
    <p class="mb-4">Perbarui data pengguna berikut.</p>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" value="{{ old('nama', $user->nama) }}" required>
                    @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" required>
                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="password">Password (Kosongkan jika tidak diubah)</label>
                    <input type="password" class="form-control" name="password">
                    @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="role">Role</label>
                    <select name="role" class="form-control" required>
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                    </select>
                    @error('role') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="no_hp">No HP</label>
                    <input type="text" class="form-control" name="no_hp" value="{{ old('no_hp', $user->no_hp) }}">
                    @error('no_hp') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
