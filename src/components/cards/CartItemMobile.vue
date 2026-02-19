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
    <div class="cart-item__header">
      <div class="cart-item__content">
        <div class="cart-item__image-wrapper">
          <img :src="image" :alt="title" class="cart-item__image" />
        </div>
        <p class="cart-item__title">{{ title }}</p>
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

    <div class="cart-item__actions">
      <div class="cart-item__action-item">
        <p class="cart-item__action-label">Цена</p>
        <p class="cart-item__price">{{ price.toLocaleString('ru-RU') }}р</p>
      </div>

      <div class="cart-item__action-item">
        <p class="cart-item__action-label">Количество</p>
        <QtyInput v-model="quantityModel" />
      </div>

      <div class="cart-item__action-item">
        <p class="cart-item__action-label">Итого</p>
        <p class="cart-item__total">{{ total.toLocaleString('ru-RU') }}р</p>
      </div>
    </div>

    <!-- Разделитель -->
    <div v-if="!isLast" class="cart-item__divider"></div>
  </div>
</template>

<style scoped lang="scss">
.cart-item {
  background-color: $color-white;
  display: flex;
  flex-direction: column;
  padding: 16px;
  position: relative;
  flex-grow: 1;

  &__header {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 12px;
    margin-bottom: 16px;

    @include bp($point_2) {
      align-items: center;
    }
  }

  &__content {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    flex-grow: 1;
    min-width: 0;

    @include bp($point_2) {
      align-items: center;
    }
  }

  &__image-wrapper {
    width: 82px;
    height: 82px;
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
    font-size: $font-size-18;
    line-height: $line-height-18;
    font-weight: 400;
    color: $color-dark;
    line-height: 26px;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    flex: 1;
    min-width: 0;
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
    padding: 0;
    margin-top: 2px;

    &:hover {
      opacity: 0.7;
    }
  }

  &__actions {
    display: flex;
    align-items: flex-start;
    gap: 16px;
    justify-content: space-between;
  }

  &__action-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
    flex: 1;
    min-width: 0;

    @include bp($point_2) {
      align-items: flex-start;
    }
  }

  &__action-label {
    font-size: $font-size-14;
    line-height: $line-height-14;
    font-weight: 400;
    color: $color-gray;
    text-align: center;

    @include bp($point_2) {
      color: #8b8b8b;
    }
  }

  &__price,
  &__total {
    font-size: $font-size-20;
    line-height: $line-height-20;
    font-weight: 700;
    color: $color-dark;
    text-align: center;

    @include bp($point_2) {
      font-size: 16px;
      font-weight: 500;
      text-align: left;
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

  :deep(.qty-input) {
    width: 100%;
    max-width: 120px;
    height: 40px;

    @include bp($point_2) {
      max-width: 79px;
      width: 100%;
      height: 26px;
    }
  }

  :deep(.qty-input__button) {
    width: 35px;
    height: 40px;

    @include bp($point_2) {
      width: 24px;
      height: 26px;
    }
  }
}
</style>
