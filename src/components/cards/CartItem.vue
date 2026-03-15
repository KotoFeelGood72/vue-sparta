<script setup lang="ts">
import { computed } from 'vue'
import QtyInput from '../ui/QtyInput.vue'

export interface CartItemModel {
  id: string
  image: string
  title: string
  price: number
  quantity: number
}

const props = defineProps<CartItemModel & { isLast?: boolean }>()

const emit = defineEmits<{
  remove: [id: string]
  'update:quantity': [id: string, quantity: number]
}>()

const quantityModel = computed({
  get: () => props.quantity,
  set: (value) => {
    emit('update:quantity', props.id, value)
  },
})

const removeItem = () => {
  emit('remove', props.id)
}

const total = computed(() => props.price * props.quantity)
</script>

<template>
  <div class="cart-item">
    <div class="cart-item__content">
      <div class="cart-item__image-wrapper">
        <img :src="image" :alt="title" class="cart-item__image" />
      </div>
      <p class="cart-item__title">{{ title }}</p>
    </div>

    <div class="cart-item__actions">
      <div class="cart-item__price-block">
        <p class="cart-item__price">{{ price.toLocaleString('ru-RU') }} р</p>
      </div>

      <QtyInput v-model="quantityModel" />

      <div class="cart-item__total-block">
        <p class="cart-item__total">{{ total.toLocaleString('ru-RU') }}р</p>
      </div>

      <button @click="removeItem" class="cart-item__remove-button" aria-label="Удалить товар">
        <svg
          width="15"
          height="15"
          viewBox="0 0 15 15"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path d="M1 1L14 14M14 1L1 14" stroke="black" stroke-width="2" stroke-linecap="round" />
        </svg>
      </button>
    </div>

    <!-- Разделитель -->
    <div v-if="!isLast" class="cart-item__divider"></div>
  </div>
</template>

<style scoped lang="scss">
.cart-item {
  background-color: $color-white;
  // height: 136px;
  display: flex;
  align-items: center;
  padding: 16px;
  position: relative;
  flex-grow: 1;

  &__content {
    display: flex;
    align-items: FLEX;
    gap: 24px;
    flex-grow: 1;
    min-width: 230px;
  }

  &__image-wrapper {
    width: 60px;
    height: 60px;
    border-radius: 10px;
    overflow: hidden;
    flex-shrink: 0;
  }
  &__image {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  &__title {
    font-size: 16px;
    line-height: 160%;
    font-weight: 400;
    color: $color-dark;
    line-height: 160%;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }

  &__actions {
    display: flex;
    align-items: center;
    gap: 32px;
    flex-shrink: 0;
  }

  &__price-block,
  &__total-block {
    width: 104px;
    text-align: right;
  }

  &__price,
  &__total {
    font-size: 16px;
    line-height: 160%;
    font-weight: 700;
    color: $color-dark;
  }

  &__remove-button {
    width: 15px;
    height: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: transparent;
    border: none;
    cursor: pointer;
    flex-shrink: 0;
    transition: opacity 0.2s;

    &:hover {
      opacity: 0.7;
    }
  }

  &__divider {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 1px;
    background-color: #e5e7eb;
  }
}
</style>
