<script setup lang="ts">
import SectionHead from '@/components/blocks/section-head/SectionHead.vue';
import DefaultCard from '@/components/cards/DefaultCard.vue';
import type { DefaultCardModel } from '@/components/cards/DefaultCard.vue';

const { agregates } = defineProps<{ agregates: DefaultCardModel[] }>();

</script>

<template>
  <div class="agregates-section">
    <div class="agregates-section__container">
      <div class="agregates-section__header">
        <SectionHead title="Агрегаты" buttonText="смотреть все"/>
      </div>
      <ul class="agregates-section__list">
        <li v-for="agregate in agregates" :key="agregate.id" class="agregates-section__item">
          <DefaultCard v-bind="agregate"/>
        </li>
      </ul>
    </div>
  </div>
</template>

<style scoped lang="scss">
@import '@/styles/variables';

.agregates-section {
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
    margin: 0;
  }
}
</style>
