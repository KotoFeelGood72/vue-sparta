<script setup lang="ts">
import SectionHead from '@/components/blocks/section-head/SectionHead.vue';
import DefaultCard from '@/components/cards/DefaultCard.vue';
import type { DefaultCardModel } from '@/components/cards/DefaultCard.vue';

const { repairs } = defineProps<{ repairs: DefaultCardModel[] }>();

</script>

<template>
  <div class="repair-section">
    <div class="container">
      <SectionHead title="ремонт " buttonText="смотреть все"/>
    </div>
    <ul>
      <li v-for="repair in repairs" :key="repair.id">
        <DefaultCard v-bind="repair"/>
      </li>
    </ul>
  </div>
</template>

