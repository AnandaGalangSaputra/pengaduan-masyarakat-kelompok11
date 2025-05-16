<script>
import BlueCard from "@/components/BlueCard.vue";

export default {
    components: {
        BlueCard,
    },
    name: "LangkahPengaduan",
    data() {
        return {
            layananList: [
                {
                    nomor: "1",
                    judul: "Akses untuk Semua",
                    deskripsi:
                        "Lengkapi formulir yang disediakan dengan informasi yang diperlukan mengenai pengaduan Anda.",
                },

                {
                    nomor: "2",

                    judul: "Privasi Terjamin",
                    deskripsi:
                        "Sertakan dokumen atau bukti pendukung yang relevan untuk memperkuat pengaduan Anda.",
                },
                {
                    nomor: "3",

                    judul: "Pantau Aduan",
                    deskripsi:
                        "Pastikan semua informasi yang Anda berikan akurat dan valid sebelum mengirimkan pengaduan.",
                },
                {
                    nomor: "4",

                    judul: "Pantau Aduan",
                    deskripsi:
                        "Setelah pengaduan diajukan, pihak terkait akan memproses dan memberikan tanggapan atau tindakan selanjutnya.",
                },
            ],
        };
    },
};
</script>

<template>
    <section class="py-5">
        <h2 class="text-title text-center fw-bold py-5 text-primary">
            Langkah Pengaduan
        </h2>

        <div class="container h-100 my-5">
            <div class="row justify-content-center">
                <div class="con-card d-flex flex-row justify-content-center">
                  <div class="d-flex flex-column gap-4 flex-md-row justify-content-center">
                    <div
                    class=""
                    v-for="(layanan, index) in layananList"
                    :key="index"
                    >
                    <BlueCard
                    :nomor="layanan.nomor"
                    :judul="layanan.judul"
                    :deskripsi="layanan.deskripsi"
                    class="blu shadow-lg"
                    />
                  </div>
                </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
.text-title {
    font-size: 50px;
}
</style>
