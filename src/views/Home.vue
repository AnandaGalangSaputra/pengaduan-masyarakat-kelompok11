<script>
import BlackButtonOutline from "@/components/BlackButtonOutline.vue";
import BlueButton from "../components/BlueButton.vue";
import Tentang from "../views/Tentang.vue";

import Langkah  from "../views/Langkah.vue";
import Adakendala from "../views/Adakendala.vue";



import Jenis from "../views/Jenis.vue";


export default {
  components: {
    BlueButton,
    BlackButtonOutline,
    Tentang,

    Langkah,
   Adakendala,

    Jenis

  },
};
</script>

<style scoped>
.hero-title {
  font-size: 5em;
  font-weight: 700;
}

.hero-h6 {
  font-weight: 600;
  letter-spacing: 1px;
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
  animation: float 3s ease-in-out infinite;
}

.hero-text {
  max-width: 30rem;
  font-size: 1.2em;
  font-weight: 400;
  line-height: 1.5;
}

.button-blue {
  transition: all 0.3s ease-in-out;
  position: relative;
}

.button-blue:hover {
  transform: translateY(-2px);
  box-shadow: 0 5px 15px rgba(0, 123, 255, 0.4);
}

.button-blue::after {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border-radius: inherit;
  background: inherit;
  filter: blur(40px);
  opacity: 0;
  transition: all 0.3s ease;
  z-index: -1;
}

.button-blue:hover::after {
  opacity: 0.7;
  transform: scale(1.1);
}
/* 
.small-circular {
  position: absolute;
  bottom: 0;
  right: 0;
  z-index: -1;
  margin-right: -15rem;
  margin-bottom: -10rem;
} */
</style>

<template>
  <section class="hero-section vh-100">
    <!-- <img class="small-circular"src="../assets/Images/small-circular.png" alt="" srcset=""> -->
    <div class="container h-100 d-flex justify-content-start align-items-center">
      <div class="row align-items-center">
        <div class="col-lg-7 col-sm-12 order-md-1 order-2 text-center text-lg-start">
          <h6 class="hero-h6">Selamat datang di</h6>
          <h1 class="hero-title blue-color">
            <span class="">Pengaduan</span><br />
            Masyarakat .
          </h1>
          <p class="hero-text my-5">
            Laporkan keluhan, saran, atau pelanggaran yang Anda temui di lingkungan di
            sini
          </p>
          <BlueButton
            text="Pelajari Cara Kerjanya"
            class="button-blue"
            icon="fa fa-arrow-right"
          />
          <BlackButtonOutline
            text="Buat Laporan"
            class="ms-4"
            icon="far fa-hand-pointer"
          />
        </div>
        <div class="col-lg-5 order-md-2 order-2 mt-lg-0 img-container">
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
  <Tentang />
  <Jenis />

  <Langkah />
  <Adakendala />

  
 
</template>
