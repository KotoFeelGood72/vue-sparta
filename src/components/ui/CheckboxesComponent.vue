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
    <div class="checkboxes-component__icon">
      <CheckIcon />
    </div>
    <div class="checkboxes-component__content">
      <slot/>
    </div>
  </div>
</template>

<style scoped lang="scss">
.checkboxes-component {
  display: flex;
  align-items: flex-start;
  gap: 8px;

  &__icon {
    flex-shrink: 0;
    margin-top: 2px;
  }

  &__content {
    flex: 1;

    a {
      color: inherit;
      text-decoration: underline;
      transition: opacity 0.2s;

      &:hover {
        opacity: 0.8;
      }
    }
  }
}
</style>
