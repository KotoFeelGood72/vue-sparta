<script setup lang="ts">
import FormComponent from './FormComponent.vue'

defineProps<{
  title: string
  subtitle: string
  theme: 'white' | 'dark'
  image: string
  customClass?: string
}>()
</script>

<template>
  <div class="block-form" :class="`block-form--${theme}`">
    <div class="block-form__decorator">
      <img src="/images/circle-decorator.png" alt="" class="block-form__decorator-image" />
    </div>
    <div class="block-form__image" :class="customClass">
      <img :src="image" class="block-form__image-content" />
    </div>
    <div class="block-form__container container">
      <div class="block-form__content">
        <div class="block-form__header">
          <h3 class="block-form__title">{{ title }}</h3>
          <p class="block-form__subtitle">{{ subtitle }}</p>
        </div>
        <FormComponent :theme="theme" />
      </div>
    </div>
  </div>
</template>

<style scoped lang="scss">
.block-form {
  position: relative;
  height: 580px;
  overflow: hidden;
  background-image: url('/images/form-bg.png');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;

  @include bp($point_2) {
    height: auto;
    padding-bottom: 78px;
  }

  &--dark {
    background-image: url('/images/form-dark-bg.png');
    border-radius: 0 0 0 200px;
    background-color: $color-dark;

    @include bp($point_2) {
      border-radius: 0 0 0 100px;
    }
  }

  &--white {
    background-color: $color-white;
  }

  &__container {
    display: flex;
    align-items: center;
    height: 100%;
    position: relative;
  }

  &__content {
    max-width: 800px;
    width: 100%;
  }

  &__header {
    margin-bottom: 32px;
  }

  &__title {
    font-size: 50px;
    font-family: $font-family-bebas;
    text-transform: uppercase;
    margin-bottom: 12px;
    line-height: 140%;

    @include bp($point_2) {
      font-size: 35px;
      margin-bottom: 0;
    }
  }

  &--dark &__title {
    color: $color-white;
  }

  &--white &__title {
    color: $color-dark;
  }

  &__subtitle {
    font-size: 18px;
    line-height: 160%;
  }

  &--dark &__subtitle {
    color: $color-white;
  }

  &--white &__subtitle {
    color: $color-dark;
  }

  // Стили для ссылок в формах на темном фоне
  &--dark :deep(.form-component__checkbox--dark a) {
    color: $color-white !important;
  }

  &--white :deep(.form-component__checkbox--light a) {
    color: $color-dark !important;
  }

  &__decorator {
    position: absolute;
    right: -8%;
    top: 0;
    max-width: 658px;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
  }

  &__decorator-image {
    width: 100%;
    height: 100%;
    object-fit: contain;
  }

  &__image {
    position: absolute;
    right: 0;
    top: 50%;
    transform: translateY(-50%);
    max-width: 619px;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;

    @include bp($point_2) {
      position: static;
      transform: translateY(0);
      margin-bottom: 48px;
    }
  }

  &__image-content {
    width: 100%;
    height: 100%;
    object-fit: contain;
  }
}
</style>
