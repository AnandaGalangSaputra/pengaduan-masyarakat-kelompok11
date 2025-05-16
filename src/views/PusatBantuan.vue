<template>
    <div class="container py-5">
        <!-- Header Section -->
        <div class=" rounded-3 p-5 mb-5 text-center">
            <h1 class="display-4 mb-3 fw-semibold">Pusat Bantuan</h1>
            <p class="lead mb-4 text-secondary">Bagaimana kami dapat membantu Anda?</p>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari bantuan...">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <section class="mb-5">
            <h2 class="h2 mb-4">Pertanyaan yang Sering Diajukan</h2>
            <div class="row g-4">
                <div class="col-md-6" v-for="(faq, index) in faqs" :key="index">
                    <div class="card h-100 py-2 px-3 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title text-primary">{{ faq.question }}</h5>
                            <p class="card-text">{{ faq.answer }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section>
            <h2 class="h2 mb-4">Butuh Bantuan Lebih Lanjut?</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 py-5 text-center shadow-sm">
                        <div class="card-body">
                            <i class="fas fa-phone fa-2x text-primary mb-3"></i>
                            <h5 class="card-title">Hubungi Kami</h5>
                            <p class="card-text">0800-1234-5678</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 py-5 text-center shadow-sm">
                        <div class="card-body">
                            <i class="fas fa-envelope fa-2x text-primary mb-3"></i>
                            <h5 class="card-title">Email</h5>
                            <p class="card-text">bantuan@pengaduan.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 py-5 text-center shadow-sm">
                        <div class="card-body">
                            <i class="fas fa-comments fa-2x text-primary mb-3"></i>
                            <h5 class="card-title">Live Chat</h5>
                            <p class="card-text">Chat dengan tim kami</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {
    name: 'PusatBantuan',
    data() {
        return {
            faqs: [
                {
                    question: 'Bagaimana cara membuat pengaduan?',
                    answer: 'Anda dapat membuat pengaduan dengan mengklik tombol "Buat Pengaduan" di halaman utama.'
                },
                {
                    question: 'Berapa lama proses pengaduan direspon?',
                    answer: 'Pengaduan akan direspon dalam waktu 1x24 jam kerja.'
                },
                {
                    question: 'Bagaimana cara melacak pengaduan?',
                    answer: 'Masukkan nomor tiket pengaduan Anda di menu "Lacak Pengaduan".'
                },
                {
                    question: 'Apa yang harus dilakukan jika lupa password?',
                    answer: 'Klik "Lupa Password" pada halaman login dan ikuti instruksi yang diberikan.'
                }
            ]
        }
    }
}
</script>

<style scoped>
.card {
    transition: transform 0.2s;
}

.card:hover {
    transform: translateY(-5px);
}

.shadow-sm {
    box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important;
}
</style>
