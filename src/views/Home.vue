<script>
import BlackButtonOutline from "@/components/BlackButtonOutline.vue";
import BlueButton from "../components/BlueButton.vue";
import Tentang from "../views/Tentang.vue";

import Langkah from "../views/Langkah.vue";
import Adakendala from "../views/Adakendala.vue";
import Berita from "../views/Berita.vue";
import Foot from "../views/Footer.vue";
import Unggahbukti from "../views/Unggahbukti.vue";
import Login from "../views/Login.vue";
import Daftar from "../views/Daftar.vue";
import Jenis from "../views/Jenis.vue";

export default {
  components: {
    BlueButton,
    BlackButtonOutline,
    Tentang,
    Berita,
    Langkah,
    Adakendala,
    Foot,
    Unggahbukti,
    Login,
    Daftar,
    Jenis,
  },
};
</script>

<style scoped>
.hero-title {
  font-size: 5em;
  font-weight: 700;
}

@media (max-width: 768px) {
  .hero-title {
    font-size: 3em;
  }

  .hero-text {
    font-size: 1em;
    text-align: center;
    margin-left: auto;
    margin-right: auto;
  }

  .img-container {
    padding-left: 0;
    margin-top: 2rem;
    text-align: center;
    display: none;
  }
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
  background: #007bff;
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

.button-black {
  transition: all 0.3s ease-in-out;
  position: relative;
  border: 2px solid #000;
}

.button-black:hover {
  transform: translateY(-2px);
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
  background: #000;
  color: white;
}

.button-black::after {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border-radius: inherit;
  background: #000;
  filter: blur(40px);
  opacity: 0;
  transition: all 0.3s ease;
  z-index: -1;
}

.button-black:hover::after {
  opacity: 0.5;
  transform: scale(1.1);
}
</style>

<template>
  <section class="hero-section min-vh-100 d-flex align-items-center">
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center">
        <div
          class="col-lg-7 col-sm-12 order-2 order-lg-1 text-center d-flex flex-column justify-content-around text-lg-start mobile-center"
        >
          <h6 class="hero-h6">Selamat datang di</h6>
          <h1 class="hero-title blue-color">
            <span class="">Pengaduan</span><br />
            Masyarakat
          </h1>
          <p class="hero-text my-4 my-lg-5">
            Laporkan keluhan, saran, atau pelanggaran yang Anda temui di lingkungan di
            sini
          </p>
          <div
            class="d-flex flex-column flex-md-row gap-3 justify-content-center justify-content-lg-start button-container"
          >
            <BlueButton
              text="Pelajari Cara Kerjanya"
              class="button-blue"
              icon="fa fa-arrow-right"
            />
            <BlackButtonOutline
              class="button-black"
              text="Buat Laporan"
              icon="far fa-hand-pointer"
            />
          </div>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 mt-4 mt-lg-0 img-container">
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
    <Berita />
    <Adakendala />
    <Foot />
</template>
