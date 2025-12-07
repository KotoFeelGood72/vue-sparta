<script setup lang="ts">

  export interface BlockImgSectionModel {
    image: string;
    content: string;
    title?: string;
  }

  const { image, content, title, reversed = false } = defineProps<BlockImgSectionModel & { reversed?: boolean }>();

</script>

<template>
<div class="grid lg:grid-cols-2 gap-8 lg:gap-10">
    <div class="" :class="reversed ? 'order-2' : 'order-1'">
      <img :src="image" alt="Экскаватор" class="w-full h-auto object-cover">
    </div>
    <!-- Текст -->
    <div class="flex flex-col gap-6 text-18 lg:text-20 text-gray leading-[125%]" :class="reversed ? 'order-1' : 'order-2'">
      <h2 v-if="title" class="lg:text-55 font-bebas uppercase text-gray !leading-[105%]">{{ title }}</h2>
      <div v-html="content"></div>
    </div>
  </div>
</template>

<style scoped>

</style>
