<script setup lang="ts">

  export interface BlockImgSectionModel {
    image: string;
    content: string;
    title?: string;
  }

  const { image, content, title, reversed = false } = defineProps<BlockImgSectionModel & { reversed?: boolean }>();

</script>

<template>
  <div class="block-img-section">
    <div class="block-img-section__image-wrapper" :class="{ 'block-img-section__image-wrapper--reversed': reversed }">
      <img :src="image" alt="Экскаватор" class="block-img-section__image">
    </div>
    <div class="block-img-section__content" :class="{ 'block-img-section__content--reversed': reversed }">
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
  }

  &__content {
    display: flex;
    flex-direction: column;
    gap: 24px;
    font-size: $font-size-18;
    line-height: $line-height-18;
    color: $color-gray;
    line-height: 125%;
    order: 2;

    @media (min-width: 1024px) {
      font-size: $font-size-20;
      line-height: $line-height-20;
    }

    &--reversed {
      order: 1;
    }
  }

  &__title {
    font-size: $font-size-35;
    line-height: $line-height-35;
    font-family: $font-family-bebas;
    text-transform: uppercase;
    color: $color-gray;
    line-height: 105%;

    @media (min-width: 1024px) {
      font-size: $font-size-55;
      line-height: $line-height-55;
    }
  }

  &__text {
    font-size: inherit;
    line-height: inherit;
    color: inherit;
  }
}
</style>
