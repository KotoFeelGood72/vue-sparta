<script setup lang="ts">
import TheHeader from '@/components/shared/TheHeader.vue';
import TheFooter from '@/components/shared/TheFooter.vue';
</script>

<template>
  <div class="layout">
    <TheHeader/>
    <main><slot/></main>
    <TheFooter/>
  </div>
</template>

<style scoped>

</style>
