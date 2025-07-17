<template>
  <section class="vh-100 bgr-gambar">
    <div
      class="container vh-100 d-flex justify-content-center align-items-center"
    >
      <div
        class="row d-flex justify-content-center align-items-center back-form mt-5 p-5"
      >
        <h1 class="title mb-4 text-center">Daftar</h1>

        <div class="w-100 px-4" style="max-width: 400px">
          <div class="mb-2">
            <label class="form-label nav-color fw-semibold">No Telp</label>
            <input
              type="text"
              class="form-control bg-light"
              placeholder="Masukkan nomor anda"
              v-model="notelp"
            />
          </div>
          <div class="mb-2">
            <label class="form-label nav-color fw-semibold">Username</label>
            <input
              type="text"
              class="form-control bg-light"
              placeholder="Masukkan username anda"
              v-model="username"
            />
          </div>

          <div class="mb-2">
            <label class="form-label nav-color fw-semibold">Password</label>
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
                <i :class="showPassword ? 'bi bi-eye-slash' : 'bi bi-eye'"></i>
              </span>
            </div>
          </div>
          <div class="mb-2">
            <label class="form-label nav-color fw-semibold">Confirm Password</label>
            <div class="input-group">
              <input
                :type="showrePassword ? 'text' : 'password'"
                class="form-control bg-light"
                placeholder="Masukkan ulang password anda"
                v-model="repassword"
              />
              <span
                class="input-group-text bg-light"
                @click="togglerePassword"
                style="cursor: pointer"
              >
                <i :class="showrePassword ? 'bi bi-eye-slash' : 'bi bi-eye'"></i>
              </span>
            </div>
          </div>
          <div class="pt-4 text-end">
            <BlueButton text="Daftar" class="button-blue" />
          </div>
          <div class="">
            <p
              class="text-center text-decoration-none blue-color fw-semibold lupa-pass mt-3"
            >
              atau
            </p>
            <p
              class="text-center text-decoration-none blue-color fw-semibold lupa-pass mt-3"
            >
              <a href="">Sudah Punya Akun?</a>
            </p>
          </div>
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
  /* border-bottom-left-radius: 40px;
    border-bottom-right-radius: 40px; */
  border-radius: 40px;
}

.lupa-pass {
  font-size: 14px;
}

.button-blue {
  transition: all 0.3s ease-in-out;
  position: relative;
  background: #007bff;
  width: 100%;
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
      notelp: "",
      username: "",
      password: "",
      repassword: "",
      showPassword: false,
      showrePassword: false,

    };
  },
  methods: {
    togglePassword() {
      this.showPassword = !this.showPassword;
    },
togglerePassword() {
      this.showrePassword = !this.showrePassword;
    },
    
  },
};
</script>
