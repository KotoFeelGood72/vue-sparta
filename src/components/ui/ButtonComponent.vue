<script setup lang="ts">
import LoadingIcon from '../icons/LoadingIcon.vue';
import { computed } from 'vue';

export interface ButtonComponentModel {
  text: string
  size: 'small' | 'medium' | 'large'
  variant: 'primary' | 'secondary'
  loading?: boolean
}

const { text, size, variant, loading } = defineProps<ButtonComponentModel>();

const themeClass = computed(() => {
  return variant === 'primary' ? 'bg-yellow text-dark' : 'bg-dark text-white';
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
  <div :class="[themeClass, sizeClass, 'flex items-center justify-center rounded-full']">
    <div class="loading" v-if="loading">
      <LoadingIcon/>
    </div>
    <span>{{ text }}</span>
  </div>
</template>
