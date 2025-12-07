<script setup lang="ts">
import { ref } from 'vue';
import ProductCard, { type ProductCardModel } from '@/components/cards/ProductCard.vue';
import CategorySidebar, { type Category } from '@/components/shared/CategorySidebar.vue';
import ChevronIcon from '@/components/icons/ChevronIcon.vue';

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
  <div class="shop-page bg-[#EFEFEF] pb-24">
    <div class="container">
      <div class="flex gap-8 pt-10">
        <!-- Боковая панель с категориями -->
        <aside class="flex-shrink-0">
          <CategorySidebar :categories="categories" title="Запчасти ДВС" />
        </aside>

        <!-- Основной контент -->
        <main class="flex-1">
          <h1 class="text-55 font-bebas uppercase text-dark leading-[85px] mb-10 tracking-[0.55px]">
            ТОПЛИВНАЯ АППАРАТУРА
          </h1>

          <!-- Сетка товаров -->
          <div class="grid lg:grid-cols-3 gap-6 mb-10">
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

          <!-- Кнопка "Загрузить еще" -->
          <div class="flex justify-center">
            <button
              @click="loadMore"
              class="bg-yellow text-dark py-7 px-11 rounded-full flex items-center gap-3 text-18 font-semibold uppercase hover:opacity-90 transition-opacity"
            >
              <span>Загрузить еще</span>
              <ChevronIcon class="rotate-[-90deg]"/>
            </button>
          </div>
        </main>
      </div>
    </div>
  </div>
</template>

<style scoped>
.shop-page {
  min-height: calc(100vh - 200px);
}
</style>

