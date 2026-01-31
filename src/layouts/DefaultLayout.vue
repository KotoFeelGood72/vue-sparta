<script setup lang="ts">
import TheHeader from '@/components/shared/TheHeader.vue';
import TheHeaderAdaptive from '@/components/shared/TheHeaderAdaptive.vue';
import TheFooter from '@/components/shared/TheFooter.vue';
import BreadcrumbsComponent from '@/components/ui/BreadcrumbsComponent.vue';

import { useMediaStoreRefs } from '@/stores/useMediaStore';
import { useRoute } from 'vue-router';

const route = useRoute();
const { isTablet, isDesktop, isMobile } = useMediaStoreRefs()
</script>

<template>
  <div class="layout">
    <TheHeader v-if="isDesktop"/>
    <TheHeaderAdaptive v-if="isTablet || isMobile"/>
    <main class="layout__main">
      <BreadcrumbsComponent v-if="route.name !== 'main' && route.name !== 'catalog'"/>
      <slot/>
    </main>
    <TheFooter/>
  </div>
</template>

<style scoped lang="scss">
// @use '@/styles/variables' as *;

.layout {
  background-color: $color-page-bg;
  min-height: 100vh;
  display: flex;
  flex-direction: column;

  &__main {
    flex: 1;
  }
}
</style>