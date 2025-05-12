<template>
  <div class="container py-5">
    <h1 class="text-center mb-5 fw-bold">Jenis Pengaduan</h1>
    <div class="row g-4 justify-content-center">
      <div
        class="col-md-6 d-flex justify-content-center"
        v-for="(layanan, index) in layananList"
        :key="index"
      >
        <Card
          :judul="layanan.judul"
          :deskripsi="layanan.deskripsi"
          class="card"
        />
      </div>
    </div>
  </div>
</template>

<script>
import Card from '@/components/icons/Card.vue';

export default {
  name: 'JenisPengaduan',
  components: {
    Card
  },
  data() {
    return {
      layananList: [
        {
          judul: "Layanan Publik",
          deskripsi: "Pengaduan terkait kualitas atau ketidakpuasan terhadap layanan yang diberikan oleh instansi pemerintah, seperti pelayanan kesehatan, pendidikan, dan administrasi",
        },
        {
          judul: "Keamanan",
          deskripsi: "Pengaduan mengenai masalah keamanan, seperti tindakan kriminal, kebisingan, atau gangguan ketertiban umum",
        },
        {
          judul: "Fasilitas Umum",
          deskripsi: "Pengaduan mengenai kondisi fasilitas umum, seperti jalan, jembatan, taman, dan sarana transportasi yang tidak memadai atau rusak",
        },
        {
          judul: "Seksual",
          deskripsi: "Pengaduan seksual meliputi pelecehan, kekerasan, dan eksploitasi seksual yang dialami di berbagai lingkungan seperti tempat kerja, sekolah, atau rumah tangga",
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
    background-color: #ffff !important;
    
}

</style>
