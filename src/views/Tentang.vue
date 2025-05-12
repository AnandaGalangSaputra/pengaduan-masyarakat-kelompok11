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
                },
                {
                    judul: "Privasi Terjamin",
                    deskripsi: "Data dan identitas pelapor dijaga dengan baik.",
                },
                {
                    judul: "Pantau Aduan",
                    deskripsi:
                        "Lacak status pengaduan secara real-time dari dashboard.",
                },
            ],
        };
    },
};
</script>

<template>
    <section class="h-100 bg-grey py-5">
        <div class="d-flex align-items-center justify-content-center">
            <div>
                <h2 class="hero-h2 text-center blue-color">TENTANG <br /></h2>
                <h1 class="hero-h1 text-center blue-color">LAYANAN</h1>
                <p class="mx-auto text-center" style="margin-bottom: 80px">
                    Platform pengaduan masyarakat digital yang cepat,
                    transparan, dan <br />
                    mudah diakses oleh semua warga.
                </p>
            </div>
        </div>
        <div class="container h-100 justify-content-center">
            <div class="con-card d-flex flex-row justify-content-center">
                <div class="row">
                    <div
                        class="col-md-4 mb-4"
                        v-for="(layanan, index) in layananList"
                        :key="index"
                    >
                        <Card
                            :judul="layanan.judul"
                            :deskripsi="layanan.deskripsi"
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
}

.hero-h1 {
    font-weight: 900;
    letter-spacing: -2%;
    margin-bottom: 40px;
}

.con-card {
    gap: 32px;
}
</style>
