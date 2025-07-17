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
                        "Setelah pengaduan diajukan, pihak terkait akan memproses dan memberikan tanggapan atau tindakan selanjutnya.",
                },
            ],
        };
    },
};
</script>

<template>
    <section class="min-vh-100 py-5 d-flex align-items-center flex-column" id="langkahpengaduan"> 
        <h2 class="text-title text-center fw-bold text-primary" data-aos="fade-down">
            Langkah Pengaduan
        </h2>
        <p class="mx-auto text-center pt-4 pb-5 text-pengaduan" data-aos="fade-up" data-aos-delay="200">
            Ikuti langkah-langkah sederhana di bawah ini untuk menyampaikan pengaduan Anda secara tepat dan terstruktur.
        </p>
        <div class="container h-100 my-5">
            <div class="row justify-content-center">
                <div class="con-card d-flex flex-row justify-content-center">
                    <div class="card-container">
  <div v-for="(layanan, index) in layananList" :key="index">
    <BlueCard
      :nomor="layanan.nomor"
      :judul="layanan.judul"
      :deskripsi="layanan.deskripsi"
      class="blu shadow-lg"
      :data-aos="'fade-up'"
      :data-aos-delay="(index + 1) * 200"
    />
  </div>
</div>

                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
.card-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 1.5rem;
}

.card-container > div {
  width: 280px; /* Biar card punya lebar tetap */
}

.text-title {
    font-size: 50px;
}

.text-pengaduan {
    max-width: 90%;
}

</style>
