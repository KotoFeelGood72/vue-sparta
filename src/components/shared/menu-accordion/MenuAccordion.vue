<script setup lang="ts">
import { ref } from 'vue'

export interface MenuItem {
  id: string | number
  title: string
  children?: MenuItem[]
  [key: string]: unknown
}

interface Props {
  items: MenuItem[]
  level?: number
  activeId?: string | number | null
}

const props = withDefaults(defineProps<Props>(), {
  level: 0,
  activeId: null,
})

const expandedItems = ref<Set<string | number>>(new Set())

const toggleItem = (item: MenuItem) => {
  if (item.children && item.children.length > 0) {
    if (expandedItems.value.has(item.id)) {
      expandedItems.value.delete(item.id)
    } else {
      expandedItems.value.add(item.id)
    }
  }
}

const isExpanded = (item: MenuItem) => {
  return expandedItems.value.has(item.id)
}

const hasChildren = (item: MenuItem) => {
  return item.children && item.children.length > 0
}

const isActive = (item: MenuItem) => {
  return props.activeId === item.id
}
</script>

<template>
  <ul class="menu-accordion">
    <li
      v-for="item in items"
      :key="item.id"
      class="menu-accordion__item"
      :style="{ paddingLeft: `${level * 10}px` }"
    >
      <div
        class="menu-accordion__header"
        :class="{
          'menu-accordion__header--active': isActive(item),
        }"
        @click="toggleItem(item)"
      >
        <span
          v-if="hasChildren(item)"
          class="menu-accordion__icon"
        >
          {{ isExpanded(item) ? '−' : '+' }}
        </span>
        <span class="menu-accordion__title">{{ item.title }}</span>
      </div>
      <div
        v-if="hasChildren(item) && isExpanded(item)"
        class="menu-accordion__children"
      >
        <MenuAccordion
          :items="item.children!"
          :level="level + 1"
          :active-id="activeId"
        />
      </div>
    </li>
  </ul>
</template>

<style scoped lang="scss">
// @use '@/styles/variables' as *;

.menu-accordion {
  list-style: none;
  padding: 0;
  margin: 0;
}

.menu-accordion__item {
  position: relative;
}

.menu-accordion__header {
  display: flex;
  align-items: center;
  gap: 8px;
  padding: 8px 12px;
  cursor: pointer;
  transition: background-color 0.2s;
  user-select: none;
  font-weight: 600;
  text-transform: uppercase;
}

.menu-accordion__header:hover {
  background-color: rgba(0, 0, 0, 0.05);
}

.menu-accordion__header--active {
  background-color: $color-accordion-active-bg;
  border: 1px solid $color-accordion-active-border;
}

.menu-accordion__icon {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 14px;
  height: 14px;
  flex-shrink: 0;
  background-color: $color-yellow;
  color: $color-white;
  font-size: 12px;
  font-weight: bold;
  border-radius: 2px;
}

.menu-accordion__title {
  flex: 1;
}

.menu-accordion__children {
  overflow: hidden;
  animation: slideDown 0.2s ease-out;
}

@keyframes slideDown {
  from {
    opacity: 0;
    max-height: 0;
  }
  to {
    opacity: 1;
    max-height: 1000px;
  }
}
</style>
