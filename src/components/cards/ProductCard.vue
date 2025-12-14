<script setup lang="ts">
import { RouterLink } from 'vue-router';
import CheckFillIcon from '../icons/CheckFillIcon.vue';
import ButtonComponent from '../ui/ButtonComponent.vue';
import CardDecoratorIcon from '../icons/CardDecoratorIcon.vue';

export interface Manufacturer {
  name: string;
  slug: string;
  id: string
}

export interface ProductCardModel {
  image: string;
  title: string;
  id: string
  slug: string
  manufacturers: Manufacturer[]
  instock: string
  price: string
}

const { image, title, manufacturers, instock, price } = defineProps<ProductCardModel>();
</script>

<template>
  <div class="product-card bg-white rounded-[10px] p-4 relative h-full flex flex-col">
    <CardDecoratorIcon class="absolute bottom-0 right-0"/>

    <!-- Статус наличия -->

    <!-- Изображение -->
    <div class="mb-4 flex-shrink-0">
      <img :src="image" :alt="title" class="w-full h-auto object-cover rounded-[10px]">
    </div>
    <div class="flex items-center gap-2 mb-2">
      <div class="flex items-center justify-center">
        <CheckFillIcon class="w-4 h-4"/>
      </div>
      <span class="text-16 font-normal text-lightGrayText">{{ instock }}</span>
    </div>

    <!-- Название -->
    <h3 class="text-18 font-normal text-gray mb-1.5 flex-1 line-clamp-3">{{ title }}</h3>

    <!-- Производитель -->
    <div class="mb-2">
      <span class="text-16 font-normal text-lightGrayText">Производитель: </span>
      <RouterLink
        v-for="(manufacturer, index) in manufacturers"
        :key="manufacturer.id"
        :to="`/manufacturer/${manufacturer.slug}`"
        class="text-16 font-semibold text-yellow hover:text-gray transition-colors"
      >
        {{ manufacturer.name }}<span v-if="index < manufacturers.length - 1">, </span>
      </RouterLink>
    </div>

    <!-- Цена -->
    <div class="mb-3">
      <p class="text-25 font-bold text-gray">{{ price }}</p>
    </div>

    <!-- Кнопка заказа -->
    <ButtonComponent
      text="Заказать"
      size="small"
      variant="light"
      class="uppercase text-14 font-semibold max-w-[130px]"
    />
  </div>
</template>

<style scoped>
.product-card {
  transition: transform 0.2s, box-shadow 0.2s;
}

.product-card:hover {
  transform: translateY(-2px);
  box-shadow: 0px 8px 30px rgba(0, 0, 0, 0.15), 0px 4px 44px rgba(37, 37, 37, 0.1) inset;
}
</style>
