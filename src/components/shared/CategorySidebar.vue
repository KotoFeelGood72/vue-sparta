<script setup lang="ts">
import { RouterLink } from 'vue-router';

export interface Category {
  id: string;
  title: string;
  slug: string;
  isActive?: boolean;
}

defineProps<{
  categories: Category[];
  title?: string;
}>();
</script>

<template>
  <div class="category-sidebar">
    <h3 v-if="title" class="text-20 font-semibold text-gray mb-6">{{ title }}</h3>
    <ul class="space-y-3">
      <li v-for="category in categories" :key="category.id">
        <RouterLink
          :to="`/shop/${category.slug}`"
          :class="[
            'category-item block px-6 py-4 rounded-[10px] text-18 font-normal text-gray transition-colors',
            category.isActive ? 'bg-yellow' : 'bg-white hover:bg-gray-50'
          ]"
        >
          {{ category.title }}
        </RouterLink>
      </li>
    </ul>
  </div>
</template>

<style scoped>
.category-sidebar {
  min-width: 300px;
}
</style>

