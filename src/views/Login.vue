
<template>
    <section class="vh-100 bgr-gambar">
        <div
            class="container vh-100 d-flex justify-content-center align-items-center back-form"
        >
            <div class="row d-flex justify-content-center align-items-center">
                <h1 class="title mb-5 text-center">Masuk</h1>

                <div class="w-100 px-4" style="max-width: 400px">
                    <div class="mb-3">
                        <label class="form-label nav-color fw-semibold"
                            >Username</label
                        >
                        <input
                            type="text"
                            class="form-control bg-light"
                            placeholder="Masukkan username anda"
                            v-model="username"
                        />
                    </div>

                    <div class="mb-2">
                        <label class="form-label nav-color fw-semibold"
                            >Password</label
                        >
                        <div class="input-group">
                            <input
                                :type="showPassword ? 'text' : 'password'"
                                class="form-control bg-light"
                                placeholder="Masukkan password anda"
                                v-model="password"
                            />
                            <span
                                class="input-group-text bg-light"
                                @click="togglePassword"
                                style="cursor: pointer"
                            >
                                <i
                                    :class="
                                        showPassword
                                            ? 'bi bi-eye-slash'
                                            : 'bi bi-eye'
                                    "
                                ></i>
                            </span>
                        </div>
                    </div>

                    <div class="mb-3 text-end">
                        <a
                            href="#"
                            class="text-decoration-none text-primary fw-semibold"
                            ><u>Lupa Password?</u></a
                        >
                    </div>
                    <BlueButton
                        text="Masuk"
                        class="button-blue"
                    />
                    
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
.bgr-gambar {
    background-image: url("../assets/Images/bgindo.png");
    background-size: 100%;
    padding-top: 100px;
}

.back-form {
    background-image: url("../assets/Images/texture.png");
    border-top-left-radius: 40px;
    border-top-right-radius: 40px;
}

.button-blue {
    width: 100%;
   
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
    components : {
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
