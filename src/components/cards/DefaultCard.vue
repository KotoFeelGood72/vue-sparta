<script setup lang="ts">


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
      <button type="button">Заказать</button>
    </div>
  </RouterLink>
</template>
