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
  <div class="breadcrumbs">
    <div class="breadcrumbs__container">
      <ul class="breadcrumbs__list">
        <li v-for="(item, index) in breadcrumbs" :key="index" class="breadcrumbs__item">
          <component
            :is="item.to ? RouterLink : 'span'"
            :to="item.to"
            class="breadcrumbs__link"
          >
            {{ item.label }}
          </component>
          <span class="breadcrumbs__separator" v-if="index < (breadcrumbs?.length ?? 0) - 1"> > </span>
        </li>
      </ul>
      <h1 class="breadcrumbs__title">{{ route.meta.title }}</h1>
    </div>
  </div>
</template>


<style scoped lang="scss">
// @use '@/styles/variables' as *;

.breadcrumbs {
  &__container {
    max-width: 1187px;
    margin: 0 auto;
    padding: 0 16px;
  }

  &__list {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-top: 40px;
    margin-bottom: 28px;
    list-style: none;
  }

  &__item {
    font-size: $font-size-18;
    line-height: $line-height-18;
  }

  &__link {
    color: $color-yellow-light;
    font-weight: 600;
    text-decoration: none;
    transition: color 0.2s;

    &:hover {
      color: darken($color-yellow-light, 10%);
    }
  }

  &__separator {
    color: $color-yellow;
    margin: 0 4px;
  }

  &__title {
    font-size: $font-size-55;
    line-height: $line-height-55;
    font-family: $font-family-bebas;
    text-transform: uppercase;
    color: $color-dark;
    line-height: 1;
  }
}
</style>
