<script>
import Card from "../components/icons/Card.vue";
export default {
    components: {
        Card,
    },

    data() {
        return {
            layananList: [
                {
                    judul: "Akses untuk Semua",
                    deskripsi:
                        "Setiap warga bisa menyampaikan aduan tanpa hambatan.",
                    logo: "fa-solid fa-user",
                },
                {
                    judul: "Privasi Terjamin",
                    deskripsi: "Data dan identitas pelapor dijaga dengan baik.",
                    logo: "fa-solid fa-shield-halved",
                },
                {
                    judul: "Pantau Aduan",
                    deskripsi:
                        "Lacak status pengaduan secara real-time dari dashboard.",
                    logo: "fa-solid fa-eye",
                },
            ],
        };
    },
};
</script>

<template>
    <section class="h-100 bg-grey py-5" id="tentang">
        <div class="container min-vh-100">
            <div class="align-items-center justify-content-center">
                <div>
                    <h2
                        class="hero-h2 text-center blue-color"
                        data-aos="fade-down"
                    >
                        TENTANG <br />
                    </h2>
                    <h1
                        class="hero-h1 text-center blue-color"
                        data-aos="fade-up"
                        data-aos-delay="300"
                    >
                        LAYANAN
                    </h1>
                    <p
                        class="mx-auto text-center des"
                        style="margin-bottom: 80px"
                        data-aos="fade-up"
                        data-aos-delay="200"
                    >
                        Platform pengaduan masyarakat digital ini hadir untuk
                        memberikan solusi cepat dan transparan dalam menangani
                        setiap laporan dari warga. Melalui layanan ini,
                        kami ingin menciptakan lingkungan yang lebih aman,
                        transparan, dan akuntabel bagi seluruh masyarakat.
                    </p>
                </div>
            </div>
            <div class="layanan-cards">
                <div
                    class="d-flex flex-column gap-4 flex-md-row justify-content-center"
                >
                    <div
                        class="card-container"
                        v-for="(layanan, index) in layananList"
                        :key="index"
                        :data-aos="'zoom-in-up'"
                        :data-aos-delay="index * 200 + 300"
                    >
                        <Card
                            :judul="layanan.judul"
                            :deskripsi="layanan.deskripsi"
                            :logo="layanan.logo"
                        />
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
.hero-h2 {
    margin-top: 40px;
    font-weight: 900;
    letter-spacing: -2%;
    font-size: 40px;
}

.des {
    max-width: 850px;
}
.hero-h1 {
    font-weight: 900;
    letter-spacing: -2%;
    margin-bottom: 40px;
    font-size: 64px;
}

.row {
    align-items: stretch !important;
}

/* Ensure all cards are the same size */
.layanan-cards .card-container {
    width: 100%; /* Ensure cards take full width on small screens */
    display: flex;
    justify-content: center;
}

.card-container .card {
    width: 100%;
    height: 350px; /* Fixed height for uniformity */
    display: flex;
    justify-content: center;
    align-items: center;
}

@media (min-width: 768px) {
    .card-container {
        width: 30%; /* Adjust width for larger screens */
    }
}
</style>
