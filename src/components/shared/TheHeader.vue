<script setup lang="ts">
import LogoIcon from '../icons/LogoIcon.vue';
import AddressIcon from '../icons/AddressIcon.vue';
import PhoneCircleIcon from '../icons/PhoneCircleIcon.vue';
import WhatsappIcon from '../icons/WhatsappIcon.vue';
import ProfileIcon from '../icons/ProfileIcon.vue';
import CartIcon from '../icons/CartIcon.vue';
import SearchIcon from '../icons/SearchIcon.vue';
</script>

<template>
  <header class="header">
    <div class="header__top">
      <div class="header__top-inner">
        <RouterLink to="/" class="header__logo-link">
          <LogoIcon class="header__logo"/>
        </RouterLink>
        <div class="header__location">
          <AddressIcon class="header__location-icon"/>
          <span class="header__location-text">Владивосток</span>
        </div>
        <ul class="header__phone-list">
          <li class="header__phone-item">
            <a href="#" class="header__phone-link">
              <PhoneCircleIcon class="header__phone-icon"/>
              <span class="header__phone-text">+7 966 032 02 30</span>
            </a>
          </li>
          <li class="header__phone-item">
            <a href="#" class="header__social-link">
              <WhatsappIcon/>
            </a>
          </li>
        </ul>
        <ul class="header__actions-list">
          <li class="header__actions-item">
            <RouterLink to="/" class="header__cart-link">
              <CartIcon class="header__cart-icon"/>
              <span class="header__cart-text">Корзина (10)</span>
            </RouterLink>
          </li>
          <li class="header__actions-item">
            <RouterLink to="/" class="header__profile-link">
              <ProfileIcon class="header__profile-icon"/>
              <span class="header__profile-text">Личный кабинет</span>
            </RouterLink>
          </li>
        </ul>
      </div>
    </div>
    <div class="header__bottom">
      <div class="header__bottom-inner">
        <div class="header__catalog-button-wrapper">
          <RouterLink to="/" class="header__catalog-button">Каталоги</RouterLink>
        </div>
        <ul class="header__nav-list">
          <li class="header__nav-item"><RouterLink to="/" class="header__nav-link">Запчасти</RouterLink></li>
          <li class="header__nav-item"><RouterLink to="/" class="header__nav-link">Агрегаты</RouterLink></li>
          <li class="header__nav-item"><RouterLink to="/" class="header__nav-link">Ремонт</RouterLink></li>
          <li class="header__nav-item"><RouterLink to="/" class="header__nav-link">Спецтехника</RouterLink></li>
          <li class="header__nav-item"><RouterLink to="/" class="header__nav-link">Экспресс-доставка</RouterLink></li>
          <li class="header__nav-item"><RouterLink to="/" class="header__nav-link">О компании</RouterLink></li>
          <li class="header__nav-item"><RouterLink to="/" class="header__nav-link">Контакты</RouterLink></li>
        </ul>
        <div class="header__search-button">
          <SearchIcon/>
        </div>
      </div>
    </div>
  </header>
</template>

<style scoped lang="scss">
// @use '@/styles/variables' as *;

.header {
  &__top {
    background-color: $color-dark;
    padding: 14px 0;
    color: $color-white;
  }

  &__bottom {
    background-color: $color-white;
    height: 66px;
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

  &__top-inner {
    gap: 20px;
  }

  &__bottom-inner {
    gap: 64px;
  }

  &__logo-link {
    display: inline-flex;
  }

  &__logo {
    display: block;
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
  }

  &__phone-list {
    display: flex;
    align-items: center;
    gap: 24px;
    list-style: none;
    padding: 0;
    margin: 0;
  }

  &__phone-item {
    margin: 0;
  }

  &__phone-link {
    display: flex;
    align-items: center;
    gap: 8px;
    background-color: $color-yellow;
    color: $color-dark;
    padding: 10px 20px;
    border-radius: 9999px;
    text-decoration: none;
  }

  &__phone-icon {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  &__phone-text {
    font-size: $font-size-20;
    line-height: $line-height-20;
    font-weight: 700;
    line-height: 1;
  }

  &__social-link {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: opacity 0.2s;

    &:hover {
      opacity: 0.8;
    }
  }

  &__actions-list {
    display: flex;
    align-items: center;
    gap: 80px;
    list-style: none;
    padding: 0;
    margin: 0;
  }

  &__actions-item {
    margin: 0;
  }

  &__cart-link,
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

  &__cart-icon,
  &__profile-icon {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  &__cart-text,
  &__profile-text {
    font-size: $font-size-18;
    line-height: $line-height-18;
    font-weight: 300;
    color: $color-white;
  }

  &__catalog-button-wrapper {
    height: 100%;
    display: flex;
    align-items: center;
  }

  &__catalog-button {
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: $color-yellow;
    height: 66px;
    text-transform: uppercase;
    font-weight: 700;
    color: $color-dark;
    padding: 0 32px;
    text-decoration: none;
    transition: opacity 0.2s;

    &:hover {
      opacity: 0.9;
    }
  }

  &__nav-list {
    display: flex;
    align-items: center;
    gap: 24px;
    list-style: none;
    padding: 0;
    margin: 0;
  }

  &__nav-item {
    margin: 0;
  }

  &__nav-link {
    color: $color-dark;
    text-decoration: none;
    transition: color 0.2s;

    &:hover {
      color: $color-yellow;
    }
  }

  &__search-button {
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: $color-yellow;
    height: 66px;
    width: 77px;
  }
}
</style>

