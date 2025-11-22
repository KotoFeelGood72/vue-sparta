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
      <ul class="flex items-center gap-2 mt-10 mb-7">
        <li v-for="(item, index) in breadcrumbs" :key="index" class="text-18">
          <component :is="item.to ? RouterLink : 'span'" :to="item.to" class="hover:text-gray-800 transition-colors">{{ item.label }}</component>
          <span class="text-yellow" v-if="index < (breadcrumbs?.length ?? 0) - 1"> > </span>
        </li>
      </ul>
      <h1 class="text-55 font-bebas uppercase text-dark leading-none">{{ route.meta.title }}</h1>
    </div>
  </div>
</template>


<style scoped>

a {
  color: #FFB723;
  font-weight: 600;
}
</style>
