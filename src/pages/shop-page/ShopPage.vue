<script setup lang="ts">
import { ref, computed } from 'vue'
import ProductCard, { type ProductCardModel } from '@/components/cards/ProductCard.vue'
import CategorySidebar, { type Category } from '@/components/shared/CategorySidebar.vue'
import ChevronButtonIcon from '@/components/icons/ChevronButtonIcon.vue'
import ButtonComponent from '@/components/ui/ButtonComponent.vue'
import { useRoute } from 'vue-router'
import { useMediaStoreRefs } from '@/stores/useMediaStore'
import { SHOP_CATEGORIES } from '@/constants/shopCategories'

const route = useRoute()
const { isTablet, isMobile } = useMediaStoreRefs()
const isCategoriesOpen = ref(false)

const showCategoriesToggle = computed(() => isTablet.value || isMobile.value)

const toggleCategories = () => {
  isCategoriesOpen.value = !isCategoriesOpen.value
}

const categoriesList: Category[] = SHOP_CATEGORIES.map((c) => ({
  id: c.id,
  title: c.title,
  slug: c.slug,
}))

const currentSlug = computed(() => {
  const slug = route.params.slug
  return typeof slug === 'string' ? slug : undefined
})

const categories = computed(() =>
  categoriesList.map((c) => ({
    ...c,
    isActive: c.slug === currentSlug.value,
  })),
)

const selectedCategory = computed(() => {
  const slug = currentSlug.value
  if (!slug) return undefined
  return categoriesList.find((c) => c.slug === slug)
})

const products = ref<ProductCardModel[]>([
  {
    id: '1',
    slug: 'product-1',
    image: '/images/agregate-1.png',
    title: 'ЦГ-100.60x840.22 Гидроцилиндр стрелы ПСС-131.223',
    manufacturers: [{ id: '1', name: 'Shanghai', slug: 'shanghai' }],
    instock: 'В наличии',
    price: '573 100р',
  },
  {
    id: '2',
    slug: 'product-2',
    image: '/images/agregate-2.png',
    title: 'ЦГ-100.60x840.22 Гидроцилиндр стрелы ПСС-131.223',
    manufacturers: [{ id: '1', name: 'Shanghai', slug: 'shanghai' }],
    instock: 'В наличии',
    price: '573 100р',
  },
  {
    id: '3',
    slug: 'product-3',
    image: '/images/agregate-3.png',
    title: 'ЦГ-100.60x840.22 Гидроцилиндр стрелы ПСС-131.223',
    manufacturers: [{ id: '1', name: 'Shanghai', slug: 'shanghai' }],
    instock: 'В наличии',
    price: '573 100р',
  },
  {
    id: '4',
    slug: 'product-4',
    image: '/images/agregate-1.png',
    title: 'ЦГ-100.60x840.22 Гидроцилиндр стрелы ПСС-131.223',
    manufacturers: [{ id: '1', name: 'Shanghai', slug: 'shanghai' }],
    instock: 'В наличии',
    price: '573 100р',
  },
  {
    id: '5',
    slug: 'product-5',
    image: '/images/agregate-2.png',
    title: 'ЦГ-100.60x840.22 Гидроцилиндр стрелы ПСС-131.223',
    manufacturers: [{ id: '1', name: 'Shanghai', slug: 'shanghai' }],
    instock: 'В наличии',
    price: '573 100р',
  },
  {
    id: '6',
    slug: 'product-6',
    image: '/images/agregate-3.png',
    title: 'ЦГ-100.60x840.22 Гидроцилиндр стрелы ПСС-131.223',
    manufacturers: [{ id: '1', name: 'Shanghai', slug: 'shanghai' }],
    instock: 'В наличии',
    price: '573 100р',
  },
])

const loadMore = () => {
  // Логика загрузки дополнительных товаров
  console.log('Загрузка дополнительных товаров...')
}
</script>

<template>
  <div class="shop-page">
    <div class="shop-page__container container">
      <div class="shop-page__content">
        <!-- Боковая панель с категориями -->
        <aside class="shop-page__sidebar">
          <button
            v-if="showCategoriesToggle"
            type="button"
            class="shop-page__categories-toggle"
            :class="{ 'shop-page__categories-toggle--open': isCategoriesOpen }"
            :aria-expanded="isCategoriesOpen"
            @click="toggleCategories"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="20"
              height="14"
              viewBox="0 0 20 14"
              fill="none"
            >
              <rect y="0.941406" width="19.4634" height="1.81056" rx="0.905279" fill="#FDC043" />
              <circle cx="12.413" cy="1.84657" r="1.84657" fill="#FDC043" />
              <rect y="11.1685" width="19.4634" height="1.81056" rx="0.905279" fill="#FDC043" />
              <circle cx="12.413" cy="12.0736" r="1.84657" fill="#FDC043" />
              <rect
                x="2.49609"
                y="6.05518"
                width="16.9675"
                height="1.81056"
                rx="0.905279"
                fill="#FDC043"
              />
              <circle cx="7.88563" cy="6.96034" r="1.84657" fill="#FDC043" />
            </svg>
            <span class="shop-page__categories-toggle-text">{{
              selectedCategory?.title || 'Выбрать категорию запчастей'
            }}</span>
          </button>
          <div v-show="!showCategoriesToggle || isCategoriesOpen" class="shop-page__sidebar-inner">
            <CategorySidebar :categories="categories" @select="isCategoriesOpen = false" />
          </div>
        </aside>

        <!-- Основной контент -->
        <main class="shop-page__main">
          <!-- Сетка товаров -->
          <div class="shop-page__grid">
            <ProductCard
              v-for="product in products"
              :key="product.id"
              :id="product.id"
              :slug="product.slug"
              :image="product.image"
              :title="product.title"
              :manufacturers="product.manufacturers"
              :instock="product.instock"
              :price="product.price"
              :to="`/shop/${currentSlug ?? 'parts'}/${product.slug}`"
            />
          </div>

          <div class="shop-page__load-more">
            <ButtonComponent
              text="Загрузить еще"
              size="small"
              variant="primary"
              custom-class="shop-page__load-button"
              :icon="ChevronButtonIcon"
              @click="loadMore"
            />
          </div>
        </main>
      </div>
    </div>
  </div>
</template>

<style scoped lang="scss">
.shop-page {
  background-color: $color-page-bg;
  min-height: calc(100vh - 200px);

  &__content {
    display: flex;
    flex-direction: column;
    gap: 20px;
    padding-top: 20px;

    @include bp($point_2, min) {
      flex-direction: row;
      gap: 24px;
      padding-top: 40px;
    }
  }

  &__sidebar {
    flex-shrink: 0;
    width: 100%;

    @include bp($point_2, min) {
      width: auto;
    }
  }

  &__categories-toggle {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    padding: 14px 20px;
    background-color: $color-white;
    border: 1px solid $color-light-gray;
    border-radius: 10px;
    font-size: 16px;
    font-weight: 700;
    gap: 12px;
    color: $color-gray;
    cursor: pointer;
    transition:
      border-color 0.2s,
      color 0.2s;

    &:hover {
      border-color: $color-yellow;
      color: $color-yellow;
    }

    &--open {
      border-color: $color-yellow;
    }
  }

  &__categories-toggle-text {
    flex: 1;
    text-align: left;
  }

  &__categories-toggle-icon {
    flex-shrink: 0;
    margin-left: 8px;
    transition: transform 0.2s;
  }

  &__categories-toggle--open &__categories-toggle-icon {
    transform: rotate(180deg);
  }

  &__sidebar-inner {
    margin-top: 12px;
    width: 100%;

    @include bp($point_2, min) {
      margin-top: 0;
      display: block;
    }

    :deep(.category-sidebar) {
      min-width: 0;
      width: 100%;
    }
  }

  &__main {
    flex: 1;
    min-width: 0;
  }

  &__grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 16px;
    margin-bottom: 24px;

    @include bp($point_5, min) {
      gap: 20px;
      margin-bottom: 32px;
      grid-template-columns: repeat(2, 1fr);
    }

    @include bp($point_2, min) {
      grid-template-columns: repeat(3, 1fr);
      gap: 24px;
      margin-bottom: 40px;
    }
  }

  &__load-more {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  &__load-button {
    text-transform: uppercase;
    font-size: 16px;
    line-height: 140%;
    font-weight: 500;
  }
}
</style>
