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

const emit = defineEmits<{
  select: [];
}>();

const onLinkClick = () => {
  emit('select');
};
</script>

<template>
  <div class="category-sidebar">
    <ul class="category-sidebar__list">
      <li v-for="category in categories" :key="category.id" class="category-sidebar__item">
        <RouterLink
          :to="`/shop/${category.slug}`"
          :class="[
            'category-sidebar__link',
            category.isActive ? 'category-sidebar__link--active' : ''
          ]"
          @click="onLinkClick"
        >
          {{ category.title }}
        </RouterLink>
      </li>
    </ul>
  </div>
</template>

<style scoped lang="scss">
.category-sidebar {
  min-width: 282px;

  &__list {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 12px;
  }

  &__item {
    margin: 0;
  }

  &__link {
    display: block;
    padding: 14px 20px;
    border-radius: 10px;
    font-size: $font-size-14;
    line-height: $line-height-14;
    color: $color-gray;
    transition: color 0.2s;
    font-weight: 500;
    background-color: $color-white;
    text-decoration: none;
    border: 1px solid transparent;

    &:hover {
      color: $color-yellow;
    }

    &--active {
      border-color: $color-yellow;
    }
  }
}
</style>

