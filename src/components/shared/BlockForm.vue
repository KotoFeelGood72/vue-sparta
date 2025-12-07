<script setup lang="ts">
import FormComponent from './FormComponent.vue';

defineProps<{
  title: string
  subtitle: string
  theme: 'white' | 'dark'
  image: string
  customClass?: string
}>()
</script>

<template>
  <div class="block-form relative h-[677px] overflow-hidden" :class="theme === 'dark' ? 'bg-dark' : 'bg-white'">
    <div class="container flex items-center h-full">
      <div class="max-w-[800px] w-full">
        <div class="mb-8">
          <h3 class="text-55 font-bebas uppercase" :class="theme === 'dark' ? 'text-white' : 'text-dark'">{{ title }}</h3>
          <p class="text-20 font-normal leading-[175%]" :class="theme === 'dark' ? 'text-white' : 'text-dark'">{{ subtitle }}</p>
        </div>
        <FormComponent :theme="theme"/>
      </div>
      <div class="absolute -right-[8%] top-0 max-w-[658px] flex items-center justify-center w-full">
        <img src="/images/circle-decorator.png" alt="" class="w-full h-full object-contain">
      </div>
      <div class="absolute -right-[5%] top-1/2 -translate-y-1/2 max-w-[619px] flex items-center justify-center w-full" :class="customClass">
        <img :src="image" class="w-full h-full object-contain">
      </div>
    </div>

  </div>
</template>

<style scoped>

.block-form {
  background-image: url('/images/form-bg.png');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
}

.block-form.bg-dark {
  background-image: url('/images/form-dark-bg.png');
  border-radius: 0 0 0 300px;
}

</style>
