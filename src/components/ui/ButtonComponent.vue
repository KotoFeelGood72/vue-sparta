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

const themeClass = computed(() => {
  switch (variant) {
    case 'primary':
      return 'bg-yellow text-dark';
    case 'secondary':
      return 'bg-dark text-white';
    case 'light':
      return 'bg-[#EAEAEA] text-dark';
    default:
      return 'bg-yellow text-dark';
  }
});

const sizeClass = computed(() => {
  switch (size) {
    case 'small':
      return 'py-4 px-6';
    case 'medium':
      return 'py-7 px-11';
    case 'large':
      return 'h-[89px] px-8 uppercase text-20 font-semibold leading-none tracking-[-0.01em] text-[#323232]';
    default:
      return '';
  }
});

</script>

<template>
  <div :class="[themeClass, sizeClass, 'flex items-center justify-center rounded-full gap-2', customClass]">
    <div class="loading" v-if="loading">
      <LoadingIcon/>
    </div>
    <span>{{ text }}</span>
    <component :is="icon" class="flex items-center justify-center"/>
  </div>
</template>
