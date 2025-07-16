@extends('layouts.app')

@section('title', 'Tindak Pengaduan')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-3 text-gray-800 fw-bold">Tindak Laporan Pengaduan</h1>

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('pengaduan.prosesTindak', $pengaduan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Tanggapan --}}
                <div class="mb-3">
                    <label for="tanggapan" class="form-label fw-bold">Tanggapan</label>
                    <textarea name="tanggapan" id="tanggapan" rows="4" class="form-control" required>{{ old('tanggapan') }}</textarea>
                </div>

                {{-- Status Laporan --}}
                <div class="mb-3">
                    <label for="status_laporan" class="form-label fw-bold">Status Laporan</label>
                    <select name="status_laporan" id="status_laporan" class="form-control" required>
                        <option value="">-- Pilih Status --</option>
                        <option value="diteruskan">Diteruskan</option>
                        <option value="ditolak">Ditolak</option>
                    </select>
                </div>

                {{-- Instansi jika diteruskan --}}
                <div class="mb-3" id="instansi-box" style="display: none;">
                    <label for="diteruskan_ke" class="form-label fw-bold">Diteruskan ke Instansi</label>
                    <input type="text" name="diteruskan_ke" id="diteruskan_ke" class="form-control" placeholder="Contoh: Polsek Depok Barat">
                </div>

                {{-- Tombol Print Surat --}}
                <div class="mb-3" id="print-box" style="display: none;">
                    <a href="{{ route('pengaduan.cetak', $pengaduan->id) }}" target="_blank" class="btn btn-secondary">
                        <i class="fas fa-print"></i> Print Surat
                    </a>
                </div>


                {{-- Upload Surat --}}
                <div class="mb-3" id="surat">
                    <label for="surat" class="form-label fw-bold">Upload Surat (Opsional)</label>
                    <input type="file" name="surat" id="surat" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
                    <small class="form-text text-muted">Format yang diizinkan: PDF, JPG, PNG. Maksimal 2MB.</small>
                </div>

                {{-- Tombol --}}
                <div class="d-flex justify-content-start gap-2">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Simpan Tindakan
                    </button>
                    <a href="{{ route('pengaduan_masuk.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const statusSelect = document.getElementById('status_laporan');
        const instansiBox = document.getElementById('instansi-box');
        const printBox = document.getElementById('print-box');
        const surat = document.getElementById('surat');

        function handleStatusChange() {
            const status = statusSelect.value;

            // Tampilkan kolom instansi dan tombol print jika status diteruskan
            if (status === 'diteruskan') {
                instansiBox.style.display = 'block';
                printBox.style.display = 'block';
                surat.style.display = 'block';
            } else {
                instansiBox.style.display = 'none';
                printBox.style.display = 'none';
                surat.style.display = 'none';
            }
        }

        statusSelect.addEventListener('change', handleStatusChange);

        // Jalankan sekali saat halaman pertama kali dimuat
        handleStatusChange();
    });
</script>

@endsection
