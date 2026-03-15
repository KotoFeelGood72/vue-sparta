<script setup lang="ts">
import 'swiper/css/pagination';

import { toRaw } from 'vue';
import { Navigation, Pagination } from 'swiper/modules';

import SectionHead from '@/components/blocks/section-head/SectionHead.vue';
import DefaultCard from '@/components/cards/DefaultCard.vue';
import type { DefaultCardModel } from '@/components/cards/DefaultCard.vue';
import SliderPaginationNav from '@/components/ui/SliderPaginationNav.vue';

const { agregates } = defineProps<{ agregates: DefaultCardModel[] }>();

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
  <div class="agregates-section">
    <div class="agregates-section__container">
      <div class="agregates-section__header">
        <SectionHead title="Агрегаты" buttonText="смотреть все" buttonAbsolute/>
      </div>
      <div class="agregates-section__slider-wrapper">
        <Swiper
          :modules="[Navigation, Pagination]"
          :breakpoints="toRaw(breakpoints)"
          :speed="700"
          :navigation="{
            nextEl: '.agregates-slider-navigation-next',
            prevEl: '.agregates-slider-navigation-prev',
          }"
          :pagination="{
            el: '.agregates-slider-pagination',
            clickable: true,
          }"
          class="agregates-section__swiper"
        >
          <SwiperSlide v-for="agregate in agregates" :key="agregate.id" class="agregates-section__slide">
            <DefaultCard v-bind="agregate"/>
          </SwiperSlide>
        </Swiper>
        <div class="agregates-section__navigation">
          <SliderPaginationNav
            prev-el-class="agregates-slider-navigation-prev"
            next-el-class="agregates-slider-navigation-next"
            pagination-class="agregates-slider-pagination"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped lang="scss">

.agregates-section {

  @include bp($point_2) {
    padding: 55px 0;
    position: relative;
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
