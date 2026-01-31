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
  <header class="header-mobile">
    <!-- Верхняя секция (темно-серая) -->
    <div class="header-mobile__top">
      <div class="header-mobile__top-inner">
        <!-- Логотип слева -->
        <RouterLink to="/" class="header-mobile__logo-link">
          <LogoIcon class="header-mobile__logo"/>
        </RouterLink>

        <!-- Центр: телефон и ссылка -->
        <div class="header-mobile__center">
          <div class="header-mobile__phone-block">
            <FooterPhoneIcon class="header-mobile__phone-icon"/>
            <a :href="`tel:${props.phone.replace(/\s/g, '')}`" class="header-mobile__phone-link">
              {{ props.phone }}
            </a>
            <div class="header-mobile__socials">
              <button
                @click="handleWhatsApp"
                class="header-mobile__social-button"
                aria-label="WhatsApp"
              >
                <WhatsappIcon />
              </button>
              <button
                @click="handleTelegram"
                class="header-mobile__social-button"
                aria-label="Telegram"
              >
                <TelegramIcon />
              </button>
            </div>
          </div>
          <button
            @click="emit('callBackClick')"
            class="header-mobile__callback-button"
          >
            Заказать звонок
          </button>
        </div>

        <!-- Справа: поиск -->
        <div class="header-mobile__right">
          <button
            @click="emit('searchClick')"
            class="header-mobile__search-button"
            aria-label="Поиск"
          >
            <MobileSearch />
          </button>
        </div>
      </div>
    </div>

    <!-- Нижняя секция (белая) -->
    <div class="header-mobile__bottom">
      <div class="header-mobile__bottom-inner">
        <!-- Слева: местоположение -->
        <div class="header-mobile__location">
          <AddressIcon class="header-mobile__location-icon"/>
          <span class="header-mobile__location-text">{{ props.address }}</span>
        </div>

        <!-- Центр: корзина -->
        <RouterLink
          :to="props.cartLink"
          @click="emit('cartClick')"
          class="header-mobile__cart-link"
        >
          <CartIcon class="header-mobile__cart-icon"/>
          <span v-if="displayCartCount" class="header-mobile__cart-count">{{ displayCartCount }}</span>
        </RouterLink>

        <!-- Справа: профиль и меню -->
        <div class="header-mobile__actions">
          <RouterLink
            :to="props.profileLink"
            @click="emit('profileClick')"
            class="header-mobile__profile-link"
          >
            <ProfileIcon class="header-mobile__profile-icon"/>
            <span class="header-mobile__profile-text">{{ profileText }}</span>
          </RouterLink>
          <button
            @click="emit('menuClick')"
            class="header-mobile__menu-button"
            aria-label="Меню"
          >
            <MenuIcon />
          </button>
        </div>
      </div>
    </div>
  </header>
</template>

<style scoped lang="scss">
// @use '@/styles/variables' as *;

.header-mobile {
  &__top {
    background-color: $color-dark;
    padding: 12px 0;
    min-height: 60px;
  }

  &__bottom {
    background-color: $color-white;
    padding: 12px 0;
    min-height: 50px;
  }

  &__top-inner,
  &__bottom-inner {
    max-width: 1187px;
    margin: 0 auto;
    padding: 0 16px;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  &__logo-link {
    flex-shrink: 0;
    width: 70px;
    display: inline-block;
  }

  &__logo {
    display: block;
    width: 100%;
  }

  &__center {
    display: flex;
    flex-direction: column;
    align-items: center;
    flex: 1;
  }

  &__phone-block {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 4px;
  }

  &__phone-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 14px;
    height: 14px;
  }

  &__phone-link {
    color: $color-white;
    font-size: $font-size-14;
    line-height: $line-height-14;
    font-weight: 600;
    text-decoration: none;
    transition: color 0.2s;

    &:hover {
      color: $color-yellow;
    }
  }

  &__socials {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-left: 8px;
  }

  &__social-button {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 16px;
    height: 16px;
    background: transparent;
    border: none;
    cursor: pointer;
    transition: opacity 0.2s;

    &:hover {
      opacity: 0.8;
    }
  }

  &__callback-button {
    color: $color-yellow;
    font-size: $font-size-12;
    line-height: $line-height-12;
    text-decoration: underline;
    background: transparent;
    border: none;
    cursor: pointer;
    transition: all 0.2s;

    &:hover {
      text-decoration: none;
    }
  }

  &__right {
    display: flex;
    align-items: center;
    gap: 10px;
    flex-shrink: 0;
  }

  &__search-button {
    display: flex;
    align-items: center;
    justify-content: center;
    background: transparent;
    border: none;
    cursor: pointer;
    transition: opacity 0.2s;

    &:hover {
      opacity: 0.8;
    }
  }

  &__location {
    display: flex;
    align-items: center;
    gap: 8px;
  }

  &__location-icon {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  &__location-text {
    color: $color-gray;
    font-size: $font-size-14;
    line-height: $line-height-14;
    font-weight: 300;
  }

  &__cart-link {
    display: flex;
    align-items: center;
    gap: 8px;
    text-decoration: none;
    transition: opacity 0.2s;

    &:hover {
      opacity: 0.8;
    }
  }

  &__cart-icon {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  &__cart-count {
    color: $color-gray;
    font-size: $font-size-14;
    line-height: $line-height-14;
    font-weight: 700;
  }

  &__actions {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  &__profile-link {
    display: flex;
    align-items: center;
    gap: 8px;
    text-decoration: none;
    transition: opacity 0.2s;

    &:hover {
      opacity: 0.8;
    }
  }

  &__profile-icon {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  &__profile-text {
    color: $color-gray;
    font-size: $font-size-14;
    line-height: $line-height-14;
    font-weight: 300;
  }

  &__menu-button {
    display: flex;
    align-items: center;
    justify-content: center;
    background: transparent;
    border: none;
    cursor: pointer;
    transition: opacity 0.2s;

    &:hover {
      opacity: 0.8;
    }
  }
}
</style>
