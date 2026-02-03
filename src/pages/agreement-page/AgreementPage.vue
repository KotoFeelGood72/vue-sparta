<script setup lang="ts">
</script>

<template>
  <div class="agreement-page">
    <div class="agreement-page__container">
      <h1 class="agreement-page__title">Пользовательское соглашение</h1>
      <p class="agreement-page__text">Содержимое страницы.</p>
    </div>
  </div>
</template>

<style scoped lang="scss">
.agreement-page {
  padding: 40px 0;

  &__container {
    max-width: 800px;
    margin: 0 auto;
    padding: 0 20px;
  }

  &__title {
    margin: 0 0 24px;
    font-size: $font-size-25;
    font-weight: 600;
    color: $color-dark;
  }

  &__text {
    margin: 0;
    font-size: $font-size-16;
    color: $color-dark;
    line-height: 1.5;
  }
}
</style>
