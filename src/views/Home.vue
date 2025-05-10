<script>
import BlackButtonOutline from "@/components/BlackButtonOutline.vue";
import BlueButton from "../components/BlueButton.vue";
export default {
  components: {
    BlueButton,
    BlackButtonOutline,
  },
};
</script>

<style scoped>
.hero-title {
  font-size: 5em;
  font-weight: 700;
}

.hero-h6 {
  font-weight: 700;
}

.img-container {
  position: relative;
  padding-left: 5rem;
}

.hero-img2 {
  position: absolute;
  bottom: -50%;
  left: 0;
  transform: translate(-20%, -30%);
}

.hero-text {
    max-width: 30rem;
    font-size: 1.2em;
    font-weight: 400;
    line-height: 1.5;
}

</style>

<template>
  <section class="hero-section vh-100">
    <div class="container h-100 d-flex justify-content-start align-items-center">
      <div class="row align-items-center">
        <div class="col-lg-7 col-sm-12 order-md-1 order-2 text-center text-lg-start">
          <h6 class="hero-h6">Selamat datang di</h6>
          <h1 class="hero-title blue-color">
            <span class="">Pengaduan</span><br />
            Masyarakat
          </h1>
          <p class="hero-text my-5">
            Laporkan keluhan, saran, atau pelanggaran yang Anda temui di lingkungan di sini
          </p>
          <BlueButton text="Pelajari Cara Kerjanya" icon="fa fa-arrow-right" />
          <BlackButtonOutline text="Buat Laporan" class="ms-4" icon="far fa-hand-pointer" />
        </div>
        <div
          class="col-lg-5 order-md-2 order-2  mt-lg-0 img-container"
        >
          <img
            src="../assets/Images/hero2.png"
            alt="Hero Image"
            class="hero-img1 img-fluid"
          />
          <img
            src="../assets/Images/hero1.png"
            alt="Hero Image"
            class="hero-img2 img-fluid"
          />
        </div>
      </div>
    </div>
  </section>
</template>
