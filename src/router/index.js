
import { createRouter, createWebHistory } from 'vue-router'

import Home from '@/views/Home.vue'
import Tentang from "@/views/Tentang.vue";


const routes = [
    {
        path: "/",
        name: "Home",
        component: Home,
        children: [
            {
                path: "tentang", // => ini akan membuat path '/tentang'
                name: "Tentang",
                component: Tentang,
            },
        ],
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
    scrollBehavior: () => ({ top: 0 })
})