<script setup lang="ts">
import { RouterLink } from 'vue-router'

defineProps<{
  open: boolean
}>()

const emit = defineEmits<{
  close: []
}>()

const menuItems = [
  { title: 'Каталоги', to: '/catalog' },
  { title: 'Запчасти', to: '/shop' },
  { title: 'Агрегаты', to: '/shop' },
  { title: 'Ремонт', to: '/repair' },
  { title: 'Спецтехника', to: '/catalog' },
  { title: 'Марки машин', to: '/catalog' },
  { title: 'Экспресс-доставка', to: '/delivery' },
  { title: 'О компании', to: '/about' },
  { title: 'Контакты', to: '/contacts' },
]

const closeMenu = () => emit('close')
</script>

<template>
  <Teleport to="body">
    <Transition name="burger">
      <div
        v-show="open"
        class="burger-menu"
        role="dialog"
        aria-modal="true"
        :aria-hidden="!open"
        aria-label="Меню"
      >
        <div class="burger-menu__overlay" aria-hidden="true" @click="closeMenu" />
        <aside class="burger-menu__panel">
          <div class="burger-menu__header">
            <span class="burger-menu__title">Меню</span>
            <button
              type="button"
              class="burger-menu__close"
              aria-label="Закрыть меню"
              @click="closeMenu"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
              >
                <path
                  d="M18 6L6 18M6 6L18 18"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </button>
          </div>
          <nav class="burger-menu__nav">
            <ul class="burger-menu__list">
              <li v-for="item in menuItems" :key="item.title" class="burger-menu__item">
                <RouterLink :to="item.to" class="burger-menu__link" @click="closeMenu">
                  {{ item.title }}
                </RouterLink>
              </li>
            </ul>
          </nav>
        </aside>
      </div>
    </Transition>
  </Teleport>
</template>

<style scoped lang="scss">
.burger-menu {
  position: fixed;
  inset: 0;
  z-index: 1000;
  display: flex;
  pointer-events: none;

  &[aria-hidden='false'],
  &.burger-enter-active,
  &.burger-leave-active {
    pointer-events: auto;
  }
}

.burger-menu__overlay {
  position: absolute;
  inset: 0;
  background-color: rgba(0, 0, 0, 0.4);
  cursor: pointer;
}

.burger-menu__panel {
  position: relative;
  margin-left: auto;
  width: min(320px, 100vw);
  max-width: 100%;
  height: 100%;
  background-color: $color-white;
  box-shadow: -4px 0 24px rgba(0, 0, 0, 0.12);
  display: flex;
  flex-direction: column;
  z-index: 1;
}

.burger-menu__header {
  @include flex-space;
  padding: 16px 20px;
  border-bottom: 1px solid $color-light-gray;
}

.burger-menu__title {
  font-size: $font-size-18;
  font-weight: 600;
  color: $color-dark;
}

.burger-menu__close {
  @include flex-center;
  width: 40px;
  height: 40px;
  background: transparent;
  border: none;
  cursor: pointer;
  color: $color-dark;
  transition:
    color 0.2s,
    background-color 0.2s;
  border-radius: 8px;

  &:hover {
    color: $color-yellow;
    background-color: $color-light-gray;
  }
}

.burger-menu__nav {
  flex: 1;
  overflow-y: auto;
  padding: 16px 0;
}

.burger-menu__list {
  list-style: none;
}

.burger-menu__item {
  border-bottom: 1px solid $color-light-gray;

  &:last-child {
    border-bottom: none;
  }
}

.burger-menu__link {
  display: block;
  padding: 14px 20px;
  font-size: $font-size-16;
  font-weight: 500;
  color: $color-dark;
  text-decoration: none;
  transition:
    background-color 0.2s,
    color 0.2s;

  &:hover {
    background-color: $color-light-gray;
    color: $color-yellow;
  }
}

// Анимация появления/скрытия
.burger-enter-active .burger-menu__overlay,
.burger-leave-active .burger-menu__overlay {
  transition: opacity 0.25s ease;
}

.burger-enter-from .burger-menu__overlay,
.burger-leave-to .burger-menu__overlay {
  opacity: 0;
}

.burger-enter-active .burger-menu__panel,
.burger-leave-active .burger-menu__panel {
  transition: transform 0.25s ease;
}

.burger-enter-from .burger-menu__panel,
.burger-leave-to .burger-menu__panel {
  transform: translateX(100%);
}
</style>
