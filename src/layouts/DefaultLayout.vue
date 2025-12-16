<script setup lang="ts">
import TheHeader from '@/components/shared/TheHeader.vue';
import TheHeaderMobile from '@/components/shared/TheHeaderMobile.vue';
import TheFooter from '@/components/shared/TheFooter.vue';
import BreadcrumbsComponent from '@/components/ui/BreadcrumbsComponent.vue';

import { useMediaStoreRefs } from '@/stores/useMediaStore';
import { useRoute } from 'vue-router';

const route = useRoute();
const { isTablet, isDesktop, isMobile } = useMediaStoreRefs()
</script>

<template>
  <div class="layout bg-[#EFEFEF]">
    <TheHeader v-if="isDesktop"/>
    <TheHeaderMobile v-if="isTablet || isMobile"/>
    <main >
      <BreadcrumbsComponent v-if="route.name !== 'main' && route.name !== 'catalog'"/>
      <slot/>
    </main>
    <TheFooter/>
  </div>
</template>

