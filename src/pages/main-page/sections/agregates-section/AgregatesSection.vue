<script setup lang="ts">
import SectionHead from '@/components/blocks/section-head/SectionHead.vue';
import DefaultCard from '@/components/cards/DefaultCard.vue';
import type { DefaultCardModel } from '@/components/cards/DefaultCard.vue';

const { agregates } = defineProps<{ agregates: DefaultCardModel[] }>();

</script>

<template>
  <div class="agregates-section">
    <div class="container">
      <SectionHead title="Агрегаты" buttonText="смотреть все"/>
    </div>
    <ul>
      <li v-for="agregate in agregates" :key="agregate.id">
        <DefaultCard v-bind="agregate"/>
      </li>
    </ul>
  </div>
</template>

