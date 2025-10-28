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
  <header>
    <div class="top">
        <div class="container">
          <RouterLink to="/">
          <LogoIcon/>
        </RouterLink>
        <div>
          <div><AddressIcon/></div>
          <span>Владивосток</span>
        </div>
        <ul>
          <li>
            <a href="#">
              <PhoneCircleIcon/>
              <span>+7 966 032 02 30</span>
            </a>
          </li>
          <li>
            <a href="#">
              <WhatsappIcon/>
            </a>
          </li>
        </ul>
        <ul>
          <li>
            <RouterLink to="/">
              <CartIcon/>
              <span>Корзина (10)</span>
            </RouterLink>
          </li>
          <li>
            <RouterLink to="/">
              <ProfileIcon/>
              <span>Личный кабинет</span>
            </RouterLink>
          </li>
        </ul>
        </div>

      </div>
      <div class="bottom">
        <div class="container">
          <div>
            <RouterLink to="/">Каталоги</RouterLink>
          </div>
          <ul>
            <li><RouterLink to="/">Запчасти</RouterLink></li>
            <li><RouterLink to="/">Агрегаты</RouterLink></li>
            <li><RouterLink to="/">Ремонт</RouterLink></li>
            <li><RouterLink to="/">Спецтехника</RouterLink></li>
            <li><RouterLink to="/">Экспресс-доставка</RouterLink></li>
            <li><RouterLink to="/">О компании</RouterLink></li>
            <li><RouterLink to="/">Контакты</RouterLink></li>
          </ul>
          <div>
            <SearchIcon/>
          </div>
        </div>
      </div>
  </header>
</template>

