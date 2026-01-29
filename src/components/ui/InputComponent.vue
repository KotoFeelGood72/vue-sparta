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

const inputClasses = computed(() => {
  const classes = ['input'];
  classes.push(`input--${size}`);
  return classes;
});
</script>

<template>
  <div class="input-component">
    <input
      :type="type"
      :placeholder="placeholder"
      v-model="model"
      :id="id"
      :name="name"
      :required="required"
      :class="inputClasses"
    >
  </div>
</template>

<style scoped lang="scss">
@import '@/styles/variables';

.input-component {
  width: 100%;
  height: 100%;
}

.input {
  width: 100%;
  height: 100%;
  background-color: $color-page-bg;
  border-radius: 9999px;
  border: none;
  outline: none;

  &--small {
    padding: 16px 24px;
  }

  &--medium {
    padding: 28px 44px;
  }

  &--large {
    height: 89px;
    padding: 0 44px;
    font-size: $font-size-18;
    line-height: 1;
  }
}
</style>
