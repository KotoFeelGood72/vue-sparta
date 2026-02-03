import { createApp } from 'vue'
import { createPinia } from 'pinia'
import Notifications from '@kyvg/vue3-notification'

import App from './App.vue'
import router from './router'
import './styles/main.scss'

// Swiper
import 'swiper/css'
import { Swiper, SwiperSlide } from 'swiper/vue'

const app = createApp(App)

// Register Swiper components globally
app.component('Swiper', Swiper)
app.component('SwiperSlide', SwiperSlide)

app.use(createPinia())
app.use(router)
app.use(Notifications)

app.mount('#app')
