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
          judul: "Akses untuk Semua",
          deskripsi:
            "Lengkapi formulir yang disediakan dengan informasi yang diperlukan mengenai pengaduan Anda.",
        },

        {
          judul: "Privasi Terjamin",
          deskripsi:
            "Sertakan dokumen atau bukti pendukung yang relevan untuk memperkuat pengaduan Anda.",
        },
        {
          judul: "Pantau Aduan",
          deskripsi:
            "Pastikan semua informasi yang Anda berikan akurat dan valid sebelum mengirimkan pengaduan.",
        },
        {
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
  <div class="container my-5">
    <h2 class="text-center fw-bold mb-5 text-primary">Langkah Pengaduan</h2>
    <div class="row justify-content-center">
      <div class="con-card d-flex flex-row justify-content-center">
        <div
          class="col-md-3 mb-4"
          v-for="(layanan, index) in layananList"
          :key="index"
        >
          <BlueCard
            :judul="layanan.judul"
            :deskripsi="layanan.deskripsi"
            class="blu"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>


</style>
