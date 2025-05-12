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
    <section class="h-100 bg-grey">
        <div class="container d-flex flex-row py-5">
            <div class="col-md-6">
                <div class="report-page">
                    <div class="content">
                        <h1 class="title">
                            Ada Kendala?<br />Laporkan<br />Sekarang!
                        </h1>
                        <p class="description">
                            Klik tombol di bawah untuk mengisi formulir
                            pengaduan. Laporan anda kami terima dan kami
                            teruskan ke pada pihak yang berwajib
                        </p>
                        <BlueButton
                            text="Laporkan disini"
                            class="button-blue"
                            icon="fa fa-arrow-right"
                        />
                    </div>
                </div>
            </div>
               <div class="container d-flex flex row justify-content-center align-items-center">
                <img src="../assets/Images/customersuport.png" alt="" class="img-container">
                
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
    width: 300 px;
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
</style>
