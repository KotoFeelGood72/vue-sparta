<script setup lang="ts">
import { Navigation, Pagination } from 'swiper/modules';
import ChevronIcon from '@/components/icons/ChevronIcon.vue';

</script>

<template>
  <div class="brand-slider">
    <slot name="head"/>
    <div class="brand-slider__wrapper">
      <div class="brand-slider__container">
        <div class="intro-slider-navigation-prev brand-slider__nav-button brand-slider__nav-button--prev">
          <ChevronIcon />
        </div>
        <Swiper
          :modules="[Navigation, Pagination]"
          :navigation="{
            nextEl: '.intro-slider-navigation-next',
            prevEl: '.intro-slider-navigation-prev',
          }"
          :slidesPerView="'auto'"
          :spaceBetween="40"
        >
          <SwiperSlide v-for="brand in 6" :key="brand">
            <div class="brand-slider__item">
              <img :src="`/images/brand-${brand + 1}.png`" alt="" class="brand-slider__image">
            </div>
          </SwiperSlide>
        </Swiper>
        <div class="intro-slider-navigation-next brand-slider__nav-button brand-slider__nav-button--next">
          <ChevronIcon />
        </div>
      </div>
    </div>
  </div>
</template>


<style scoped lang="scss">
@import '@/styles/variables';

.brand-slider {
  &__wrapper {
    background-color: $color-white;
    padding: 28px 0;

    @media (min-width: 1024px) {
      padding: 28px 0;
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
  }

  &__image {
    display: block;
    height: 100%;
    object-fit: contain;
  }
}

:deep(.swiper-slide) {
  width: auto !important;
}

:deep(.swiper-button-lock) {
  background-color: $color-light-gray !important;
}
</style>
