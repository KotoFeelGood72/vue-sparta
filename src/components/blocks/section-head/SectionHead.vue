<script setup lang="ts">
import type { SectionHeadModel } from './model';
import ChevronButtonIcon from '@/components/icons/ChevronButtonIcon.vue';

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
  <div class="section-head flex items-center justify-between">
    <h2 class="lg:text-55 font-bebas text-gray uppercase">{{ title }}</h2>
    <ButtonComponent :text="buttonText" size="small" variant="primary" @click="handleClick" class="uppercase font-bold gap-2" :icon="ChevronButtonIcon"/>
  </div>
</template>

