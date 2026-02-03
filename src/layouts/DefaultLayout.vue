<script setup lang="ts">
import { ref } from 'vue';
import TheHeader from '@/components/shared/TheHeader.vue';
import TheHeaderAdaptive from '@/components/shared/TheHeaderAdaptive.vue';
import TheFooter from '@/components/shared/TheFooter.vue';
import BurgerMenu from '@/components/shared/BurgerMenu.vue';
import ModalAuth from '@/components/modals/ModalAuth.vue';
import ModalCallback from '@/components/modals/ModalCallback.vue';
import BreadcrumbsComponent from '@/components/ui/BreadcrumbsComponent.vue';

import { useMediaStoreRefs } from '@/stores/useMediaStore';
import { useRoute } from 'vue-router';

const route = useRoute();
const { isTablet, isDesktop, isMobile } = useMediaStoreRefs();
const isBurgerOpen = ref(false);
const isAuthOpen = ref(false);
const isCallbackOpen = ref(false);
</script>

<template>
  <div class="layout">
    <TheHeader v-if="isDesktop" @auth-click="isAuthOpen = true"/>
    <TheHeaderAdaptive
      v-if="isTablet || isMobile"
      @menu-click="isBurgerOpen = true"
      @auth-click="isAuthOpen = true"
      @callback-click="isCallbackOpen = true"
    />
    <BurgerMenu
      :open="isBurgerOpen"
      @close="isBurgerOpen = false"
    />
    <ModalAuth
      :open="isAuthOpen"
      @close="isAuthOpen = false"
    />
    <ModalCallback
      :open="isCallbackOpen"
      @close="isCallbackOpen = false"
    />
    <main class="layout__main">
      <BreadcrumbsComponent v-if="route.name !== 'main' && route.name !== 'catalog'"/>
      <slot/>
    </main>
    <TheFooter @callback-click="isCallbackOpen = true"/>
  </div>
</template>

<style scoped lang="scss">
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
