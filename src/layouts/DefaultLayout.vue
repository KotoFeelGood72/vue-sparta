<script setup lang="ts">
import { ref, provide } from 'vue';
import TheHeader from '@/components/shared/TheHeader.vue';
import TheHeaderAdaptive from '@/components/shared/TheHeaderAdaptive.vue';
import TheFooter from '@/components/shared/TheFooter.vue';
import BurgerMenu from '@/components/shared/BurgerMenu.vue';
import ModalAuth from '@/components/modals/ModalAuth.vue';
import ModalCallback from '@/components/modals/ModalCallback.vue';
import ModalOrder from '@/components/modals/ModalOrder.vue';
import ModalSearch from '@/components/modals/ModalSearch.vue';
import BreadcrumbsComponent from '@/components/ui/BreadcrumbsComponent.vue';

import { useMediaStoreRefs } from '@/stores/useMediaStore';
import { useRoute } from 'vue-router';

const route = useRoute();
const { isTablet, isDesktop, isMobile } = useMediaStoreRefs();
const isBurgerOpen = ref(false);
const isAuthOpen = ref(false);
const isCallbackOpen = ref(false);
const isOrderOpen = ref(false);
const isSearchOpen = ref(false);

type OrderProductPayload = {
  image?: string;
  title?: string;
  subtitle?: string;
};

const orderProduct = ref<OrderProductPayload | null>(null);

provide<(payload?: OrderProductPayload) => void>('openOrderModal', (payload) => {
  orderProduct.value = payload ?? null;
  isOrderOpen.value = true;
});
</script>

<template>
  <div class="layout">
    <TheHeader
      v-if="isDesktop"
      @auth-click="isAuthOpen = true"
      @search-click="isSearchOpen = true"
    />
    <TheHeaderAdaptive
      v-if="isTablet || isMobile"
      @menu-click="isBurgerOpen = true"
      @auth-click="isAuthOpen = true"
      @callback-click="isCallbackOpen = true"
      @search-click="isSearchOpen = true"
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
    <ModalOrder
      :open="isOrderOpen"
      :product-image="orderProduct?.image"
      :product-title="orderProduct?.title"
      :product-subtitle="orderProduct?.subtitle"
      @close="isOrderOpen = false"
    />
    <ModalSearch
      :open="isSearchOpen"
      @close="isSearchOpen = false"
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
