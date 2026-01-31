<script setup lang="ts">
import InputComponent from '../ui/InputComponent.vue';
import ButtonComponent from '../ui/ButtonComponent.vue';
import CheckboxesComponent from '../ui/CheckboxesComponent.vue';
import { FormHandler } from '@/clases/FormHandler';
import { ref } from 'vue';

const form = ref<FormHandler>(new FormHandler('', ''));

const props = defineProps<{
  theme: 'white' | 'dark'
}>();
</script>

<template>
  <div class="form-component">
    <InputComponent v-model="form.name" placeholder="Имя" type="text" id="name" name="name" required size="large" class="form-component__input"/>
    <InputComponent v-model="form.phone" placeholder="Телефон" type="tel" id="phone" name="phone" required size="large" class="form-component__input"/>
    <ButtonComponent text="заказать экспресс-доставку" size="large" variant="primary" @click="form.submit()" class="form-component__button"/>
    <CheckboxesComponent value="1" id="1" name="1" required :class="['form-component__checkbox', props.theme === 'dark' ? 'form-component__checkbox--dark' : 'form-component__checkbox--light']">
      Нажимая на кнопку, вы даете согласие на <a href="#">обработку персональных данных</a>
    </CheckboxesComponent>
  </div>
</template>

<style scoped lang="scss">
// @use '@/styles/variables' as *;

.form-component {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 32px;

  &__input {
    // input styles
  }

  &__button {
    // button styles
  }

  &__checkbox {
    &--dark {
      color: $color-white;

      :deep(a) {
        color: $color-white !important;
        text-decoration: underline;
        transition: opacity 0.2s;

        &:hover {
          opacity: 0.8;
        }
      }
    }

    &--light {
      color: $color-dark;

      :deep(a) {
        color: $color-dark !important;
        text-decoration: underline;
        transition: opacity 0.2s;

        &:hover {
          opacity: 0.8;
        }
      }
    }
  }
}
</style>
