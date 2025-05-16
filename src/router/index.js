
import { createRouter, createWebHistory } from 'vue-router'

import Home from '@/views/Home.vue'
import Tentang from "@/views/Tentang.vue";
import Daftar from "@/views/Daftar.vue";
import Login from "@/views/Login.vue";
import FormPengaduan from "@/views/FormPengaduan.vue";

const routes = [
    {
        path: "/",
        name: "Home",
        component: Home,
        children: [
            {
                path: "tentang",
                name: "Tentang",
                component: Tentang,
            },
        ],
    },
    {
        path: "/login",
        name: "Login",
        component: Login,
    },
    {
        path: "/daftar",
        name   : "Daftar",
        component: Daftar,
    },
    {
        path: "/formpengaduan",
        name: "FormPengaduan",
        component: FormPengaduan,
    },

    {
        path: "/:pathMatch(.*)*",
        name: "NotFound",
        component: () => import("@/views/NotFound.vue")
    },

    {
        path: "/pusatbantuan",
        name: "Pusatbantuan",
        component: () => import("@/views/PusatBantuan.vue")
    }
];

export default createRouter({
    history: createWebHistory(),
    routes,
    scrollBehavior: () => ({ top: 0 })
})