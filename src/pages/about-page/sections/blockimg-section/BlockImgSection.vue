<script setup lang="ts">
export interface BlockImgSectionModel {
  image: string
  content: string
  title?: string
}

const {
  image,
  content,
  title,
  reversed = false,
} = defineProps<BlockImgSectionModel & { reversed?: boolean }>()
</script>

<template>
  <div class="block-img-section">
    <div
      class="block-img-section__image-wrapper"
      :class="{ 'block-img-section__image-wrapper--reversed': reversed }"
    >
      <img :src="image" alt="Экскаватор" class="block-img-section__image" />
    </div>
    <div
      class="block-img-section__content"
      :class="{ 'block-img-section__content--reversed': reversed }"
    >
      <h2 v-if="title" class="block-img-section__title">{{ title }}</h2>
      <div class="block-img-section__text" v-html="content"></div>
    </div>
  </div>
</template>

<style scoped lang="scss">
.block-img-section {
  display: grid;
  grid-template-columns: 1fr;
  gap: 32px;

  @media (min-width: 1024px) {
    grid-template-columns: repeat(2, 1fr);
    gap: 40px;
  }

  &__image-wrapper {
    order: 1;

    &--reversed {
      order: 2;
    }
  }

  &__image {
    width: 100%;
    height: auto;
    object-fit: cover;
    max-width: 400px;
  }

  &__content {
    display: flex;
    flex-direction: column;
    gap: 16px;
    font-size: 16px;
    line-height: 160%;
    font-weight: 400;
    color: $color-gray;
    line-height: 125%;
    order: 2;

    &--reversed {
      order: 1;
    }
  }

  &__title {
    font-size: 35px;
    line-height: 128%;
    font-family: $font-family-bebas;
    text-transform: uppercase;
    color: $color-gray;
    line-height: 105%;

    @media (min-width: 1024px) {
      font-size: 50px;
      line-height: 100%;
    }
  }

  &__text {
    font-size: 16px;
    line-height: 160%;
    font-weight: 400;
  }
}
</style>
