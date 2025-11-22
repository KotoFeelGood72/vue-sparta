<script setup lang="ts">
import { Navigation, Pagination } from 'swiper/modules';

import SpeedIcon from '@/components/icons/SpeedIcon.vue';
import ShieldIcon from '@/components/icons/ShieldIcon.vue';
import GarantIcon from '@/components/icons/GarantIcon.vue';
import ChevronIcon from '@/components/icons/ChevronIcon.vue';
</script>

<template>
  <div class="intro-slider relative">
      <Swiper :modules="[Navigation, Pagination]">
        <SwiperSlide v-for="slide in 3" :key="slide">
          <div class="container">
            <div class="intro-slider-item lg:flex">
              <div class="intro-slider-item-content max-w-[731px]">
                <h1 class="lg:text-75 font-bebas text-gray lg:mb-5">Поставка двигателей для спецтехники</h1>
                <ul class="grid lg:grid-cols-3 lg:gap-12">
                  <li>
                    <div class="flex items-center mb-2">
                      <SpeedIcon />
                    </div>
                    <h3 class="text-25 text-gray font-semibold">Скорость</h3>
                    <p class="text-20 text-gray leading-[175%] ">Мы быстро расцениваем заявки и оперативно доставляем запчасти, чтобы сократить время простоя техники.</p>
                  </li>
                  <li>
                    <div class="flex items-center mb-2">
                      <ShieldIcon />
                    </div>
                    <h3 class="text-25 text-gray font-semibold">Надежность</h3>
                    <p class="text-20 text-gray leading-[175%] ">Мы не работаем с подделками и сомнительными производителями.</p>
                  </li>
                  <li>
                    <div class="flex items-center mb-2">
                      <GarantIcon />
                    </div>
                    <h3 class="text-25 text-gray font-semibold">Гарантия</h3>
                    <p class="text-20 text-gray leading-[175%] ">Мы всегда честно сообщаем о сроках, стоимости. На все запчасти есть гарантия.</p>
                  </li>
                </ul>
              </div>
              <div class="intro-slider-item-image absolute -top-[20%] -right-[2%]">
                <img src="/images/intro-slide.png" alt="">
              </div>
            </div>
          </div>
        </SwiperSlide>
      </Swiper>
      <div>
        <div>
          <ChevronIcon />
        </div>
        <div class="swiper-pagination"></div>
        <div>
          <ChevronIcon />
        </div>
      </div>
  </div>
</template>
