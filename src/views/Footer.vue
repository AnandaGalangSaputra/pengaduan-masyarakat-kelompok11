<script>
import BlueButton from "@/components/BlueButton.vue";

export default {
    components: {
        BlueButton,
    },
};
</script>

<template>
    <section class="bg-blue">
        <div class="container d-flex justify-content-center">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12">
                    <h1 class="text-judul text-white text-center">
                        Laporkan Pengaduan <br />
                        Anda Sekarang
                    </h1>
                    <p class="text-white text-center">
                        Isilah form di bawah ini dengan informasi yang jelas dan
                        lengkap agar laporan Anda <br />
                        bisa segera diproses.
                    </p>
                    <BlueButton
                        text="Pelajari Cara Kerjanya"
                        class="button-blue"
                        icon="fa fa-arrow-right"
                    />
                </div>
                
                    
               
            </div>
        </div>
    </section>
</template>

<style scoped>
.text-judul {
    font-weight: bold !important;
    font-size: 60px;
    padding-top: 100px;
    padding-bottom: 100px;
}
.button-blue {
    width: 350px;
    background-color: var(--nav-color);
}
</style>
