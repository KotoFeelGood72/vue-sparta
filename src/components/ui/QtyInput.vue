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
  <div class="qty-input">
    <button
      @click="decrement()"
      class="qty-input__button qty-input__button--decrement"
    >
      <span class="qty-input__button-text">−</span>
    </button>
    <div class="qty-input__value">
      <span class="qty-input__value-text">{{ model }}</span>
    </div>
    <button
      @click="increment()"
      class="qty-input__button qty-input__button--increment"
    >
      <span class="qty-input__button-text">+</span>
    </button>
  </div>
</template>

<style scoped lang="scss">
// @use '@/styles/variables' as *;

.qty-input {
  display: flex;
  align-items: center;
  background-color: $color-white;
  border-radius: 5px;
  height: 47px;
  width: 142px;

  &__button {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 43px;
    height: 47px;
    background-color: $color-yellow;
    border-radius: 5px;
    border: none;
    cursor: pointer;
    transition: opacity 0.2s;

    &:hover {
      opacity: 0.9;
    }
  }

  &__button-text {
    font-size: $font-size-20;
    line-height: $line-height-20;
    font-weight: 700;
    color: $color-black;
    line-height: 1;
  }

  &__value {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: $color-white;
  }

  &__value-text {
    font-size: $font-size-20;
    line-height: $line-height-20;
    font-weight: 700;
    color: $color-dark;
  }
}
</style>
