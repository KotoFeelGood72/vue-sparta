<script setup lang="ts">
import { Navigation, Pagination } from 'swiper/modules';
import ChevronIcon from '@/components/icons/ChevronIcon.vue';

</script>

<template>
  <div class="brand-slider">
    <slot name="head"/>
    <div class="brand-slider--wrapper bg-white lg:py-7">
      <div class="container flex items-center justify-between">
          <div class="lg:w-[47px] lg:h-[47px] flex items-center justify-center bg-yellow rounded-full intro-slider-navigation-prev">
            <ChevronIcon />
          </div>
          <Swiper :modules="[Navigation, Pagination]" :navigation="{
            nextEl: '.intro-slider-navigation-next',
            prevEl: '.intro-slider-navigation-prev',
          }" :slidesPerView="'auto'" :spaceBetween="40">
            <SwiperSlide v-for="brand in 6" :key="brand">
              <div class="brand-slider-item flex items-center justify-center h-[100px]">
                <img :src="`/images/brand-${brand + 1}.png`" alt="">
              </div>
            </SwiperSlide>
          </Swiper>
          <div class="lg:w-[47px] lg:h-[47px] flex items-center justify-center bg-yellow rounded-full intro-slider-navigation-next">
            <ChevronIcon class="rotate-180" />
          </div>
      </div>
    </div>
  </div>
</template>


<style scoped>
:deep(.swiper-slide) {
  width: auto !important;
}

:deep(.swiper-button-lock) {
  background-color: #EAEAEA !important;
}
</style>
