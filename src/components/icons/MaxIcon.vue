<script setup lang="ts"></script>

<template>
  <img src="/images/max.png" alt="Max" class="max-icon" />
</template>

<style scoped lang="scss">
.max-icon {
  width: 26px;
  height: 26px;

  @include bp($point_4) {
    width: 16px;
    height: 16px;
  }
}
</style>
