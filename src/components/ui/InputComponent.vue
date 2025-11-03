<script setup lang="ts">

export interface InputComponentModel {
  placeholder: string
  type: 'text' | 'email' | 'password' | 'number' | 'tel' | 'url' | 'search'
  id: string
  name: string
  required: boolean
}


const model = defineModel<string>('modelValue', { required: true });
const { placeholder, type, id, name, required } = defineProps<InputComponentModel>();
</script>

<template>
  <div class="input-component">
    <input :type="type" :placeholder="placeholder" v-model="model" :id="id" :name="name" :required="required">
  </div>
</template>
