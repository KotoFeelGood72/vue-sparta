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
    <div class="top bg-dark">
        <div class="container flex justify-between items-center text-white">
          <RouterLink to="/">
          <LogoIcon/>
        </RouterLink>
        <div class="flex items-center gap-2.5">
          <div><AddressIcon/></div>
          <span class="text-18 font-light">Владивосток</span>
        </div>
        <ul class="flex items-center gap-6">
          <li>
            <a href="#" class="flex items-center gap-2 bg-yellow text-dark py-2.5 px-5 rounded-full">
              <PhoneCircleIcon class="flex items-center justify-center"/>
              <span class="text-20 font-bold leading-none">+7 966 032 02 30</span>
            </a>
          </li>
          <li>
            <a href="#">
              <WhatsappIcon/>
            </a>
          </li>
        </ul>
        <ul class="flex items-center gap-20">
          <li>
            <RouterLink to="/" class="flex items-center gap-2">
              <CartIcon/>
              <span class="text-18 font-light">Корзина (10)</span>
            </RouterLink>
          </li>
          <li>
            <RouterLink to="/" class="flex items-center gap-2">
              <ProfileIcon/>
              <span class="text-18 font-light">Личный кабинет</span>
            </RouterLink>
          </li>
        </ul>
        </div>

      </div>
      <div class="bottom bg-white h-[66px]">
        <div class="container flex justify-between items-center gap-16">
          <div class="h-full flex items-center">
            <RouterLink to="/" class="flex items-center justify-center bg-yellow h-[66px] uppercase font-bold text-dark px-8">Каталоги</RouterLink>
          </div>
          <ul class="flex items-center gap-6">
            <li><RouterLink to="/">Запчасти</RouterLink></li>
            <li><RouterLink to="/">Агрегаты</RouterLink></li>
            <li><RouterLink to="/">Ремонт</RouterLink></li>
            <li><RouterLink to="/">Спецтехника</RouterLink></li>
            <li><RouterLink to="/">Экспресс-доставка</RouterLink></li>
            <li><RouterLink to="/">О компании</RouterLink></li>
            <li><RouterLink to="/">Контакты</RouterLink></li>
          </ul>
          <div class="flex items-center justify-center bg-yellow h-[66px] w-[77px]">
            <SearchIcon/>
          </div>
        </div>
      </div>
  </header>
</template>

