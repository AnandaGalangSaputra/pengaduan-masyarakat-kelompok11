<template>
    <section class="vh-100 bgr-gambar">
        <div
            class="container vh-100 d-flex justify-content-center align-items-center back-form"
        >
            <div class="row d-flex justify-content-center align-items-center">
                <h1 class="title mb-4 text-center">Daftar</h1>

                <div class="w-100 px-4" style="max-width: 400px">
                    <div class="mb-2">
                        <label class="form-label nav-color fw-semibold"
                            >No Telp</label
                        >
                        <input
                            type="text"
                            class="form-control bg-light"
                            placeholder="Masukkan nomor anda"
                            v-model="username"
                        />
                    </div>
                    <div class="mb-2">
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
                    <div class="mb-2">
                        <label class="form-label nav-color fw-semibold"
                            >Password</label
                        >
                        <div class="input-group">
                            <input
                                :type="showPassword ? 'text' : 'password'"
                                class="form-control bg-light"
                                placeholder="Masukkan ulang password anda"
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
                    <div class="pt-4 text-end">
                        <BlueButton text="Masuk" class="button-blue" />
                    </div>

                    <p
                        class="text-center text-decoration-none blue-color fw-semibold lupa-pass mt-3"
                    >
                        atau
                    </p>
                    <div class="d-flex justify-content-center my-1">
                        <img
                            src="../assets/SignUp.png"
                            alt=""
                            class="img-container gambar"
                        />
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
    padding-bottom: 840px;
}

.back-form {
    background-image: url("../assets/Images/texture.png");
    border-bottom-left-radius: 40px;
    border-bottom-right-radius: 40px;
}

.lupa-pass {
    font-size: 14px;
}

.button-blue {
    width: 100%;
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
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap-icons/font/bootstrap-icons.css";
import BlueButton from "@/components/BlueButton.vue";
export default {
    components: {
        BlueButton,
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
