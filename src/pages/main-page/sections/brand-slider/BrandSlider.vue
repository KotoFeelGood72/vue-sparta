<script setup lang="ts">
import { toRaw } from 'vue';
import { Navigation } from 'swiper/modules';
import ChevronIcon from '@/components/icons/ChevronIcon.vue';

const breakpoints = {
  0: {
    slidesPerView: 2,
    spaceBetween: 20,
  },
  480: {
    slidesPerView: 2,
    spaceBetween: 20,
  },
  768: {
    slidesPerView: 3,
    spaceBetween: 40,
  },
  1024: {
    slidesPerView: 4,
    spaceBetween: 40,
  },
};
</script>

<template>
  <div class="brand-slider">
    <slot name="head"/>
    <div class="brand-slider__wrapper">
      <div class="brand-slider__container">
        <div class="brand-slider-navigation-prev brand-slider__nav-button brand-slider__nav-button--prev">
          <ChevronIcon />
        </div>
        <Swiper
          :slides-per-view="1"
          :space-between="20"
          :breakpoints="toRaw(breakpoints)"
          breakpoints-base="container"
          :modules="[Navigation]"
          :navigation="{
            nextEl: '.brand-slider-navigation-next',
            prevEl: '.brand-slider-navigation-prev',
          }"
        >
          <SwiperSlide v-for="brand in 6" :key="brand">
            <div class="brand-slider__item">
              <img :src="`/images/brand-${brand + 1}.png`" alt="" class="brand-slider__image">
            </div>
          </SwiperSlide>
        </Swiper>
        <div class="brand-slider-navigation-next brand-slider__nav-button brand-slider__nav-button--next">
          <ChevronIcon />
        </div>
      </div>
    </div>
  </div>
</template>


<style scoped lang="scss">
// @use '@/styles/variables' as *;

.brand-slider {
  &__wrapper {
    background-color: $color-white;
    padding: 28px 0;

    @media (min-width: 1024px) {
      padding: 28px 0;
    }

    @include bp($point_2) {
      padding: 12px 0;
    }
  }

  &__container {
    max-width: 1187px;
    margin: 0 auto;
    padding: 0 16px;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  &__nav-button {
    width: 47px;
    flex-shrink: 0;
    height: 47px;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: $color-yellow;
    border-radius: 50%;
    cursor: pointer;
    border: none;
    transition: opacity 0.2s;

    @include bp($point_2) {
      width: 32px;
      height: 32px;
    }

    svg {
      @include bp($point_2) {
        width: 12px;
        height: 12px;
      }
    }

    &:hover {
      opacity: 0.9;
    }

    &--next {
      transform: rotate(180deg);
    }
  }

  &__item {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100px;

    @include bp($point_2) {
      height: 70px;

    }
  }

  &__image {
    display: block;
    height: 100%;
    object-fit: contain;

    @include bp($point_2) {
      width: 100px;
    }
  }
}

:deep(.swiper-button-lock) {
  background-color: $color-light-gray !important;
}
</style>
