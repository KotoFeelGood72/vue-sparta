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
  <RouterLink :to="`/${slug}/${id}`" class="default-card">
    <div class="default-card__image-wrapper">
      <img :src="image" :alt="title" class="default-card__image">
    </div>
    <div class="default-card__content">
      <h3 class="default-card__title">{{ title }}</h3>
      <ButtonComponent text="Заказать" size="small" variant="primary" custom-class="default-card__button"/>
    </div>
    <CardDecoratorIcon class="default-card__decorator"/>
  </RouterLink>
</template>

<style scoped lang="scss">
@import '@/styles/variables';

.default-card {
  background-color: $color-white;
  padding: 20px;
  padding-bottom: 40px;
  display: flex;
  flex-direction: column;
  gap: 40px;
  border-radius: 10px;
  position: relative;
  height: 100%;
  text-decoration: none;
  transition: transform 0.2s, box-shadow 0.2s;

  @media (min-width: 1024px) {
    padding: 20px;
    padding-bottom: 40px;
  }

  &:hover {
    transform: translateY(-2px);
    box-shadow: 0px 8px 30px rgba(0, 0, 0, 0.15);
  }

  &__image-wrapper {
    width: 100%;
  }

  &__image {
    width: 100%;
    height: auto;
    display: block;
  }

  &__content {
    display: flex;
    flex-direction: column;
    flex: 1;
    justify-content: space-between;
  }

  &__title {
    font-size: $font-size-20;
    line-height: $line-height-20;
    font-weight: 700;
    color: $color-gray;
    text-align: center;
    margin-bottom: 40px;

    @media (min-width: 1024px) {
      font-size: $font-size-25;
      line-height: $line-height-25;
    }
  }

  &__button {
    font-size: $font-size-18;
    line-height: $line-height-18;
    font-weight: 600;
    text-transform: uppercase;
    max-width: 147px;
    margin: 0 auto;
  }

  &__decorator {
    position: absolute;
    bottom: 0;
    right: 0;
  }
}
</style>
