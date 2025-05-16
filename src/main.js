import { createApp } from 'vue'
import './assets/main.css'
import App from './App.vue'
import router from './router'
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/js/bootstrap.bundle.min.js'
import '@fortawesome/fontawesome-free/css/all.min.css'
import '@fortawesome/fontawesome-free/js/all.min.js'
import AOS from 'aos' // Import AOS
import 'aos/dist/aos.css' // Import CSS AOS

const app = createApp(App)

app.AOS = AOS.init({
  duration: 650,          
  easing: 'ease-in-out',  
  once: true,             
  offset: 100,            
})

app.use(router)
app.mount('#app')

// app.config.globalProperties.$nextTick(() => {
//   AOS.refresh()
// })