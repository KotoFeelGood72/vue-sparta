<script setup lang="ts">
import { computed } from 'vue';

export interface InputComponentModel {
  placeholder: string
  type: 'text' | 'email' | 'password' | 'number' | 'tel' | 'url' | 'search'
  id: string
  name: string
  required: boolean
  size: 'small' | 'medium' | 'large'
}


const model = defineModel<string>('modelValue', { required: true });
const { placeholder, type, id, name, required, size } = defineProps<InputComponentModel>();

const sizeClass = computed(() => {
  switch (size) {
    case 'small':
      return 'py-4 px-6';
    case 'medium':
      return 'py-7 px-11';
    case 'large':
      return 'h-[89px] text-18 leading-none';
    default:
      return 'py-7 px-11';
  }
});
</script>

<template>
  <div class="input-component">
    <input :type="type" :placeholder="placeholder" v-model="model" :id="id" :name="name" :required="required" :class="[sizeClass, 'w-full h-full bg-[#EFEFEF] py-7 px-11 rounded-full']">
  </div>
</template>
