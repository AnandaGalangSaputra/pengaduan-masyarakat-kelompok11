r
<script>
import BlueButton from "@/components/BlueButton.vue";
import FooterBlue from "@/components/FooterBlue.vue";

export default {
  components: {
    BlueButton,
    FooterBlue,
  },
};
</script>

<template>
  <section id="footer" class="bg-blue min-vh-100 d-flex align-items-center">
    <img class="wavy-element" src="../assets/wavy-element.svg" alt="" />
    <div class="container">
      <div class="row d-flex justify-content-around align-items-start">
        <div
          class="col-md-12 d-flex flex-column justify-content-center align-items-center text-center"
        >
          <h1
            class="text-judul text-white"
            data-aos="fade-up"
            data-aos-duration="1000"
          >
            Laporkan Pengaduan <br />
            Anda Sekarang
          </h1>
          <p
            class="text-white pt-5 desk"
            data-aos="fade-up"
            data-aos-duration="1000"
            data-aos-delay="200"
          >
            Klik tombol di bawah dan isilah form di bawah ini dengan informasi
            yang jelas dan lengkap agar laporan Anda bisa segera diproses.
          </p>
          <router-link to="/formpengaduan" class="text-decoration-none">
            <div
              data-aos="fade-up"
              data-aos-duration="1000"
              data-aos-delay="400"
            >
              <BlueButton
                text="Buat Laporan"
                class="button-blue mt-5"
                icon="fa fa-arrow-right"
              />
            </div>
          </router-link>
        </div>
      </div>
    </div>
  </section>
  <FooterBlue />
</template>

<style scoped>
.text-judul {
  font-weight: bold !important;
  font-size: 60px;
}
.button-blue {
  transition: all 0.3s ease-in-out !important;
  position: relative;
  background: var(--nav-color);
}

.desk {
  max-width: 700px;
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

#footer {
  position: relative;
}

.wavy-element {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 0;
  object-fit: cover;
}
</style>
