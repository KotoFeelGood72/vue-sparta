<script setup lang="ts">

const model = defineModel<number>('modelValue', { required: true });


const decrement = () => {
  if (model.value > 1) {
    model.value--;
  }
};

const increment = () => {
  model.value++;
};
</script>

<template>
 <div class="flex items-center bg-white rounded-[5px] h-[47px] w-[142px]">
        <button
          @click="decrement()"
          class="flex items-center justify-center w-[43px] h-[47px] bg-yellow rounded-[5px] text-20 font-bold text-black hover:opacity-90 transition-opacity"
        >
          <span class="leading-none">−</span>
        </button>
        <div class="flex-1 flex items-center justify-center bg-white">
          <span class="text-20 font-bold text-[#3d3137]">{{ model }}</span>
        </div>
        <button
          @click="increment()"
          class="flex items-center justify-center w-[43px] h-[47px] bg-yellow rounded-[5px] text-20 font-bold text-black hover:opacity-90 transition-opacity"
        >
          <span class="leading-none">+</span>
        </button>
      </div>
</template>

<style scoped>

</style>
