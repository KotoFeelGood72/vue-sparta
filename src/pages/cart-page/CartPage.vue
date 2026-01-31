<script setup lang="ts">
import { ref, computed } from 'vue';
import CartItem, { type CartItemModel } from '@/components/cards/CartItem.vue';
import ButtonComponent from '@/components/ui/ButtonComponent.vue';
import BlockForm from '@/components/shared/BlockForm.vue';

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
]);


const totalPrice = computed(() => {
  return cartItems.value.reduce((sum, item) => sum + (item.price * item.quantity), 0);
});

const updateQuantity = (id: string, quantity: number) => {
  const item = cartItems.value.find(i => i.id === id);
  if (item) {
    item.quantity = quantity;
  }
};

const removeItem = (id: string) => {
  cartItems.value = cartItems.value.filter(item => item.id !== id);
};

</script>

<template>
  <div class="cart-page">
    <div class="cart-page__container">
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
              size="large"
              variant="primary"
              custom-class="cart-page__submit-button"
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
  </div>
</template>

<style scoped lang="scss">
// @use '@/styles/variables' as *;

.cart-page {
  background-color: $color-page-bg;
  min-height: calc(100vh - 200px);

  &__container {
    max-width: 1187px;
    margin: 0 auto;
    padding: 0 16px;
    padding-bottom: 96px;
  }

  &__content {
    display: flex;
    padding-top: 20px;
    align-items: flex-end;
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
    font-size: $font-size-20;
    line-height: $line-height-20;
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
  }

  &__sidebar-inner {
    background-color: $color-dark;
    border-radius: 0 10px 10px 0;
    padding: 32px;
    height: 273px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    gap: 16px;
  }

  &__total-block {
    display: flex;
    gap: 8px;
    align-items: center;
    justify-content: center;
  }

  &__total-label {
    font-size: $font-size-30;
    line-height: $line-height-30;
    font-weight: 300;
    color: $color-white;
  }

  &__total-value {
    font-size: $font-size-30;
    line-height: $line-height-30;
    font-weight: 600;
    color: $color-white;
  }

  &__submit-button {
    width: 100%;
    text-transform: none;
    height: 63px;
  }
}
</style>
