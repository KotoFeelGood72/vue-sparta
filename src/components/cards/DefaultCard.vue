<script setup lang="ts">
import ButtonComponent from '../ui/ButtonComponent.vue'
import CardDecoratorIcon from '../icons/CardDecoratorIcon.vue'

export interface DefaultCardModel {
  image: string
  title: string
  id: string
  slug: string
}

const props = defineProps<DefaultCardModel & { to?: string }>()
const { image, title, id, slug, to } = props
const linkTo = to ?? `/${slug}/${id}`
</script>

<template>
  <RouterLink :to="linkTo" class="default-card">
    <div class="default-card__image-wrapper">
      <img :src="image" :alt="title" class="default-card__image" />
    </div>
    <div class="default-card__content">
      <h3 class="default-card__title">{{ title }}</h3>
      <ButtonComponent
        text="Заказать"
        size="small"
        variant="primary"
        custom-class="default-card__button"
      />
    </div>
    <CardDecoratorIcon class="default-card__decorator" />
  </RouterLink>
</template>

<style scoped lang="scss">
.default-card {
  background-color: $color-white;
  padding: 20px;
  padding-bottom: 40px;
  display: flex;
  flex-direction: column;
  gap: 25px;
  border-radius: 10px;
  position: relative;
  height: 100%;
  text-decoration: none;
  transition: all 0.3s ease-in-out;

  &__image-wrapper {
    width: 100%;
    height: 268px;
    border-radius: 10px;
    overflow: hidden;
  }

  &__image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
  }

  &__content {
    display: flex;
    flex-direction: column;
    flex: 1;
    justify-content: space-between;
  }

  &__title {
    font-size: 20px;
    font-weight: 700;
    color: $color-gray;
    text-align: center;
    margin-bottom: 25px;
  }

  &__button {
    font-size: 18px;
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
