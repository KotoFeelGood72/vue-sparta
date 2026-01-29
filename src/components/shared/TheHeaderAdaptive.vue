<script setup lang="ts">
import LogoIcon from '../icons/LogoIcon.vue';
import AddressIcon from '../icons/AddressIcon.vue';
import FooterPhoneIcon from '../icons/FooterPhoneIcon.vue';
import WhatsappIcon from '../icons/WhatsappIcon.vue';
import TelegramIcon from '../icons/TelegramIcon.vue';
import ProfileIcon from '../icons/ProfileIcon.vue';
import CartIcon from '../icons/CartIcon.vue';
import SearchIcon from '../icons/SearchIcon.vue';
import MenuIcon from '../icons/MenuIcon.vue';
</script>

<template>
  <header class="header-adaptive">
    <div class="header-adaptive__top">
      <div class="header-adaptive__top-inner">
        <RouterLink to="/" class="header-adaptive__logo-link">
          <LogoIcon class="header-adaptive__logo"/>
        </RouterLink>
        <div class="header-adaptive__top-right">
          <div class="header-adaptive__phone-block">
            <FooterPhoneIcon class="header-adaptive__phone-icon"/>
            <span class="header-adaptive__phone-text">+7 966 032 02 30</span>
            <div class="header-adaptive__socials">
              <a href="#" class="header-adaptive__social-link">
                <WhatsappIcon/>
              </a>
              <a href="#" class="header-adaptive__social-link">
                <TelegramIcon/>
              </a>
            </div>
          </div>
          <button type="button" class="header-adaptive__search-button">
            <SearchIcon/>
          </button>
        </div>
      </div>
    </div>
    <div class="header-adaptive__bottom">
      <div class="header-adaptive__bottom-inner">
        <div class="header-adaptive__location">
          <AddressIcon class="header-adaptive__location-icon"/>
          <span class="header-adaptive__location-text">Владивосток</span>
        </div>
        <div class="header-adaptive__actions">
          <RouterLink to="/" class="header-adaptive__cart-link">
            <CartIcon class="header-adaptive__cart-icon"/>
            <span class="header-adaptive__cart-count">(10)</span>
          </RouterLink>
          <RouterLink to="/" class="header-adaptive__profile-link">
            <ProfileIcon class="header-adaptive__profile-icon"/>
            <span class="header-adaptive__profile-text">Войти</span>
          </RouterLink>
        </div>
        <button type="button" class="header-adaptive__menu-button">
          <MenuIcon/>
        </button>
      </div>
    </div>
  </header>
</template>

<style scoped lang="scss">
@import '@/styles/variables';

.header-adaptive {
  &__top {
    background-color: $color-dark;
    padding: 14px 0;
    color: $color-white;
  }

  &__bottom {
    background-color: $color-white;
    height: 66px;
    display: flex;
    align-items: center;
  }

  &__top-inner,
  &__bottom-inner {
    max-width: 1187px;
    margin: 0 auto;
    padding: 0 16px;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  &__logo-link {
    display: inline-flex;
  }

  &__logo {
    width: 70px;
    display: block;
  }

  &__top-right {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  &__phone-block {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  &__phone-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 4px;
  }

  &__phone-text {
    font-size: $font-size-18;
    line-height: $line-height-18;
    font-weight: 300;
  }

  &__socials {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-left: 10px;
  }

  &__social-link {
    display: inline-flex;
    align-items: center;
    justify-content: center;
  }

  &__search-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: transparent;
    border: none;
    cursor: pointer;
  }

  &__location {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  &__location-icon {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  &__location-text {
    font-size: $font-size-18;
    line-height: $line-height-18;
    font-weight: 300;
    color: $color-dark;
  }

  &__actions {
    display: flex;
    align-items: center;
    gap: 24px;
  }

  &__cart-link,
  &__profile-link {
    display: flex;
    align-items: center;
    gap: 8px;
    text-decoration: none;
  }

  &__cart-count,
  &__profile-text {
    font-size: $font-size-18;
    line-height: $line-height-18;
    font-weight: 300;
    color: $color-dark;
  }

  &__menu-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: transparent;
    border: none;
    cursor: pointer;
  }
}
</style>
