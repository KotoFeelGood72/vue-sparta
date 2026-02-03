<script setup lang="ts">
import LoadingIcon from '../icons/LoadingIcon.vue';
import { computed, type Component } from 'vue';

export interface ButtonComponentModel {
  text: string
  size: 'small' | 'medium' | 'large'
  variant: 'primary' | 'secondary' | 'light'
  loading?: boolean
  icon?: Component
  customClass?: string
}

const { text, size, variant, loading, icon, customClass } = defineProps<ButtonComponentModel>();

const buttonClasses = computed(() => {
  const classes = ['button'];
  classes.push(`button--${variant}`);
  classes.push(`button--${size}`);
  if (customClass) {
    classes.push(customClass);
  }
  return classes;
});

</script>

<template>
  <div :class="buttonClasses">
    <div class="button__loading" v-if="loading">
      <LoadingIcon/>
    </div>
    <span class="button__text">{{ text }}</span>
    <component :is="icon" class="button__icon" v-if="icon"/>
  </div>
</template>

<style scoped lang="scss">
.button {
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 9999px;
  gap: 8px;
  border: none;
  cursor: pointer;
  transition: opacity 0.2s;

  &:hover {
    opacity: 0.9;
  }

  // Варианты
  &--primary {
    background-color: $color-yellow;
    color: $color-dark;
  }

  &--secondary {
    background-color: $color-dark;
    color: $color-white;
  }

  &--light {
    background-color: $color-light-gray;
    color: $color-dark;
  }

  // Размеры
  &--small {
    padding: 16px 24px;
  }

  &--medium {
    padding: 28px 44px;
  }

  &--large {
    height: 89px;
    padding: 0 32px;
    text-transform: uppercase;
    font-size: $font-size-20;
    line-height: $line-height-20;
    font-weight: 600;
    line-height: 1;
    letter-spacing: -0.01em;
    color: $color-gray;
  }

  &__loading {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  &__text {
    display: inline-block;
  }

  &__icon {
    display: flex;
    align-items: center;
    justify-content: center;
  }
}
</style>
