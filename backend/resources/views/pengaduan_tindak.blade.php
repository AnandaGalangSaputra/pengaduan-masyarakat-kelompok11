@extends('layouts.app')

@section('title', 'Tindak Pengaduan')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-3 text-gray-800">Tindak Laporan Pengaduan</h1>

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('pengaduan.prosesTindak', $pengaduan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="tanggapan" class="form-label">Tanggapan</label>
                    <textarea name="tanggapan" id="tanggapan" rows="4" class="form-control" required>{{ old('tanggapan') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="status_laporan" class="form-label">Status Laporan</label>
                    <select name="status_laporan" id="status_laporan" class="form-control" required>
                        <option value="">-- Pilih Status --</option>
                        <option value="diteruskan">Diteruskan</option>
                        <option value="ditolak">Ditolak</option>
                    </select>
                </div>
                <div class="mb-3" id="instansi-box" style="display: none;">
                    <label for="diteruskan_ke" class="form-label">Diteruskan ke Instansi</label>
                    <input type="text" name="diteruskan_ke" id="diteruskan_ke" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="surat" class="form-label">Upload Surat (Opsional)</label>
                    <input type="file" name="surat" id="surat" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
                </div>


                <button type="submit" class="btn btn-success">Simpan Tindakan</button>
                <a href="{{ route('pengaduan_masuk.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>

<script>
    const statusSelect = document.getElementById('status_laporan');
    const instansiBox = document.getElementById('instansi-box');

    statusSelect.addEventListener('change', function() {
        instansiBox.style.display = this.value === 'diteruskan' ? 'block' : 'none';
    });
</script>

@endsection
