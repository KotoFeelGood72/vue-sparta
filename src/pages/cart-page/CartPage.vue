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
  <div class="cart-page bg-[#EFEFEF]">
    <div class="container pb-24">
      <div class="flex pt-5 items-end">
        <!-- Основной контент -->
        <div class="flex-1">
          <!-- Заголовки колонок -->
          <div class="flex items-end gap-10 mb-4 px-8">
            <div class="flex-1"></div>
            <div class="w-[104px] text-right">
              <p class="text-20 font-normal text-gray">Цена</p>
            </div>
            <div class="w-[142px] text-center">
              <p class="text-20 font-normal text-gray">Количество</p>
            </div>
            <div class="w-[104px] text-right">
              <p class="text-20 font-normal text-gray">Итого</p>
            </div>
            <div class="w-[15px]"></div>
          </div>

          <!-- Список товаров -->
          <div class="bg-white rounded-tl-[10px] rounded-bl-[10px] overflow-hidden">
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
        <div class="w-[327px] flex-shrink-0">
          <div class="bg-dark rounded-tr-[10px] rounded-br-[10px] p-8 h-[273px] flex flex-col justify-center gap-4">
            <div class="flex gap-2 items-center justify-center">
              <p class="text-30 font-light text-white">Итого:</p>
              <p class="text-30 font-semibold text-white">{{ totalPrice.toLocaleString('ru-RU') }}р</p>
            </div>
            <ButtonComponent
              text="Отправить заявку"
              size="large"
              variant="primary"
              class="w-full normal-case h-[63px]"
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

<style scoped>
.cart-page {
  min-height: calc(100vh - 200px);
}
</style>
