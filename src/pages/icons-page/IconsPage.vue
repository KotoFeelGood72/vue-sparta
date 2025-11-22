<script setup lang="ts">
import { computed } from 'vue'

// Автоматический импорт всех иконок из папки icons
const iconModules = import.meta.glob('@/components/icons/*.vue', { eager: true })

const icons = computed(() => {
  return Object.entries(iconModules).map(([path, module]) => {
    // Извлекаем имя файла из пути (например, 'AddressIcon' из '@/components/icons/AddressIcon.vue')
    const fileName = path.split('/').pop()?.replace('.vue', '') || ''
    return {
      name: fileName,
      component: (module as { default: any }).default,
    }
  }).sort((a, b) => a.name.localeCompare(b.name))
})
</script>

<template>
  <div class="icons-page">
    <div class="container py-8">
      <h1 class="text-3xl font-bold mb-8">Все иконки</h1>
      <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
        <div
          v-for="icon in icons"
          :key="icon.name"
          class="flex flex-col items-center justify-center p-6 border border-gray-200 rounded-lg hover:shadow-lg transition-shadow"
        >
          <div class="mb-4 flex items-center justify-center min-h-[80px]">
            <component :is="icon.component" />
          </div>
          <p class="text-sm text-gray-600 text-center font-mono">{{ icon.name }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

