<script setup lang="ts">
import TheHeader from '@/components/shared/TheHeader.vue';
import TheFooter from '@/components/shared/TheFooter.vue';
import BreadcrumbsComponent from '@/components/ui/BreadcrumbsComponent.vue';
import { useRoute } from 'vue-router';

const route = useRoute();
</script>

<template>
  <div class="layout bg-[#EFEFEF]">
    <TheHeader/>
    <main >
      <BreadcrumbsComponent v-if="route.name !== 'main'"/>
      <slot/>
    </main>
    <TheFooter/>
  </div>
</template>

