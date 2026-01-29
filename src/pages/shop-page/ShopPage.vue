<script setup lang="ts">
import { ref } from 'vue';
import ProductCard, { type ProductCardModel } from '@/components/cards/ProductCard.vue';
import CategorySidebar, { type Category } from '@/components/shared/CategorySidebar.vue';
import ChevronButtonIcon from '@/components/icons/ChevronButtonIcon.vue';
import ButtonComponent from '@/components/ui/ButtonComponent.vue';

const categories: Category[] = [
  { id: '1', title: 'Запчасти по ДВС', slug: 'dvs', isActive: true },
  { id: '2', title: 'Гидравлическая система', slug: 'hydraulic' },
  { id: '3', title: 'Топливная система', slug: 'fuel' },
  { id: '4', title: 'Турбины', slug: 'turbines' },
  { id: '5', title: 'Система охлаждения', slug: 'cooling' },
  { id: '6', title: 'Электрика', slug: 'electrics' },
  { id: '7', title: 'Фильтры', slug: 'filters' },
  { id: '8', title: 'Ремкомплекты', slug: 'repair-kits' },
  { id: '9', title: 'Навесное оборудование', slug: 'attachments' },
  { id: '10', title: 'Рамы', slug: 'frames' },
  { id: '11', title: 'Другое', slug: 'other' },
];

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
]);

const loadMore = () => {
  // Логика загрузки дополнительных товаров
  console.log('Загрузка дополнительных товаров...');
};
</script>

<template>
  <div class="shop-page">
    <div class="shop-page__container">
      <div class="shop-page__content">
        <!-- Боковая панель с категориями -->
        <aside class="shop-page__sidebar">
          <CategorySidebar :categories="categories" />
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
@import '@/styles/variables';

.shop-page {
  background-color: $color-page-bg;
  padding-bottom: 96px;
  min-height: calc(100vh - 200px);

  &__container {
    max-width: 1187px;
    margin: 0 auto;
    padding: 0 16px;
  }

  &__content {
    display: flex;
    gap: 32px;
    padding-top: 40px;
  }

  &__sidebar {
    flex-shrink: 0;
  }

  &__main {
    flex: 1;
  }

  &__grid {
    display: grid;
    grid-template-columns: repeat(1, 1fr);
    gap: 24px;
    margin-bottom: 40px;

    @media (min-width: 1024px) {
      grid-template-columns: repeat(3, 1fr);
    }
  }

  &__load-more {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  &__load-button {
    text-transform: uppercase;
    font-size: $font-size-16;
    line-height: $line-height-16;
    font-weight: 600;
  }
}
</style>

