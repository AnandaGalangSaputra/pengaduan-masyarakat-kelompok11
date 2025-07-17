
import { createRouter, createWebHistory } from 'vue-router'

const Home = () => import('@/views/Home.vue')
const Tentang = () => import('@/views/Tentang.vue')
const Daftar = () => import('@/views/Daftar.vue')
const Login = () => import('@/views/Login.vue')
const FormPengaduan = () => import('@/views/FormPengaduan.vue')
const LacakPengaduan = () => import('@/views/LacakPengaduan.vue')

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
        path: "/lacakpengaduan",
        name: "LacakPengaduan",
        component: LacakPengaduan,
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