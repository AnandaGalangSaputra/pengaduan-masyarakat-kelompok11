<script>
import BlueButton from "@/components/BlueButton.vue";

export default {
    components: {
        BlueButton,
    },
};
</script>

<template>
    <section class="bg-foot">
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
                    <div class="d-flex justify-content-center my-5">
                        <BlueButton
                            text="Pelajari Cara Kerjanya"
                            class="button-blue"
                            icon="fa fa-arrow-right"
                        />
                    </div>
                </div>
            </div>
        </div>
        <div class="footer d-flex justify-content-start align-items-center">
            <div class="container">
                <div class="row d-flex">
                    <div class="col-md-6">
                        <p class="text-foot text-white text-start fw-lighter">
                            Order.uk Copyright 2025, All Rights Reserved.
                        </p>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end gap-5">
                        <p class="text-foot text-white text-end fw-lighter">
                            Privacy Policy 
                        </p>
                        <p class="text-foot text-white text-end fw-lighter">
                            Terms 
                        </p>
                        <p class="text-foot text-white text-end fw-lighter">
                            Pricing
                        </p>
                        <p class="text-foot text-white text-end fw-lighter">
                            Do not sell or share my
                            personal information
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
.footer {
    height: 60px;
    background-color: var(--nav-color);
}

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

.text-foot {
    font-size: 13px;
    padding-top: 16px;
}

.bg-foot {
    background-image: url("../assets/Images/bgfoot.png");
    background-size: 100%;
}
</style>
