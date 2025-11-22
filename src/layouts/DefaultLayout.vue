<script setup lang="ts">
import TheHeader from '@/components/shared/TheHeader.vue';
import TheFooter from '@/components/shared/TheFooter.vue';
import BreadcrumbsComponent from '@/components/ui/BreadcrumbsComponent.vue';
</script>

<template>
  <div class="layout bg-[#EFEFEF]">
    <TheHeader/>
    <main >
      <BreadcrumbsComponent/>
      <slot/>
    </main>
    <TheFooter/>
  </div>
</template>

<style scoped>

</style>
