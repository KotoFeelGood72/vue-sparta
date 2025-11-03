<script setup lang="ts">
import InputComponent from '../ui/InputComponent.vue';
import ButtonComponent from '../ui/ButtonComponent.vue';
import CheckboxesComponent from '../ui/CheckboxesComponent.vue';
import { FormHandler } from '@/clases/FormHandler';
import { ref } from 'vue';

const form = ref<FormHandler>(new FormHandler('', ''));
</script>

<template>
  <div class="form-component">
    <InputComponent v-model="form.name" placeholder="Имя" type="text" id="name" name="name" required />
    <InputComponent v-model="form.phone" placeholder="Телефон" type="tel" id="phone" name="phone" required />
    <ButtonComponent text="Отправить" size="medium" variant="primary" @click="form.submit()" />
    <CheckboxesComponent value="1" id="1" name="1" required>
      Нажимая на кнопку, вы даете согласие на <a href="#">обработку персональных данных</a>
    </CheckboxesComponent>
  </div>
</template>
