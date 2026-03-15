<script setup lang="ts">
import { computed } from 'vue'

export interface InputComponentModel {
  placeholder: string
  type: 'text' | 'email' | 'password' | 'number' | 'tel' | 'url' | 'search'
  id: string
  name: string
  required: boolean
  size: 'small' | 'medium' | 'large'
  error?: boolean
}

const model = defineModel<string>('modelValue', { required: true })
const {
  placeholder,
  type,
  id,
  name,
  required,
  size,
  error = false,
} = defineProps<InputComponentModel>()

const inputClasses = computed(() => {
  const classes = ['input']
  classes.push(`input--${size}`)
  if (error) classes.push('input--error')
  return classes
})
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
    />
  </div>
</template>

<style scoped lang="scss">
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
  box-shadow: 0 0 0 2px transparent;
  transition: box-shadow 0.2s;

  &--error {
    box-shadow: 0 0 0 2px #e53e3e;
  }

  padding: 20px 24px;
  // &--small {
  // }

  // &--medium {
  //   padding: 28px 44px;
  // }

  &--large {
    // height: 89px;
    // padding: 0 44px;
    font-size: 16px;
    // line-height: 1;

    // @include bp($point_2) {
    //   height: 77px;
    // }
  }
}
</style>
