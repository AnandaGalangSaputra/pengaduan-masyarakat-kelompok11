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
                    judul: "Hubungi Bot Telegram",
                    deskripsi:
                        "Kirim pesan ke bot Telegram @LayananAduan_Bot untuk mendapatkan akses pengaduan.",
                },
                {
                    nomor: "2",
                    judul: "Isi Formulir",
                    deskripsi:
                        "Lengkapi formulir yang disediakan dengan informasi yang diperlukan mengenai pengaduan Anda.",
                },
                {
                    nomor: "3",
                    judul: "Lampirkan Bukti",
                    deskripsi:
                        "Sertakan dokumen atau bukti pendukung yang relevan untuk memperkuat pengaduan Anda.",
                },
                {
                    nomor: "4",
                    judul: "Periksa Ulang",
                    deskripsi:
                        "Pastikan semua informasi yang Anda berikan akurat dan valid sebelum mengirimkan pengaduan.",
                },
                {
                    nomor: "5",
                    judul: "Tindak Lanjut",
                    deskripsi:
                        "Setelah pengaduan diajukan, pihak terkait akan memberikan tanggapan atau tindakan selanjutnya.",
                },
            ],
        };
    },
};
</script>

<template>
    <section
        class="min-vh-100 py-5 "
        id="langkahpengaduan"
    >
        <div class="container d-flex justify-content-center align-items-center flex-column">
            <h2
                class="text-title text-center fw-bold text-primary"
                data-aos="fade-up"
            >
                Langkah Pengaduan
            </h2>
            <p
                class="mx-auto text-center pt-4 pb-1 text-pengaduan"
                data-aos="fade-up"
                data-aos-delay="200"
            >
                Ikuti langkah-langkah sederhana di bawah ini untuk menyampaikan
                pengaduan Anda secara tepat dan terstruktur.
            </p>

            <div class="container w-100 mt-5 row d-flex justify-content-center align-items-center gy-4 gx-4">
                <div
                    class="col-12 col-sm-6 col-md-6 col-lg-4 d-flex justify-content-center"
                    v-for="(layanan, index) in layananList"
                    :key="index"
                    :data-aos="'fade-up'"
                    :data-aos-delay="(index + 1) * 200"
                >
                    <BlueCard
                        :nomor="layanan.nomor"
                        :judul="layanan.judul"
                        :deskripsi="layanan.deskripsi"
                        class="blu shadow-lg w-100"
                    />
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
.text-title {
    font-size: 50px;
}

.text-pengaduan {
    max-width: 90%;
}
</style>
