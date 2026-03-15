<script setup lang="ts">
import { inject } from 'vue'
import { RouterLink, useRouter } from 'vue-router'
import CheckFillIcon from '../icons/CheckFillIcon.vue'
import ButtonComponent from '../ui/ButtonComponent.vue'
import CardDecoratorIcon from '../icons/CardDecoratorIcon.vue'

type OrderProductPayload = {
  image?: string
  title?: string
  subtitle?: string
}

const openOrderModal = inject<(payload?: OrderProductPayload) => void>('openOrderModal', () => {})

export interface Manufacturer {
  name: string
  slug: string
  id: string
}

export interface ProductCardModel {
  image: string
  title: string
  id: string
  slug: string
  manufacturers: Manufacturer[]
  instock: string
  price: string
}

const props = defineProps<ProductCardModel & { to?: string }>()
const { image, title, manufacturers, instock, price, to } = props
const router = useRouter()

const goToProduct = () => {
  if (to) router.push(to)
}

const onLinkClick = (e: MouseEvent) => e.stopPropagation()

const onOrderClick = () => {
  openOrderModal()
}
</script>

<template>
  <div
    class="product-card"
    :class="{ 'product-card--clickable': to }"
    role="button"
    :tabindex="to ? 0 : -1"
    @click="goToProduct"
    @keydown.enter="goToProduct"
    @keydown.space.prevent="goToProduct"
  >
    <CardDecoratorIcon class="product-card__decorator" />

    <!-- Изображение -->
    <div class="product-card__image-wrapper">
      <img :src="image" :alt="title" class="product-card__image" />
    </div>

    <div class="product-card__instock">
      <div class="product-card__instock-icon">
        <CheckFillIcon />
      </div>
      <span class="product-card__instock-text">{{ instock }}</span>
    </div>

    <!-- Название -->
    <h3 class="product-card__title">{{ title }}</h3>

    <!-- Производитель -->
    <div class="product-card__manufacturer">
      <span class="product-card__manufacturer-label">Производитель: </span>
      <RouterLink
        v-for="(manufacturer, index) in manufacturers"
        :key="manufacturer.id"
        :to="`/manufacturer/${manufacturer.slug}`"
        class="product-card__manufacturer-link"
        @click="onLinkClick"
      >
        {{ manufacturer.name }}<span v-if="index < manufacturers.length - 1">, </span>
      </RouterLink>
    </div>

    <!-- Цена -->
    <div class="product-card__price">
      <p class="product-card__price-text">{{ price }}</p>
    </div>

    <!-- Кнопка заказа -->
    <div class="product-card__button-wrap" @click.stop="onOrderClick">
      <ButtonComponent
        text="Заказать"
        size="small"
        variant="light"
        custom-class="product-card__button"
      />
    </div>
  </div>
</template>

<style scoped lang="scss">
.product-card {
  background-color: $color-white;
  border-radius: 10px;
  padding: 16px;
  position: relative;
  height: 100%;
  display: flex;
  flex-direction: column;

  &--clickable {
    cursor: pointer;
  }

  &__decorator {
    position: absolute;
    bottom: 0;
    right: 0;
  }

  &__image-wrapper {
    margin-bottom: 16px;
    flex-shrink: 0;
  }

  &__image {
    width: 100%;
    height: auto;
    object-fit: cover;
    border-radius: 10px;
  }

  &__instock {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 8px;
  }

  &__instock-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 16px;
    height: 16px;
  }

  &__instock-text {
    font-size: $font-size-16;
    line-height: $line-height-16;
    font-weight: 400;
    color: $color-light-gray-text;
  }

  &__title {
    font-size: 16px;
    line-height: 160%;
    font-weight: 400;
    color: $color-gray;
    margin-bottom: 6px;
    flex: 1;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }

  &__manufacturer {
    margin-bottom: 8px;
  }

  &__manufacturer-label {
    font-size: 14px;
    line-height: 160%;
    font-weight: 400;
    color: $color-light-gray-text;
  }

  &__manufacturer-link {
    font-size: 14px;
    line-height: 160%;
    font-weight: 600;
    color: $color-yellow;
    text-decoration: none;
    transition: color 0.2s;

    &:hover {
      color: $color-gray;
    }
  }

  &__price {
    margin-bottom: 12px;
  }

  &__price-text {
    font-size: $font-size-25;
    line-height: $line-height-25;
    font-weight: 700;
    color: $color-gray;
  }

  &__button-wrap {
    align-self: flex-start;
  }

  &__button {
    text-transform: uppercase;
    font-size: $font-size-14;
    line-height: $line-height-14;
    font-weight: 600;
    max-width: 130px;
  }
}
</style>
