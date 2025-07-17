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
              <h1 class="title display-sm-1" data-aos="fade-up" data-aos-delay="200">Ada Kendala?<br /><span class="blue-color">Buka Pusat<br />Bantuan!</span>
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

@media (max-width: 768px) {
  .image-right {
    display: none !important;
  }
}
</style>
