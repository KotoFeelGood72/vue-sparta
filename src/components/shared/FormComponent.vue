<script setup lang="ts">
import { ref } from 'vue'
import InputComponent from '../ui/InputComponent.vue'
import ButtonComponent from '../ui/ButtonComponent.vue'
import CheckboxesComponent from '../ui/CheckboxesComponent.vue'
import { FormHandler } from '@/clases/FormHandler'
import { useNotify } from '@/composables/useNotify'

const form = ref<FormHandler>(new FormHandler('', '', false))
const errors = ref({ name: false, phone: false, checkbox: false })
const { notify } = useNotify()

const props = defineProps<{
  theme: 'white' | 'dark'
}>()

function handleSubmit() {
  const result = form.value.validate()
  errors.value = { ...result.errors, checkbox: !form.value.checkbox }
  if (!result.valid) {
    notify({ type: 'error', text: result.message })
    return
  }
  form.value.submit()
}
</script>

<template>
  <div class="form-component">
    <InputComponent
      v-model="form.name"
      placeholder="Имя"
      type="text"
      id="name"
      name="name"
      required
      size="large"
      class="form-component__input"
      :error="errors.name"
      @update:model-value="errors.name = false"
    />
    <InputComponent
      v-model="form.phone"
      placeholder="Телефон"
      type="tel"
      id="phone"
      name="phone"
      required
      size="large"
      class="form-component__input"
      :error="errors.phone"
      @update:model-value="errors.phone = false"
    />
    <ButtonComponent
      text="заказать экспресс-доставку"
      size="large"
      variant="primary"
      @click="handleSubmit"
      class="form-component__button"
    />
    <CheckboxesComponent
      value="1"
      id="1"
      name="1"
      required
      :class="[
        'form-component__checkbox',
        props.theme === 'dark'
          ? 'form-component__checkbox--dark'
          : 'form-component__checkbox--light',
      ]"
      v-model="form.checkbox"
      :error="errors.checkbox"
      @update:model-value="errors.checkbox = false"
    >
      Нажимая на кнопку, вы даете согласие на <a href="#">обработку персональных данных</a>
    </CheckboxesComponent>
  </div>
</template>

<style scoped lang="scss">
.form-component {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 16px;

  @include bp($point_2) {
    grid-template-columns: 1fr;
  }

  &__button {
    @include bp($point_2) {
      order: 5;
    }
  }

  &__checkbox {
    @include bp($point_2) {
      order: 4;
    }

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
