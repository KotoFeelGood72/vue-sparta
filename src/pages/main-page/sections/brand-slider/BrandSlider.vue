<script setup lang="ts">
import { toRaw } from 'vue'
import { Navigation } from 'swiper/modules'
import ChevronIcon from '@/components/icons/ChevronIcon.vue'

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
    slidesPerView: 5,
    spaceBetween: 40,
  },
}

defineProps<{
  brands: any[]
}>()
</script>

<template>
  <div class="brand-slider">
    <slot name="head" />
    <div class="brand-slider__wrapper">
      <div class="brand-slider__container container">
        <div class="brand-slider__navigation">
          <div
            class="brand-slider-navigation-prev brand-slider__nav-button brand-slider__nav-button--prev"
          >
            <ChevronIcon />
          </div>
          <div
            class="brand-slider-navigation-next brand-slider__nav-button brand-slider__nav-button--next"
          >
            <ChevronIcon />
          </div>
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
          <SwiperSlide v-for="brand in brands" :key="brand.id">
            <div class="brand-slider__item">
              <img
                v-if="brand.acf.brand_img"
                :src="brand.acf.brand_img"
                :alt="brand.name"
                class="brand-slider__image"
              />
            </div>
          </SwiperSlide>
        </Swiper>
      </div>
    </div>
  </div>
</template>

<style scoped lang="scss">
.brand-slider {
  &__wrapper {
    background-color: $color-white;
    padding: 24px 0;

    @media (min-width: 1024px) {
      margin-bottom: $m-sec;
    }

    @include bp($point_2) {
      padding: 12px 0;
    }
  }

  &__container {
    position: relative;
  }

  &__navigation {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 24px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 105%;
    z-index: 10;

    @include bp($point_2) {
      display: none;
    }
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
    height: 100%;
  }

  &__image {
    display: block;
    height: 100px;
    width: 100%;
    object-fit: contain;
  }
}

:deep(.swiper-button-lock) {
  background-color: $color-light-gray !important;
}

:deep(.swiper-wrapper) {
  align-items: center;
}
</style>
