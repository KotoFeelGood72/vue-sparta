<script setup lang="ts">
import type { SectionHeadModel } from './model';

import ButtonComponent from '@/components/ui/ButtonComponent.vue';

const emit = defineEmits<{
  (e: 'click'): void
}>();


const { title, buttonText } = defineProps<SectionHeadModel>();

const handleClick = () => {
  emit('click');
};
</script>

<template>
  <div class="section-head">
    <h2>{{ title }}</h2>
    <ButtonComponent :text="buttonText" size="small" variant="primary" @click="handleClick"/>
  </div>
</template>

