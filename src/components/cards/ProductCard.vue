<script setup lang="ts">
import { RouterLink } from 'vue-router';
import InstockIcon from '../icons/InstockIcon.vue';
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

const props = defineProps<ProductCardModel>();
</script>

<template>
  <div class="product-card bg-white rounded-[10px] p-5 relative h-full flex flex-col shadow-custom-deep">
    <CardDecoratorIcon class="absolute bottom-0 right-0 opacity-10"/>
    
    <!-- Статус наличия -->
    <div class="flex items-center gap-2 mb-4">
      <div class="flex items-center justify-center w-5 h-5 rounded-full bg-yellow">
        <InstockIcon class="w-4 h-4"/>
      </div>
      <span class="text-14 font-normal text-gray">{{ instock }}</span>
    </div>
    
    <!-- Изображение -->
    <div class="mb-4 flex-shrink-0">
      <img :src="image" :alt="title" class="w-full h-auto object-cover rounded-[5px]">
    </div>
    
    <!-- Название -->
    <h3 class="text-18 font-normal text-gray mb-3 flex-1 line-clamp-2">{{ title }}</h3>
    
    <!-- Производитель -->
    <div class="mb-4">
      <span class="text-14 font-normal text-gray">Производитель: </span>
      <RouterLink 
        v-for="(manufacturer, index) in manufacturers" 
        :key="manufacturer.id"
        :to="`/manufacturer/${manufacturer.slug}`"
        class="text-14 font-normal text-gray hover:text-yellow transition-colors"
      >
        {{ manufacturer.name }}<span v-if="index < manufacturers.length - 1">, </span>
      </RouterLink>
    </div>
    
    <!-- Цена -->
    <div class="mb-4">
      <p class="text-30 font-bold text-gray">{{ price }}</p>
    </div>
    
    <!-- Кнопка заказа -->
    <ButtonComponent 
      text="Заказать" 
      size="small" 
      variant="secondary"
      class="w-full uppercase text-18 font-semibold"
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
