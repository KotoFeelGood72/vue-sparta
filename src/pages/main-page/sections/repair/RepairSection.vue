<script setup lang="ts">
import SectionHead from '@/components/blocks/section-head/SectionHead.vue';
import DefaultCard from '@/components/cards/DefaultCard.vue';
import type { DefaultCardModel } from '@/components/cards/DefaultCard.vue';

const { repairs } = defineProps<{ repairs: DefaultCardModel[], headerHidden?: boolean }>();

</script>

<template>
  <div class="repair-section">
    <div class="repair-section__container">
      <div v-if="!headerHidden" class="repair-section__header">
        <SectionHead title="ремонт" buttonText="смотреть все"/>
      </div>
      <ul class="repair-section__list">
        <li v-for="repair in repairs" :key="repair.id" class="repair-section__item">
          <DefaultCard v-bind="repair"/>
        </li>
      </ul>
      <slot name="bottom"/>
    </div>
  </div>
</template>

<style scoped lang="scss">
@import '@/styles/variables';

.repair-section {
  &__container {
    max-width: 1187px;
    margin: 0 auto;
    padding: 0 16px;
  }

  &__header {
    margin-bottom: 12px;
  }

  &__list {
    display: grid;
    grid-template-columns: 1fr;
    gap: 40px;
    list-style: none;
    padding: 0;
    margin: 0;

    @media (min-width: 1024px) {
      grid-template-columns: repeat(3, 1fr);
    }
  }

  &__item {
    height: 100%;
    margin: 0;
  }
}
</style>
