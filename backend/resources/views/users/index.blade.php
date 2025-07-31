@extends('layouts.app')

@section('title', 'Manajemen Pengguna')

@section('content')
<style>
    .action-buttons a, .action-buttons form {
        display: inline-block;
    }
</style>

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 fw-bold">Manajemen Pengguna</h1>
    <p class="mb-4">
        Kelola data pengguna di sistem ini. Anda dapat menambahkan, mengedit, dan menghapus pengguna.
    </p>

    <!-- Tombol Tambah -->
    <div class="mb-3">
        <a href="{{ route('users.create') }}" class="btn btn-success">+ Tambah Pengguna</a>
        <button type="button" id="bulk-delete-btn" class="btn btn-danger">Hapus Terpilih</button>
    </div>

    <!-- Tabel Pengguna -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Pengguna</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
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
                            <td class="action-buttons">
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

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Script AJAX Bulk Delete -->
<script>
    // Centang semua checkbox
    document.getElementById('select-all').onclick = function () {
        let checkboxes = document.getElementsByName('ids[]');
        for (let checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    };

    // Tombol Bulk Delete
    document.getElementById('bulk-delete-btn').onclick = function () {
        let checked = document.querySelectorAll("input[name='ids[]']:checked");
        if (checked.length === 0) {
            alert("Pilih minimal satu pengguna untuk dihapus.");
            return;
        }

        if (!confirm("Yakin ingin menghapus pengguna terpilih?")) return;

        let ids = Array.from(checked).map(cb => cb.value);

        fetch("{{ route('users.bulkDelete') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ ids: ids })
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === "success") {
                alert(data.message);
                location.reload(); // reload tabel setelah hapus
            } else {
                alert(data.message || "Terjadi kesalahan.");
            }
        })
        .catch(err => console.error(err));
    };
</script>
@endsection
