<script setup lang="ts">
import ButtonComponent from '../ui/ButtonComponent.vue';
import CardDecoratorIcon from '../icons/CardDecoratorIcon.vue';


export interface DefaultCardModel {
  image: string;
  title: string;
  id: string
  slug: string
}


const { image, title, id, slug } = defineProps<DefaultCardModel>();

</script>

<template>
  <RouterLink :to="`/${slug}/${id}`" class="default-card bg-white lg:p-5 lg:pb-10 flex flex-col lg:gap-10 rounded-[10px] relative">
    <div>
      <img :src="image" :alt="title">
    </div>
    <div>
      <h3 class="lg:text-25 font-bold text-gray text-center lg:mb-10">{{ title }}</h3>
      <ButtonComponent text="Заказать" size="small" variant="primary" class="text-18 font-semibold uppercase max-w-[147px] mx-auto"/>
    </div>
    <CardDecoratorIcon class="absolute bottom-0 right-0"/>
  </RouterLink>
</template>
