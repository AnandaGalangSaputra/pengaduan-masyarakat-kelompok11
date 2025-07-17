<script setup>
import { RouterLink, RouterView } from "vue-router";
import loginButton from "@/components/WhiteButtonOutline.vue";
const items = [{ to: "/", name: "Home" }];

import { ref, onMounted } from "vue";

const lastScrollPosition = ref(0);
const isNavbarVisible = ref(true);
const navbar = ref(null);

onMounted(() => {
  window.addEventListener('scroll', () => {
    const currentScrollPosition = window.pageYOffset || document.documentElement.scrollTop;

    if (currentScrollPosition < 0) {
      return;
    }

    if (Math.abs(currentScrollPosition - lastScrollPosition.value) < 60) {
      return;
    }

    isNavbarVisible.value = currentScrollPosition < lastScrollPosition.value;
    lastScrollPosition.value = currentScrollPosition;

    navbar.value = document.getElementById('navbar');
    if (navbar.value) {
      navbar.value.style.transform = isNavbarVisible.value ? 'translateY(0)' : 'translateY(-100%)';
      navbar.value.style.transition = 'transform 0.8s';
    }
  });
});
</script>

<style scoped>
.navbar {
  background-color: var(--nav-color) !important;
}

navbar-toggler:hover {
  border: none;
}

navbar-toggler::after {
  border: none;
}

</style>
<template>
  <nav class="navbar navbar-expand-lg navbar-dark shadow-lg fixed-top" id="navbar">
    <div class="container">
      <a class="navbar-brand fw-bold hoverable fst-italic" id="userName" href="#"><router-link to="/" class="text-decoration-none text-light">Pengaduan Masyarakat</router-link></a>
      <button class="navbar-toggler border-0 hoverable" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto gap-3">
          <li class="nav-item">
            <a><router-link to="/" class="nav-link active hoverable">Beranda</router-link></a>
          </li>
          <li class="nav-item active">
            <router-link to="/formpengaduan" class="text-decoration-none">
            <a class="nav-link hoverable" href="#footer">Buat Pengaduan</a>
          </router-link>
          </li>
          <li class="nav-item active">
            <router-link to="/lacakpengaduan" class="text-decoration-none">
            <a class="nav-link hoverable" href="#footer">Lacak Pengaduan</a>
          </router-link>
          </li>
          <li class="nav-item active">
            <router-link to="/pusatbantuan" class="text-decoration-none">
            <a class="nav-link hoverable" href="#footer">Pusat Bantuan</a>
          </router-link>
          </li>
          <!-- <li class="nav-item active">
          <router-link to="/daftar" class="text-decoration-none">
            <a class="nav-link hoverable" href="#layanan">Daftar</a>
          </router-link>
          </li>
          <li class="nav-item active d-flex align-items-center">
            <router-link to="/login" class="nav-link active hoverable p-0">
              <loginButton text="Masuk" icon="fa-solid fa-arrow-right-to-bracket" />
            </router-link>
          </li> -->
        </ul>
      </div>
    </div>
  </nav>
  <router-view></router-view>
</template>
