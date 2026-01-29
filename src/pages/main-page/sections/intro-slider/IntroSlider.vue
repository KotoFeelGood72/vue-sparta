<script setup lang="ts">
import 'swiper/css/pagination';

import { Navigation, Pagination } from 'swiper/modules';

import SpeedIcon from '@/components/icons/SpeedIcon.vue';
import ShieldIcon from '@/components/icons/ShieldIcon.vue';
import GarantIcon from '@/components/icons/GarantIcon.vue';
import ChevronIcon from '@/components/icons/ChevronIcon.vue';
</script>

<template>
  <div class="intro-slider">
    <div class="intro-slider__decorator">
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
        <div class="intro-slider__container">
          <div class="intro-slider__item">
            <div class="intro-slider__content">
              <h1 class="intro-slider__title">Поставка двигателей для спецтехники</h1>
              <ul class="intro-slider__features">
                <li class="intro-slider__feature">
                  <div class="intro-slider__feature-header">
                    <div class="intro-slider__feature-icon">
                      <SpeedIcon />
                    </div>
                    <h3 class="intro-slider__feature-title">Скорость</h3>
                  </div>
                  <p class="intro-slider__feature-text">Мы быстро расцениваем заявки и оперативно доставляем запчасти, чтобы сократить время простоя техники.</p>
                </li>
                <li class="intro-slider__feature">
                  <div class="intro-slider__feature-header">
                    <div class="intro-slider__feature-icon">
                      <ShieldIcon />
                    </div>
                    <h3 class="intro-slider__feature-title">Надежность</h3>
                  </div>
                  <p class="intro-slider__feature-text">Мы не работаем с подделками и сомнительными производителями.</p>
                </li>
                <li class="intro-slider__feature">
                  <div class="intro-slider__feature-header">
                    <div class="intro-slider__feature-icon">
                      <GarantIcon />
                    </div>
                    <h3 class="intro-slider__feature-title">Гарантия</h3>
                  </div>
                  <p class="intro-slider__feature-text">Мы всегда честно сообщаем о сроках, стоимости. На все запчасти есть гарантия.</p>
                </li>
              </ul>
            </div>
            <div class="intro-slider__image-wrapper">
              <img src="/images/intro-slide.png" alt="" class="intro-slider__image">
            </div>
          </div>
        </div>
      </SwiperSlide>
    </Swiper>
    <div class="intro-slider__navigation-container">
      <div class="intro-slider__navigation">
        <div class="intro-slider-navigation-prev intro-slider__nav-button">
          <ChevronIcon />
        </div>
        <div class="intro-slider-pagination swiper-pagination"></div>
        <div class="intro-slider-navigation-next intro-slider__nav-button intro-slider__nav-button--next">
          <ChevronIcon />
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped lang="scss">
@import '@/styles/variables';

.intro-slider {
  position: relative;
  background-image: url('/images/intro-bg.png');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;

  &__decorator {
    position: absolute;
    top: 0;
    right: 0;
    z-index: 1;
  }

  &__container {
    max-width: 1187px;
    margin: 0 auto;
    padding: 0 16px;
  }

  &__item {
    padding: 80px 0;
    position: relative;

    @media (min-width: 1024px) {
      display: flex;
    }
  }

  &__content {
    max-width: 731px;
  }

  &__title {
    font-size: $font-size-55;
    line-height: $line-height-55;
    font-family: $font-family-bebas;
    color: $color-gray;
    max-width: 560px;
    margin-bottom: 20px;

    @media (min-width: 1024px) {
      font-size: $font-size-75;
      line-height: $line-height-75;
      margin-bottom: 20px;
    }
  }

  &__features {
    display: flex;
    flex-direction: column;
    gap: 24px;
    max-width: 560px;
    list-style: none;
    padding: 0;
    margin: 0;
  }

  &__feature {
    margin: 0;
  }

  &__feature-header {
    display: flex;
    align-items: center;
    gap: 32px;
    margin-bottom: 12px;
  }

  &__feature-icon {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  &__feature-title {
    font-size: $font-size-25;
    line-height: $line-height-25;
    color: $color-gray;
    font-weight: 600;
  }

  &__feature-text {
    font-size: $font-size-20;
    line-height: $line-height-20;
    color: $color-gray;
  }

  &__image-wrapper {
    position: absolute;
    top: 0;
    right: 0;

    @media (min-width: 1024px) {
      position: relative;
    }
  }

  &__image {
    display: block;
  }

  &__navigation-container {
    max-width: 1187px;
    margin: 0 auto;
    padding: 0 16px;
    position: relative;
  }

  &__navigation {
    position: absolute;
    bottom: 40px;
    right: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 24px;
    z-index: 10;
  }

  &__nav-button {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: $color-yellow;
    border-radius: 50%;
    cursor: pointer;
    flex-shrink: 0;
    border: none;
    transition: opacity 0.2s;

    &:hover {
      opacity: 0.9;
    }

    &--next {
      transform: rotate(180deg);
    }
  }
}

:deep(.intro-slider-pagination) {
  position: static;
  gap: 20px !important;
  display: flex !important;
}

:deep(.intro-slider-pagination .swiper-pagination-bullet) {
  background-color: $color-pagination-gray !important;
  opacity: 1 !important;
  width: 17px !important;
  height: 17px !important;
}

:deep(.intro-slider-pagination .swiper-pagination-bullet-active) {
  background-color: $color-yellow !important;
}
</style>
