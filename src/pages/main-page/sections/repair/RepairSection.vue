<script setup lang="ts">
import SectionHead from '@/components/blocks/section-head/SectionHead.vue';
import DefaultCard from '@/components/cards/DefaultCard.vue';
import type { DefaultCardModel } from '@/components/cards/DefaultCard.vue';

const { repairs } = defineProps<{ repairs: DefaultCardModel[], headerHidden?: boolean }>();

</script>

<template>
  <div class="repair-section">
    <div class="container">
      <SectionHead v-if="!headerHidden" title="ремонт" buttonText="смотреть все" class="mb-3"/>
      <ul class="grid lg:grid-cols-3 lg:gap-10">
        <li v-for="repair in repairs" :key="repair.id" class="h-full">
          <DefaultCard v-bind="repair"/>
        </li>
      </ul>
      <slot name="bottom"/>
    </div>
  </div>
</template>

