<script setup lang="ts">
import { Navigation, Pagination } from 'swiper/modules';

</script>

<template>
  <div class="brand-slider">
    <slot name="head"/>
    <div class="container">
      <Swiper :modules="[Navigation, Pagination]">
        <SwiperSlide v-for="brand in 8" :key="brand">
          <img :src="`/images/brand-${brand + 1}.png`" alt="">
        </SwiperSlide>
      </Swiper>
    </div>

  </div>
</template>

