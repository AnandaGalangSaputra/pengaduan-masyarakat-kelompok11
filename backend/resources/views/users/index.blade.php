@extends('layouts.app')

@section('title', 'Manajemen Pengguna')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 fw-bold">Manajemen Pengguna</h1>
    <p class="mb-4">
        Kelola data pengguna di sistem ini. Anda dapat menambahkan, mengedit, dan menghapus pengguna.
    </p>

    <div class="mb-3">
        <a href="{{ route('users.create') }}" class="btn btn-success">+ Tambah Pengguna</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Pengguna</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('users.bulkDelete') }}" method="POST" onsubmit="return confirm('Hapus semua data terpilih?')">
                @csrf
                @method('DELETE')
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="select-all"></th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>No HP</th>
                                <th>Dibuat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $u)
                            <tr>
                                <td><input type="checkbox" name="ids[]" value="{{ $u->id }}"></td>
                                <td>{{ $u->nama }}</td>
                                <td>{{ $u->email }}</td>
                                <td>
                                    <span class="badge {{ $u->role == 'admin' ? 'badge-primary' : 'badge-secondary' }}">
                                        {{ ucfirst($u->role) }}
                                    </span>
                                </td>
                                <td>{{ $u->no_hp }}</td>
                                <td>{{ $u->created_at->format('d-m-Y') }}</td>
                                <td>
                                    <a href="{{ route('users.edit', $u->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('users.destroy', $u->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus pengguna ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-danger">Hapus Terpilih</button>
                </div>
            </form>
            <div class="d-flex justify-content-center mt-4">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('select-all').onclick = function() {
        let checkboxes = document.getElementsByName('ids[]');
        for (let checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    }
</script>
@endsection
