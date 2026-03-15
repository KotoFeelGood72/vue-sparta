<script setup lang="ts">
import 'swiper/css/pagination'

import { useMediaStoreRefs } from '@/stores/useMediaStore'
import { Navigation, Pagination } from 'swiper/modules'

import SpeedIcon from '@/components/icons/SpeedIcon.vue'
import ShieldIcon from '@/components/icons/ShieldIcon.vue'
import GarantIcon from '@/components/icons/GarantIcon.vue'
import ChevronIcon from '@/components/icons/ChevronIcon.vue'

const { isMobile } = useMediaStoreRefs()

defineProps<{
  slides: any[]
}>()
</script>

<template>
  <div class="intro-slider">
    <div class="intro-slider__decorator" v-if="!isMobile">
      <img src="/images/slider-decorator.png" alt="" />
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
      <SwiperSlide v-for="(item, index) in slides" :key="`slide-${index}`">
        <div class="intro-slider__container">
          <div class="intro-slider__item">
            <div class="intro-slider__content">
              <h1 class="intro-slider__title">{{ item.title }}</h1>
              <ul class="intro-slider__features">
                <li
                  class="intro-slider__feature"
                  v-for="(feature, index) in item.services"
                  :key="`feature-${index}`"
                >
                  <div class="intro-slider__feature-header">
                    <div class="intro-slider__feature-icon">
                      <SpeedIcon v-if="feature.icon === 'speed'" />
                      <ShieldIcon v-if="feature.icon === 'shield'" />
                      <GarantIcon v-if="feature.icon === 'garant'" />
                    </div>
                    <h3 class="intro-slider__feature-title">{{ feature.title }}</h3>
                  </div>
                  <p class="intro-slider__feature-text">
                    {{ feature.text }}
                  </p>
                </li>
              </ul>
            </div>
            <div class="intro-slider__image-wrapper">
              <img
                src="/images/intro-slide.png"
                alt=""
                class="intro-slider__image"
                v-if="!isMobile"
              />
              <img src="/images/hero-mobile.png" alt="" class="intro-slider__image" v-else />
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
        <div class="intro-slider-pagination swiper-pagination" />
        <div
          class="intro-slider-navigation-next intro-slider__nav-button intro-slider__nav-button--next"
        >
          <ChevronIcon />
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped lang="scss">
.intro-slider {
  position: relative;
  background-image: url('/images/intro-bg.png');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;

  @include bp($point_2) {
    overflow: hidden;
  }

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

    @include bp($point_2) {
      position: relative;
    }
  }

  &__item {
    padding: 80px 0;

    @media (min-width: 1024px) {
      display: flex;
    }

    @include bp($point_2) {
      position: relative;
      padding: 50px 0 490px 0;
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

    @include bp($point_2) {
      font-size: 40px;
      text-align: center;
      font-weight: 400;
      line-height: 100%;
      max-width: 315px;
      margin: 0 auto 10px auto;
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
    gap: 20px;
    margin-bottom: 12px;

    @include bp($point_2) {
      flex-direction: column;
      align-items: center;
      gap: 10px;
    }
  }

  &__feature-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 50px;
    height: 50px;

    @include bp($point_2) {
      width: 45px;
      height: 40px;
    }
  }

  &__feature-title {
    font-size: 20px;
    color: $color-gray;
    font-weight: 600;

    @include bp($point_2) {
      font-size: 20px;
      text-align: center;
    }
  }

  &__feature-text {
    font-size: 16px;
    color: $color-gray;

    @include bp($point_2) {
      text-align: center;
    }
  }

  &__image-wrapper {
    position: absolute;
    top: 0;
    right: 0;

    @include bp($point_2) {
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: calc(100% + 32px);
      height: auto;
      top: auto;
    }

    img {
      @include bp($point_2) {
        width: 100%;
      }
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
    bottom: 74px;
    right: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 24px;
    z-index: 10;

    @include bp($point_2) {
      left: 50%;
      transform: translateX(-50%);
      right: auto;
      bottom: 60px;
    }
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

    @include bp($point_2) {
      width: 28px;
      height: 28px;
      padding: 8px;
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
}

:deep(.intro-slider-pagination) {
  position: static !important;
  left: auto !important;
  transform: none !important;
  gap: 20px !important;
  display: flex !important;
  align-items: center !important;
  justify-content: center !important;
  min-width: 60px;
}

:deep(.intro-slider-pagination .swiper-pagination-bullet) {
  background-color: $color-pagination-gray !important;
  opacity: 1 !important;
  width: 17px !important;
  height: 17px !important;
  border-radius: 50% !important;
  transform: scale(1) !important;

  @include bp($point_2) {
    width: 12px !important;
    height: 12px !important;
  }
}

// :deep(.intro-slider-pagination .swiper-pagination-bullet-active),
// :deep(.intro-slider-pagination .swiper-pagination-bullet-active-main) {
//   background-color: $color-yellow !important;
//   transform: scale(1) !important;
// }
</style>
