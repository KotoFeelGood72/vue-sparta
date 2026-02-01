<script setup lang="ts">
import 'swiper/css/pagination';

import { toRaw } from 'vue';
import { Navigation, Pagination } from 'swiper/modules';

import SectionHead from '@/components/blocks/section-head/SectionHead.vue';
import DefaultCard from '@/components/cards/DefaultCard.vue';
import type { DefaultCardModel } from '@/components/cards/DefaultCard.vue';
import SliderPaginationNav from '@/components/ui/SliderPaginationNav.vue';

const { repairs } = defineProps<{ repairs: DefaultCardModel[], headerHidden?: boolean }>();

const breakpoints = {
  0: {
    slidesPerView: 1,
    spaceBetween: 20,
  },
  1024: {
    slidesPerView: 3,
    spaceBetween: 40,
  },
};
</script>

<template>
  <div class="repair-section">
    <div class="repair-section__container">
      <div v-if="!headerHidden" class="repair-section__header">
        <SectionHead title="ремонт" buttonText="смотреть все" buttonAbsolute/>
      </div>
      <div class="repair-section__slider-wrapper">
        <Swiper
          :modules="[Navigation, Pagination]"
          :breakpoints="toRaw(breakpoints)"
          :speed="700"
          :navigation="{
            nextEl: '.repair-slider-navigation-next',
            prevEl: '.repair-slider-navigation-prev',
          }"
          :pagination="{
            el: '.repair-slider-pagination',
            clickable: true,
            dynamicBullets: true,
            dynamicMainBullets: 1,
          }"
          class="repair-section__swiper"
        >
          <SwiperSlide v-for="repair in repairs" :key="repair.id" class="repair-section__slide">
            <DefaultCard v-bind="repair"/>
          </SwiperSlide>
        </Swiper>
        <div class="repair-section__navigation">
          <SliderPaginationNav
            prev-el-class="repair-slider-navigation-prev"
            next-el-class="repair-slider-navigation-next"
            pagination-class="repair-slider-pagination"
          />
        </div>
      </div>
      <slot name="bottom"/>
    </div>
  </div>
</template>

<style scoped lang="scss">
.repair-section {
  position: relative;

  @include bp($point_2) {
    padding: 55px 0;
  }

  &__container {
    max-width: 1187px;
    margin: 0 auto;
    padding: 0 16px;
  }

  &__header {
    margin-bottom: 12px;
  }

  &__slider-wrapper {
    overflow: hidden;
  }

  &__swiper {
    overflow: visible;

    @media (min-width: 1024px) {
      overflow: hidden;
    }
  }

  &__slide {
    height: auto;
  }

  &__navigation {
    display: none;
    justify-content: center;
    margin: 40px auto 30px auto;

    @include bp($point_2) {
      display: flex;
    }
  }
}
</style>
