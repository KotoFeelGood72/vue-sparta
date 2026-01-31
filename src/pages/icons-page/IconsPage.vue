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
    <div class="icons-page__container">
      <h1 class="icons-page__title">Все иконки</h1>
      <div class="icons-page__grid">
        <div
          v-for="icon in icons"
          :key="icon.name"
          class="icons-page__item"
        >
          <div class="icons-page__icon-wrapper">
            <component :is="icon.component" />
          </div>
          <p class="icons-page__icon-name">{{ icon.name }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped lang="scss">
// @use '@/styles/variables' as *;

.icons-page {
  &__container {
    max-width: 1187px;
    margin: 0 auto;
    padding: 0 16px;
    padding-top: 32px;
    padding-bottom: 32px;
  }

  &__title {
    font-size: 30px;
    font-weight: 700;
    margin-bottom: 32px;
  }

  &__grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 24px;

    @media (min-width: 768px) {
      grid-template-columns: repeat(3, 1fr);
    }

    @media (min-width: 1024px) {
      grid-template-columns: repeat(4, 1fr);
    }

    @media (min-width: 1200px) {
      grid-template-columns: repeat(5, 1fr);
    }
  }

  &__item {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 24px;
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    transition: box-shadow 0.2s;

    &:hover {
      box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }
  }

  &__icon-wrapper {
    margin-bottom: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 80px;
  }

  &__icon-name {
    font-size: 14px;
    color: #4b5563;
    text-align: center;
    font-family: monospace;
  }
}
</style>

