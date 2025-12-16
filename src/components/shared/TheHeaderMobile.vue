<script setup lang="ts">
import { RouterLink } from 'vue-router';
import { computed } from 'vue';
import LogoIcon from '../icons/LogoIcon.vue';
import AddressIcon from '../icons/AddressIcon.vue';
import FooterPhoneIcon from '../icons/FooterPhoneIcon.vue';
import WhatsappIcon from '../icons/WhatsappIcon.vue';
import TelegramIcon from '../icons/TelegramIcon.vue';
import ProfileIcon from '../icons/ProfileIcon.vue';
import CartIcon from '../icons/CartIcon.vue';
import MobileSearch from '../icons/MobileSearch.vue';
import MenuIcon from '../icons/MenuIcon.vue';

export interface TheHeaderMobileProps {
  phone?: string;
  address?: string;
  cartCount?: number;
  isAuthenticated?: boolean;
  userName?: string;
  whatsappLink?: string;
  telegramLink?: string;
  profileLink?: string;
  cartLink?: string;
  callBackLink?: string;
}

const props = withDefaults(defineProps<TheHeaderMobileProps>(), {
  phone: '+7 966 032 02 30',
  address: 'Владивосток',
  cartCount: 0,
  isAuthenticated: false,
  userName: '',
  whatsappLink: '#',
  telegramLink: '#',
  profileLink: '/profile',
  cartLink: '/cart',
  callBackLink: '#',
});

const emit = defineEmits<{
  menuClick: [];
  searchClick: [];
  callBackClick: [];
  profileClick: [];
  cartClick: [];
}>();

const displayCartCount = computed(() => {
  return props.cartCount > 0 ? `(${props.cartCount})` : '';
});

const profileText = computed(() => {
  return props.isAuthenticated && props.userName ? props.userName : 'Войти';
});

const handleWhatsApp = () => {
  if (props.whatsappLink && props.whatsappLink !== '#') {
    window.open(props.whatsappLink, '_blank');
  }
};

const handleTelegram = () => {
  if (props.telegramLink && props.telegramLink !== '#') {
    window.open(props.telegramLink, '_blank');
  }
};
</script>

<template>
  <header>
    <!-- Верхняя секция (темно-серая) -->
    <div class="top bg-dark py-3">
      <div class="container flex justify-between items-center">
        <!-- Логотип слева -->
        <RouterLink to="/" class="flex-shrink-0 w-[70px]">
          <LogoIcon />
        </RouterLink>

        <!-- Центр: телефон и ссылка -->
        <div class="flex flex-col items-center flex-1">
          <div class="flex items-center gap-2">
            <FooterPhoneIcon class="flex items-center justify-center w-3.5 h-3.5"/>
            <a :href="`tel:${props.phone.replace(/\s/g, '')}`" class="text-white text-14 font-semibold hover:text-yellow transition-colors">
              {{ props.phone }}
            </a>

          <div class="flex items-center gap-2">
            <button
            @click="handleWhatsApp"
            class="flex items-center justify-center hover:opacity-80 transition-opacity w-4 h-4"
            aria-label="WhatsApp"
          >
            <WhatsappIcon />
          </button>
          <button
            @click="handleTelegram"
            class="flex items-center justify-center hover:opacity-80 transition-opacity w-4 h-4"
            aria-label="Telegram"
          >
            <TelegramIcon />
          </button>
          </div>
          </div>
          <button
            @click="emit('callBackClick')"
            class="text-yellow text-12 underline hover:no-underline transition-all"
          >
            Заказать звонок
          </button>
        </div>

        <!-- Справа: соцсети и поиск -->
        <div class="flex items-center gap-2.5 flex-shrink-0">
          <button
            @click="emit('searchClick')"
            class="flex items-center justify-center hover:opacity-80 transition-opacity"
            aria-label="Поиск"
          >
            <MobileSearch />
          </button>
        </div>
      </div>
    </div>

    <!-- Нижняя секция (белая) -->
    <div class="bottom bg-white py-3">
      <div class="container flex justify-between items-center">
        <!-- Слева: местоположение -->
        <div class="flex items-center gap-2">
          <AddressIcon />
          <span class="text-gray text-14 font-light">{{ props.address }}</span>
        </div>

        <!-- Центр: корзина -->
        <RouterLink
          :to="props.cartLink"
          @click="emit('cartClick')"
          class="flex items-center gap-2 hover:opacity-80 transition-opacity"
        >
          <CartIcon />
          <span v-if="displayCartCount" class="text-gray text-14 font-bold">{{ displayCartCount }}</span>
        </RouterLink>

        <!-- Справа: профиль и меню -->
        <div class="flex items-center gap-2.5">
          <RouterLink
            :to="props.profileLink"
            @click="emit('profileClick')"
            class="flex items-center gap-2 hover:opacity-80 transition-opacity"
          >
            <ProfileIcon />
            <span class="text-gray text-14 font-light">{{ profileText }}</span>
          </RouterLink>
          <button
            @click="emit('menuClick')"
            class="flex items-center justify-center hover:opacity-80 transition-opacity"
            aria-label="Меню"
          >
            <MenuIcon />
          </button>
        </div>
      </div>
    </div>
  </header>
</template>

<style scoped>
.top {
  min-height: 60px;
}

.bottom {
  min-height: 50px;
}
</style>
