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
  <div class="form-component grid grid-cols-2 gap-8">
    <InputComponent v-model="form.name" placeholder="Имя" type="text" id="name" name="name" required size="large" />
    <InputComponent v-model="form.phone" placeholder="Телефон" type="tel" id="phone" name="phone" required size="large" />
    <ButtonComponent text="заказать экспресс-доставку" size="large" variant="primary" @click="form.submit()" />
    <CheckboxesComponent value="1" id="1" name="1" required :class="props.theme === 'dark' ? 'text-white' : 'text-dark'">
      Нажимая на кнопку, вы даете согласие на <a href="#">обработку персональных данных</a>
    </CheckboxesComponent>
  </div>
</template>
