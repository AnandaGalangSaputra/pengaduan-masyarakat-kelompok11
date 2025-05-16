<script>
import BlueButton from "../components/BlueButton.vue";
export default {
  components: {
    BlueButton,
  },
  name: "ReportIssuePage",
  methods: {
    goToForm() {
      this.$router.push("/form-pengaduan");
    },
  },
};
</script>
<template>
  <section class="min-vh-100 bg-grey d-flex align-items-center">
    <div class="container">
      <div class="row p-sm-5 p-md-5">
        <div class="col-lg-6 col-md-12 col-sm-12 mb-4 mb-lg-0" data-aos="fade-up" data-aos-duration="1000">
          <div class="report-page">
            <div class="content text-center text-lg-start">
              <h1 class="title display-sm-1" data-aos="fade-up" data-aos-delay="200">Ada Kendala?<br /><span class="nav-color">Laporkan<br />Sekarang!</span>
              </h1>
              <p class="description" data-aos="fade-up" data-aos-delay="400">
                Klik tombol di bawah membuka halaman pusat bantuan
              </p>
              <router-link to="/pusatbantuan" data-aos="fade-up" data-aos-delay="600">
                <BlueButton text="Pusat Bantuan" class="button-blue" icon="fa fa-arrow-right" />
              </router-link>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 p-sm-5 d-flex align-items-center justify-content-center image-right" data-aos="fade-left" data-aos-duration="1000">
          <img src="../assets/Images/5114855-removebg-preview.png" alt="Customer Support"
            class="img-container img-fluid" />
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
.report-page {
  display: flex;
  justify-content: space-around;
  align-items: center;
}

.content {
  max-width: 500px;
}

.img-container {
  width: 521px;
  height: 408px;
}

.title {
  font-size: 64px;
  font-weight: bold;
  margin-bottom: 20px;
}

.description {
  color: #555;
  margin-bottom: 30px;
  font-size: 18px;
}

.image-placeholder {
  /* width: 300px; */
  height: auto;
  border-radius: 20px;
  margin-right: 10%;
  background-color: transparent !important;
}

.button-blue {
  width: 237px;
  height: 63px;
  font-size: 18px;
}

@media (max-width: 768px) {
  .image-right {
    display: none !important;
  }
}
</style>
