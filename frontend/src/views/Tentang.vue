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
                    logo :"fa-solid fa-user"
                },
                {
                    judul: "Privasi Terjamin",
                    deskripsi: "Data dan identitas pelapor dijaga dengan baik.",
                    logo :"fa-solid fa-shield-halved"
                },
                {
                    judul: "Pantau Aduan",
                    deskripsi:
                        "Lacak status pengaduan secara real-time dari dashboard.",
                    logo :"fa-solid fa-eye"
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
                    <h2 class="hero-h2 text-center blue-color" data-aos="fade-down">
                        TENTANG <br />
                    </h2>
                    <h1 class="hero-h1 text-center blue-color" data-aos="fade-up" data-aos-delay="300">
                        LAYANAN
                    </h1>
                    <p class="mx-auto text-center" style="margin-bottom: 80px;" data-aos="fade-up" data-aos-delay="200">
                        Platform pengaduan masyarakat digital yang cepat,
                        transparan, dan <br />
                        mudah diakses oleh semua warga.
                    </p>
                </div>
            </div>
            <div class="">
                <div class="d-flex flex-column gap-4 flex-md-row justify-content-center">
                    <div
                        class=""
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

.hero-h1 {
    font-weight: 900;
    letter-spacing: -2%;
    margin-bottom: 40px;
    font-size: 64px;

}

.row {
    align-items: stretch !important;
}

</style>
