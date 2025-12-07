<script setup lang="ts">
import 'swiper/css/pagination';

import { Navigation, Pagination } from 'swiper/modules';

import SpeedIcon from '@/components/icons/SpeedIcon.vue';
import ShieldIcon from '@/components/icons/ShieldIcon.vue';
import GarantIcon from '@/components/icons/GarantIcon.vue';
import ChevronIcon from '@/components/icons/ChevronIcon.vue';
</script>

<template>
  <div class="intro-slider relative">
    <div class="slider-decorator absolute top-0 right-0">
      <img src="/images/slider-decorator.png" alt="">
    </div>
      <Swiper
        :modules="[Navigation, Pagination]"
        :speed="700"
        :navigation="{
          nextEl: '.intro-slider-navigation-next',
          prevEl: '.intro-slider-navigation-prev',
        }"
        :pagination="{
          el: '.intro-slider-pagination',
          clickable: true,
        }"
      >
        <SwiperSlide v-for="slide in 3" :key="slide">
          <div class="container">
            <div class="intro-slider-item lg:flex py-20">
              <div class="intro-slider-item-content max-w-[731px]">
                <h1 class="lg:text-75 font-bebas text-gray lg:mb-5 max-w-[560px]">Поставка двигателей для спецтехники</h1>
                <ul class="flex flex-col max-w-[560px] gap-6">
                  <li>
                    <div class="flex items-center gap-8 mb-3">
                      <div class="flex items-center">
                        <SpeedIcon />
                      </div>
                      <h3 class="text-25 text-gray font-semibold">Скорость</h3>
                    </div>
                    <p class="text-20 text-gray ">Мы быстро расцениваем заявки и оперативно доставляем запчасти, чтобы сократить время простоя техники.</p>
                  </li>
                  <li>
                    <div class="flex items-center gap-8 mb-3">
                      <div class="flex items-center">
                        <ShieldIcon />
                      </div>
                      <h3 class="text-25 text-gray font-semibold">Надежность</h3>
                    </div>
                    <p class="text-20 text-gray ">Мы не работаем с подделками и сомнительными производителями.</p>
                  </li>
                  <li>
                    <div class="flex items-center gap-8 mb-3">
                      <div class="flex items-center">
                        <GarantIcon />
                      </div>
                      <h3 class="text-25 text-gray font-semibold">Гарантия</h3>
                    </div>
                    <p class="text-20 text-gray ">Мы всегда честно сообщаем о сроках, стоимости. На все запчасти есть гарантия.</p>
                  </li>
                </ul>
              </div>
              <div class="intro-slider-item-image absolute top-0 right-0">
                <img src="/images/intro-slide.png" alt="">
              </div>
            </div>
          </div>
        </SwiperSlide>
      </Swiper>
      <div class="container relative">
        <div class="intro-slider-navigation absolute bottom-10 right-0 flex items-center justify-center gap-6 z-10">
          <div class="intro-slider-navigation-prev w-10 h-10 flex items-center justify-center bg-yellow rounded-full cursor-pointer shrink-0">
            <ChevronIcon />
          </div>
          <div class="intro-slider-pagination swiper-pagination"></div>
          <div class="intro-slider-navigation-next w-10 h-10 flex items-center justify-center bg-yellow rounded-full rotate-180 shrink-0 cursor-pointer">
            <ChevronIcon />
          </div>
        </div>
      </div>
  </div>
</template>

<style scoped>

.intro-slider {
  background-image: url('/images/intro-bg.png');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
}
:deep(.intro-slider-pagination) {
  position: static;
  gap: 20px !important;
  display: flex !important;
}

:deep(.intro-slider-pagination .swiper-pagination-bullet) {
  background-color: #C3C3C3 !important;
  opacity: 1 !important;
  width: 17px !important;
  height: 17px !important;
}

:deep(.intro-slider-pagination .swiper-pagination-bullet-active) {
  background-color: #FDC043 !important;
}

</style>
