<template>
    <div class="halaman-error min-vh-100 d-flex align-items-center justify-content-center bg-light">
        <div class="konten-error text-center p-4">
            <h1 class="kode-error display-1 fw-bold text-dark mb-0 animate__animated animate__fadeIn">404</h1>
            <h2 class="judul-error h2 text-dark my-4">Halaman Tidak Ditemukan</h2>
            <p class="pesan-error text-secondary mb-4">Maaf, halaman yang Anda cari tidak dapat ditemukan.</p>
            <router-link to="/" class="tombol-kembali btn btn-primary btn-lg px-4 py-2">
                Kembali ke Beranda
            </router-link>
        </div>
    </div>
</template>

<script>
export default {
    name: 'HalamanTidakDitemukan'
}
</script>

<style scoped>
.kode-error {
    font-size: 7.5rem;
    animation: masukAtas 0.5s ease-in;
}

.tombol-kembali {
    transition: all 0.3s ease;
}

.tombol-kembali:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

@keyframes masukAtas {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@media (max-width: 768px) {
    .kode-error {
        font-size: 5rem;
    }
    
    .judul-error {
        font-size: 1.5rem;
    }
    
    .pesan-error {
        font-size: 1rem;
    }
}
</style>
