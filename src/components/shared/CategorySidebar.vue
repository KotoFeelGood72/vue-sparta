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
}>();
</script>

<template>
  <div class="category-sidebar">
    <ul class="space-y-3">
      <li v-for="category in categories" :key="category.id">
        <RouterLink
          :to="`/shop/${category.slug}`"
          :class="[
            'category-item block px-5 py-3.5 rounded-[10px] text-14 text-gray transition-colors font-medium bg-white',
            category.isActive ? 'border-yellow border' : 'hover:text-yellow'
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
  min-width: 282px;
}
</style>

