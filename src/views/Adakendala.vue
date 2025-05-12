<script>
import BlueButton from "../components/BlueButton.vue";
import { DotLottieVue } from "@lottiefiles/dotlottie-vue";
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
  <section class="h-100 bg-grey">
    <div class="container">
      <div class="report-page">
        <div class="content">
          <h1 class="title">Ada Kendala?<br />Laporkan<br />Sekarang!</h1>
          <p class="description">
            Klik tombol di bawah untuk mengisi formulir pengaduan. Laporan anda
            kami terima dan kami teruskan ke pada pihak yang berwajib
          </p>
          <BlueButton
            text="Laporkan disini"
            class="button-blue"
            icon="fa fa-arrow-right"
          />
        </div>
  
          <!-- <img
            src="../assets/Images/5114855-removebg.png"
            alt="customersuport"
            class="image-placeholder" -->
      
     
      </div>
    </div>
  </section>
</template>

<style scoped>
.report-page {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 40px;
}
.content {
  max-width: 500px;
}
.title {
  font-size: 36px;
  font-weight: bold;
  margin-bottom: 20px;
}
.description {
  color: #555;
  margin-bottom: 30px;
}

.image-placeholder {
  width: 300    px;
  height: auto;
  border-radius: 20px;
  margin-right: 10%;
  background-color: transparent !important;
}
</style>
