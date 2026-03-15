<script setup lang="ts">
import { ref, computed } from 'vue'
import CartItem, { type CartItemModel } from '@/components/cards/CartItem.vue'
import ButtonComponent from '@/components/ui/ButtonComponent.vue'
import BlockForm from '@/components/shared/BlockForm.vue'
import CartItemMobile from '@/components/cards/CartItemMobile.vue'
import ModalCartOrder from '@/components/modals/ModalCartOrder.vue'
import { useMediaStoreRefs } from '@/stores/useMediaStore'

const { isMobile } = useMediaStoreRefs()
const isModalOpen = ref(false)

const cartItems = ref<CartItemModel[]>([
  {
    id: '1',
    image: '/images/agregate-1.png',
    title: 'Глушитель ЕК-12 312-04-03.50.600 (312040300 99)',
    price: 20500,
    quantity: 1,
  },
  {
    id: '2',
    image: '/images/agregate-2.png',
    title: 'Глушитель ЕК-12 312-04-03.50.600 (312040300 99)',
    price: 20500,
    quantity: 1,
  },
])

const totalPrice = computed(() => {
  return cartItems.value.reduce((sum, item) => sum + item.price * item.quantity, 0)
})

const updateQuantity = (id: string, quantity: number) => {
  const item = cartItems.value.find((i) => i.id === id)
  if (item) {
    item.quantity = quantity
  }
}

const removeItem = (id: string) => {
  cartItems.value = cartItems.value.filter((item) => item.id !== id)
}
</script>

<template>
  <div class="cart-page">
    <div class="cart-page__container container">
      <div class="cart-page__content">
        <!-- Основной контент -->
        <div class="cart-page__main">
          <!-- Заголовки колонок -->
          <div class="cart-page__headers">
            <div class="cart-page__header-spacer"></div>
            <div class="cart-page__header-cell cart-page__header-cell--price">
              <p class="cart-page__header-text">Цена</p>
            </div>
            <div class="cart-page__header-cell cart-page__header-cell--qty">
              <p class="cart-page__header-text">Количество</p>
            </div>
            <div class="cart-page__header-cell cart-page__header-cell--total">
              <p class="cart-page__header-text">Итого</p>
            </div>
            <div class="cart-page__header-spacer cart-page__header-spacer--small"></div>
          </div>

          <!-- Список товаров -->
          <div class="cart-page__items-wrapper">
            <template v-if="!isMobile">
              <CartItem
                v-for="(item, index) in cartItems"
                :key="item.id"
                :id="item.id"
                :image="item.image"
                :title="item.title"
                :price="item.price"
                :quantity="item.quantity"
                :is-last="index === cartItems.length - 1"
                @update:quantity="updateQuantity"
                @remove="removeItem"
              />
            </template>
            <template v-else>
              <CartItemMobile
                v-for="(item, index) in cartItems"
                :key="item.id"
                :id="item.id"
                :image="item.image"
                :title="item.title"
                :price="item.price"
                :quantity="item.quantity"
                :is-last="index === cartItems.length - 1"
                @update:quantity="updateQuantity"
                @remove="removeItem"
              />
            </template>
          </div>
        </div>

        <!-- Боковая панель -->
        <div class="cart-page__sidebar">
          <div class="cart-page__sidebar-inner">
            <div class="cart-page__total-block">
              <p class="cart-page__total-label">Итого:</p>
              <p class="cart-page__total-value">{{ totalPrice.toLocaleString('ru-RU') }}р</p>
            </div>
            <ButtonComponent
              text="Отправить заявку"
              size="small"
              variant="primary"
              custom-class="cart-page__submit-button"
              @click="isModalOpen = true"
            />
          </div>
        </div>
      </div>
    </div>
    <BlockForm
      image="/images/form-car.png"
      customClass="!right-0"
      title="закажите экспресс-доставку"
      subtitle="Если у Вас есть сложности с выбором товара или другие вопросы, то Вы можете получить консультацию у наших менеджеров
в рабочие часы компании."
      theme="white"
    />
    <ModalCartOrder :open="isModalOpen" @close="isModalOpen = false" />
  </div>
</template>

<style scoped lang="scss">
.cart-page {
  background-color: $color-page-bg;
  min-height: calc(100vh - 200px);

  &__container {
    margin-bottom: $m-sec;
  }

  &__content {
    display: flex;
    padding-top: 20px;
    align-items: stretch;

    @include bp($point_2) {
      flex-direction: column;
    }
  }

  &__main {
    flex: 1;
  }

  &__headers {
    display: flex;
    align-items: flex-end;
    gap: 40px;
    margin-bottom: 16px;
    padding: 0 32px;

    @include bp($point_2) {
      display: none;
    }
  }

  &__header-spacer {
    flex: 1;

    &--small {
      flex: 0;
      width: 15px;
    }
  }

  &__header-cell {
    &--price,
    &--total {
      width: 104px;
      text-align: right;
    }

    &--qty {
      width: 142px;
      text-align: center;
    }
  }

  &__header-text {
    font-size: 16px;
    line-height: 160%;
    font-weight: 400;
    color: $color-gray;
  }

  &__items-wrapper {
    background-color: $color-white;
    border-radius: 10px 0 0 10px;
    overflow: hidden;
  }

  &__sidebar {
    width: 327px;
    flex-shrink: 0;

    @include bp($point_2) {
      width: 100%;
    }
  }

  &__sidebar-inner {
    background-color: $color-dark;
    border-radius: 0 10px 10px 0;
    padding: 32px;
    // height: 273px;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    gap: 16px;

    @include bp($point_2) {
      border-radius: 0 0 10px 10px;
      height: auto;
    }
  }

  &__total-block {
    display: flex;
    gap: 8px;
    align-items: center;
    justify-content: center;
    margin-bottom: 16px;
  }

  &__total-label {
    font-size: 22px;
    line-height: 140%;
    font-weight: 300;
    color: $color-white;

    @include bp($point_2) {
      font-size: 20px;
    }
  }

  &__total-value {
    font-size: 22px;
    line-height: 140%;
    font-weight: 600;
    color: $color-white;

    @include bp($point_2) {
      font-size: 20px;
    }
  }

  &__submit-button {
    width: 100%;
    text-transform: none;
    font-size: 14px;
    font-weight: 600;
    text-transform: uppercase;
  }
}
</style>
