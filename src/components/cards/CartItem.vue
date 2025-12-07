<script setup lang="ts">
import { computed } from 'vue';
import QtyInput from '../ui/QtyInput.vue';

export interface CartItemModel {
  id: string;
  image: string;
  title: string;
  price: number;
  quantity: number;
}

const props = defineProps<CartItemModel & { isLast?: boolean }>();

const emit = defineEmits<{
  'remove': [id: string];
  'update:quantity': [id: string, quantity: number];
}>();

const quantityModel = computed({
  get: () => props.quantity,
  set: (value) => {
    emit('update:quantity', props.id, value);
  }
});

const removeItem = () => {
  emit('remove', props.id);
};

const total = computed(() => props.price * props.quantity);
</script>

<template>
  <div class="cart-item bg-white h-[136px] flex items-center px-8 relative flex-grow">
    <div class="flex items-center gap-6 flex-grow min-w-[230px]">
      <div class="w-[82px] h-[82px] rounded-[10px] overflow-hidden flex-shrink-0">
        <img :src="image" :alt="title" class="w-full h-full object-cover">
      </div>
      <p class="text-18 font-normal text-[#131211] leading-[26px] line-clamp-3">{{ title }}</p>
    </div>

    <div class="flex items-center gap-8 flex-shrink-0">
      <div class="w-[104px] text-right">
        <p class="text-20 font-bold text-[#20191d] leading-[30px]">{{ price.toLocaleString('ru-RU') }} р</p>
      </div>

      <QtyInput v-model="quantityModel" />

      <div class="w-[104px] text-right">
        <p class="text-20 font-bold text-[#20191d] leading-[30px]">{{ total.toLocaleString('ru-RU') }}р</p>
      </div>

      <button
        @click="removeItem"
        class="w-[15px] h-[15px] flex items-center justify-center hover:opacity-70 transition-opacity flex-shrink-0"
      >
        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M1 1L14 14M14 1L1 14" stroke="black" stroke-width="2" stroke-linecap="round"/>
        </svg>
      </button>
    </div>

    <!-- Разделитель -->
    <div v-if="!isLast" class="absolute bottom-0 left-0 right-0 h-px bg-gray-200"></div>
  </div>
</template>

