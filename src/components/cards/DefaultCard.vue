<script setup lang="ts">
import ButtonComponent from '../ui/ButtonComponent.vue';


export interface DefaultCardModel {
  image: string;
  title: string;
  id: string
  slug: string
}


const { image, title, id, slug } = defineProps<DefaultCardModel>();

</script>

<template>
  <RouterLink :to="`/${slug}/${id}`">
    <div>
      <img :src="image" :alt="title">
    </div>
    <div>
      <h3>{{ title }}</h3>
      <ButtonComponent text="Заказать" size="small" variant="primary"/>
    </div>
  </RouterLink>
</template>
