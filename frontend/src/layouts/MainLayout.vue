<script setup>
import { RouterLink, RouterView } from "vue-router";
import loginButton from "@/components/WhiteButtonOutline.vue";
const items = [{ to: "/", name: "Home" }];

import { ref, onMounted } from "vue";

const lastScrollPosition = ref(0);
const isNavbarVisible = ref(true);
const navbar = ref(null);

onMounted(() => {
    window.addEventListener("scroll", () => {
        const currentScrollPosition =
            window.pageYOffset || document.documentElement.scrollTop;

        if (currentScrollPosition < 0) {
            return;
        }

        if (Math.abs(currentScrollPosition - lastScrollPosition.value) < 60) {
            return;
        }

        isNavbarVisible.value =
            currentScrollPosition < lastScrollPosition.value;
        lastScrollPosition.value = currentScrollPosition;

        navbar.value = document.getElementById("navbar");
        if (navbar.value) {
            navbar.value.style.transform = isNavbarVisible.value
                ? "translateY(0)"
                : "translateY(-100%)";
            navbar.value.style.transition = "transform 0.8s";
        }
    });
});
</script>

<style scoped>
.navbar {
    background-color: var(--nav-color) !important;
}

.navbar .nav-link {
    color: rgba(255, 255, 255, 0.7); /* Teks sedikit pudar saat tidak aktif */
    transition: color 0.3s ease, font-weight 0.3s ease; /* Animasi perubahan warna dan ketebalan */
}

.navbar .nav-link.active {
    color: white !important; /* Teks putih dan tebal saat halaman aktif */
}

.navbar .nav-link:hover {
    color: white; /* Teks menjadi putih saat di-hover */
}

.navbar-toggler:hover {
    border: none;
}

.navbar-toggler::after {
    border: none;
}
</style>

<template>
    <nav
        class="navbar navbar-expand-lg navbar-dark shadow-lg fixed-top"
        id="navbar"
    >
        <div class="container">
            <a
                class="navbar-brand fw-bold hoverable fst-italic"
                id="userName"
                href="#"
            >
                <router-link to="/" class="text-decoration-none text-light"
                    >Pengaduan Masyarakat</router-link
                >
            </a>
            <button
                class="navbar-toggler border-0 hoverable"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto gap-3">
                    <li class="nav-item">
                        <router-link
                            to="/"
                            class="nav-link"
                            active-class="active"
                            >Beranda</router-link
                        >
                    </li>
                    <li class="nav-item">
                        <router-link
                            to="/formpengaduan"
                            class="nav-link"
                            active-class="active"
                            >Buat Pengaduan</router-link
                        >
                    </li>
                    <li class="nav-item">
                        <router-link
                            to="/lacakpengaduan"
                            class="nav-link"
                            active-class="active"
                            >Lacak Pengaduan</router-link
                        >
                    </li>
                    <li class="nav-item">
                        <router-link
                            to="/pusatbantuan"
                            class="nav-link"
                            active-class="active"
                            >Pusat Bantuan</router-link
                        >
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <router-view></router-view>
</template>
