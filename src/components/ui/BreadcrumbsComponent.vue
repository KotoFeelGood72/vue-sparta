<script setup lang="ts">
import { computed } from 'vue'
import { useRoute, RouterLink } from 'vue-router'
import { getShopCategoryTitleBySlug } from '@/constants/shopCategories'

type BreadcrumbItem = {
  label: string
  to?: string
}

const route = useRoute()

const breadcrumbs = computed<BreadcrumbItem[] | null>(() => {
  const bc = route.meta?.breadcrumbs as unknown
  if (!bc || !Array.isArray(bc)) return null
  const list = bc as BreadcrumbItem[]
  const slug = route.params.slug
  if (route.path.startsWith('/shop/') && typeof slug === 'string') {
    const categoryTitle = getShopCategoryTitleBySlug(slug)
    if (categoryTitle && list.length > 0) {
      return [...list.slice(0, -1), { ...list[list.length - 1], label: categoryTitle }]
    }
  }
  return list
})

const pageTitle = computed(() => {
  const slug = route.params.slug
  if (route.path.startsWith('/shop/') && typeof slug === 'string') {
    const categoryTitle = getShopCategoryTitleBySlug(slug)
    if (categoryTitle) return categoryTitle
  }
  return (route.meta?.title as string) ?? ''
})
</script>

<template>
  <div class="breadcrumbs">
    <div class="breadcrumbs__container container">
      <ul class="breadcrumbs__list">
        <li v-for="(item, index) in breadcrumbs" :key="index" class="breadcrumbs__item">
          <component :is="item.to ? RouterLink : 'span'" :to="item.to" class="breadcrumbs__link">
            {{ item.label }}
          </component>
          <span class="breadcrumbs__separator" v-if="index < (breadcrumbs?.length ?? 0) - 1">
            >
          </span>
        </li>
      </ul>
      <h1 class="breadcrumbs__title">{{ pageTitle }}</h1>
    </div>
  </div>
</template>

<style scoped lang="scss">
.breadcrumbs {
  &__list {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 8px;
    margin-top: 24px;
    margin-bottom: 16px;
    list-style: none;
    font-weight: 400;

    @include bp($point_2) {
      margin: 20px 0 10px 0;
    }
  }

  &__item {
    font-size: 16px;
  }

  a {
    color: $color-yellow-light;
    &:hover {
      color: darken($color-yellow-light, 10%);
    }
  }

  &__link {
    font-weight: 500;
    text-decoration: none;
    transition: color 0.2s;
  }

  &__separator {
    color: $color-yellow;
    margin: 0 2px;
  }

  &__title {
    font-size: 50px;
    font-family: $font-family-bebas;
    text-transform: uppercase;
    color: $color-dark;
    line-height: 1;

    @include bp($point_2) {
      font-size: 35px;
      margin-top: 16px;
      font-weight: 500;
    }
  }
}
</style>
