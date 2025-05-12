<script setup>
import { RouterLink, RouterView } from "vue-router";
import loginButton from "@/components/WhiteButtonOutline.vue";
const items = [{ to: "/", name: "Home" }];
</script>

<style scoped>
.navbar {
  background-color: var(--nav-color) !important;
}
</style>
<template>
  <nav class="navbar navbar-expand-lg navbar-dark shadow-lg fixed-top">
    <div class="container">
      <a class="navbar-brand fw-bold hoverable fst-italic" id="userName" href="#"
        >Pengaduan Masyarakat</a
      >
      <button
        class="navbar-toggler hoverable"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fa-solid fa-burger"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto gap-3">
          <li class="nav-item">
            <a class="nav-link active hoverable" href="#hero">Beranda</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link hoverable" href="#layanan">Pusat Bantuan</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link hoverable" href="#layanan">Daftar</a>
          </li>
          <li class="nav-item active">
            <loginButton text="Masuk" icon="fa-solid fa-arrow-right-to-bracket" />
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <router-view></router-view>
</template>
