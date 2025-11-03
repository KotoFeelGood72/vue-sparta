<script setup lang="ts">
import CheckIcon from '../icons/CheckIcon.vue';

export interface CheckboxesComponentModel {
  value: string
  id: string
  name: string
  required: boolean
}

const { value, id, name, required } = defineProps<CheckboxesComponentModel>();

const model = defineModel<boolean>('modelValue', { required: false });
</script>

<template>
  <div class="checkboxes-component">
    <input type="checkbox" v-model="model" :id="id" :value="value" :name="name" :required="required" style="display: none;">
    <div>
      <CheckIcon />
    </div>
    <div>
      <slot/>
    </div>
  </div>
</template>
