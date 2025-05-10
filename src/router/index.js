
import { createRouter, createWebHistory } from 'vue-router'

import Home from '@/views/Home.vue'

const routes = [
    { path: '/', name: 'Home', component: Home },
]

export default createRouter({
    history: createWebHistory(),
    routes,
    scrollBehavior: () => ({ top: 0 })
})