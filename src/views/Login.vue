<template>
    <section class="min-vh-100 bgr-gambar d-flex align-items-center justify-content-center ">
        <div class="container min-vh-100 d-flex justify-content-center align-items-center ">
            <div class="row d-flex justify-content-center align-items-center h-100 back-form py-5" data-aos="fade-up">
                <h1 class="title mb-4 text-center">Masuk</h1>

                <div class="w-100 px-4" style="max-width: 400px">
                    <div class="mb-3">
                        <label class="form-label nav-color fw-semibold">Username</label>
                        <input type="text" class="form-control bg-light" placeholder="Masukkan username anda"
                            v-model="username" />
                    </div>

                    <div class="mb-2">
                        <label class="form-label nav-color fw-semibold">Password</label>
                        <div class="input-group">
                            <input :type="showPassword ? 'text' : 'password'" class="form-control bg-light"
                                placeholder="Masukkan password anda" v-model="password" />
                            <span class="input-group-text bg-light" @click="togglePassword" style="cursor: pointer">
                                <i :class="showPassword
                                    ? 'bi bi-eye-slash'
                                    : 'bi bi-eye'
                                    "></i>
                            </span>
                        </div>
                    </div>

                    <div class="mb-3 text-end">
                        <a href="#" class="text-decoration-none blue-color fw-semibold lupa-pass"><u>Lupa
                                Password?</u></a>
                    </div>
                    <BlueButton text="Masuk" class="button-blue" />
                    <div class="text-center mt-2">
                        <router-link to="/daftar">
                            <a href="#" class="text-decoration-none blue-color fw-semibold lupa-pass"><u>Saya belum
                                    memiliki akun</u></a>
                        </router-link>
                    </div>
                    <p class="text-center text-decoration-none blue-color fw-semibold lupa-pass mt-1">atau</p>
                    <div class="d-flex justify-content-center my-1">
                        <img src="../assets/Google.png" alt="" class="img-container gambar">
                    </div>

                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
.bgr-gambar {
    background-image: url("../assets/Images/bgindo.png");
    background-size: 100%;
}

.back-form {
    background-image: url("../assets/Images/texture.png");
    /* border-top-left-radius: 40px; */
    border-radius: 40px;
}

.lupa-pass {
    font-size: 14px;
}

.button-blue {
    width: 100%;
}

.button-blue:hover {
    width: 100%;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 123, 255, 0.4);
}

.gambar {
    border: solid 2px black;
    width: 250px;
    border-radius: 50px;

}

.google {

    border-radius: 50px;

}

.title {
    color: var(--nav-color);
    font-size: 32px;
    font-weight: 700;
}
</style>

<script>
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap-icons/font/bootstrap-icons.css'
import BlueButton from '@/components/BlueButton.vue';
export default {
    components: {
        BlueButton
    },

    data() {
        return {
            username: "",
            password: "",
            showPassword: false,
        };
    },
    methods: {
        togglePassword() {
            this.showPassword = !this.showPassword;
        },
    },
};
</script>
