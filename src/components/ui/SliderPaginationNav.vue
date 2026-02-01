<script setup lang="ts">
import ChevronIcon from '@/components/icons/ChevronIcon.vue';

defineProps<{
  prevElClass: string;
  nextElClass: string;
  paginationClass: string;
}>();
</script>

<template>
  <div class="slider-pagination-nav">
    <div :class="prevElClass" class="slider-pagination-nav__button">
      <ChevronIcon />
    </div>
    <div :class="[paginationClass, 'swiper-pagination']"/>
    <div :class="nextElClass" class="slider-pagination-nav__button slider-pagination-nav__button--next">
      <ChevronIcon />
    </div>
  </div>
</template>

<style scoped lang="scss">
.slider-pagination-nav {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 24px;
}

.slider-pagination-nav__button {
  width: 47px;
  height: 47px;
  flex-shrink: 0;
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
</style>

<style lang="scss" scoped>
.slider-pagination-nav :deep(.swiper-pagination) {
  position: static !important;
  left: auto !important;
  transform: none !important;
  gap: 20px !important;
  display: flex !important;
  align-items: center !important;
  justify-content: center !important;
  min-width: 100px;
}

.slider-pagination-nav :deep(.swiper-pagination-bullet) {
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

.slider-pagination-nav :deep(.swiper-pagination-bullet-active),
.slider-pagination-nav :deep(.swiper-pagination-bullet-active-main) {
  background-color: $color-yellow !important;
  transform: scale(1) !important;
}
</style>
