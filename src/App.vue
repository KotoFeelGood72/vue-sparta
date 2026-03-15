<script setup lang="ts">
import { computed } from 'vue'
import { useRoute } from 'vue-router'

import DefaultLayout from './layouts/DefaultLayout.vue'

const route = useRoute()

const isLayout = computed(() => {
  switch (route.meta.layout) {
    case 'default':
      return DefaultLayout
    default:
      return null
  }
})
</script>

<template>
  <component :is="isLayout">
    <RouterView />
  </component>
  <Notifications position="top right" />
</template>
