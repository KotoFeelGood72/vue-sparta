<script setup lang="ts">
import { computed } from 'vue'
import { useRoute, RouterLink } from 'vue-router'

type BreadcrumbItem = {
  label: string
  to?: string
}

const route = useRoute()

const breadcrumbs = computed<BreadcrumbItem[] | null>(() => {
  const bc = route.meta?.breadcrumbs as unknown
  if (!bc || !Array.isArray(bc)) return null
  return bc as BreadcrumbItem[]
})
</script>

<template>
  <div>
    <div class="container">
      <ul>
        <li v-for="(item, index) in breadcrumbs" :key="index">
          <component :is="item.to ? RouterLink : 'span'" :to="item.to" class="hover:text-gray-800 transition-colors">{{ item.label }}</component>
        </li>
      </ul>
      <h1>{{ route.meta.title }}</h1>
    </div>
  </div>
</template>

