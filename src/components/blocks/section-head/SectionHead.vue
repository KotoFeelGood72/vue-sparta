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
  <div class="section-head">
    <h2 class="section-head__title">{{ title }}</h2>
    <ButtonComponent :text="buttonText" size="small" variant="primary" @click="handleClick" custom-class="section-head__button" :icon="ChevronButtonIcon" :class="{ 'section-head__button--absolute': buttonAbsolute }"/>
  </div>
</template>

<style scoped lang="scss">
// @use '@/styles/variables' as *;

.section-head {
  display: flex;
  align-items: center;
  justify-content: space-between;

  @include bp($point_2) {
    justify-content: center;
  }

  &__title {
    font-size: $font-size-35;
    line-height: $line-height-35;
    font-family: $font-family-bebas;
    color: $color-gray;
    text-transform: uppercase;

    @media (min-width: 1024px) {
      font-size: $font-size-55;
      line-height: $line-height-55;
    }

    @include bp($point_2) {
      font-weight: 400;
    }
  }

  &__button {
    text-transform: uppercase;
    font-weight: 700;
    gap: 8px;

    &--absolute {
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
    }
  }
}
</style>
