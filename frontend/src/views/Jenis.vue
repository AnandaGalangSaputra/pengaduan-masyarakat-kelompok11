<script>
import JenisCard from "@/components/JenisCard.vue";

export default {
    name: "JenisPengaduan",
    components: {
        JenisCard,
    },
    data() {
        return {
            layananList: [
                {
                    judul: "Layanan Publik",
                    deskripsi:
                        "Pengaduan terkait kualitas atau ketidakpuasan terhadap layanan yang diberikan oleh instansi pemerintah, seperti pelayanan kesehatan, pendidikan, dan administrasi",
                },
                {
                    judul: "Keamanan",
                    deskripsi:
                        "Pengaduan mengenai masalah keamanan, seperti tindakan kriminal, kehilangan barang, kebocoran data pribadi, kebisingan, atau gangguan ketertiban umum",
                },
                {
                    judul: "Fasilitas Umum",
                    deskripsi:
                        "Pengaduan mengenai kondisi fasilitas umum, seperti jalan, jembatan, taman, halte bus, dan sarana transportasi yang tidak memadai atau rusak",
                },
                {
                    judul: "Seksual",
                    deskripsi:
                        "Pengaduan seksual meliputi pelecehan, kekerasan, dan eksploitasi seksual yang dialami di berbagai lingkungan seperti tempat kerja, sekolah, atau rumah tangga",
                },
            ],
        };
    },
};
</script>

<style scoped>
.bg-primary {
    background-color: #4d6efd !important;
}

.card {
    width: 640px;
    height: 243px;
}
.title-text {
    font-size: 50px;
}

.des {
    max-width: 940px;
}
</style>

<template>
    <section class="min-vh-100">
        <div class="container py-5">
            <h1
                class="title-text text-center my-5 blue-color fw-bold"
                data-aos="fade-up"
                data-aos-duration="800"
            >
                Jenis Pengaduan
            </h1>
            <p
                class="des mx-auto text-center my-3"
                data-aos="fade-up"
                data-aos-duration="800"
                
            >
                Platform pengaduan ini menyediakan berbagai jenis kategori
                pengaduan yang dapat diakses oleh masyarakat. Masing-masing
                kategori dirancang untuk menangani isu-isu yang berbeda,
                sehingga pengaduan yang disampaikan dapat segera diproses dan
                ditangani oleh pihak yang berwenang.
            </p>
            <div class="row g-4 justify-content-center my-5">
                <div
                    class="col-md-5 d-flex justify-content-center"
                    v-for="(layanan, index) in layananList"
                    :key="index"
                    :data-aos="index % 2 === 0 ? 'fade-right' : 'fade-left'" 
                    data-aos-duration="800"
                  
                >
                    <JenisCard
                        :judul="layanan.judul"
                        :deskripsi="layanan.deskripsi"
                        class="card"
                    />
                </div>
            </div>
        </div>
    </section>
</template>
