<script>
import BlueButton from "@/components/BlueButton.vue";

export default {
    components: {
        BlueButton,
    },
};
</script>

<template>
    <section id="footer" class="bg-blue min-vh-100 d-flex align-items-center">
        <img class="wavy-element" src="../assets/wavy-element.svg" alt="">
        <div class="container">
            <div class="row d-flex justify-content-around align-items-start ">
                <div class="col-md-12 d-flex flex-column justify-content-center align-items-center text-center">
                    <h1 class="text-judul text-white ">
                        Laporkan Pengaduan <br />
                        Anda Sekarang
                    </h1>
                    <p class="text-white pt-5">
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
}
.button-blue {
    z-index: 1;
    background-color: var(--nav-color);
}

#footer {
    position: relative;
    overflow: hidden;
}

.wavy-element {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 0;
}
</style>
