<script setup lang="ts">
import InstockIcon from '../icons/InstockIcon.vue';
import ButtonComponent from '../ui/ButtonComponent.vue';

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

const { image, title, id, slug } = defineProps<ProductCardModel>();
</script>

<template>
  <RouterLink :to="`/${slug}/${id}`">
    <div>
      <img :src="image" :alt="title">
    </div>
    <div>
      <div>
        <InstockIcon/>
        <span>{{ instock }}</span>
      </div>
      <h3>{{ title }}</h3>
      <div>
        <span>Производитель</span>
        <ul>
          <li v-for="manufacturer in manufacturers" :key="manufacturer.id">
            <RouterLink to="/">{{ manufacturer.name }}</RouterLink>
          </li>
        </ul>
      </div>
      <div>{{ price }}</div>
      <ButtonComponent text="Заказать" size="small" variant="primary"/>
    </div>
  </RouterLink>
</template>
