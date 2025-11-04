<script setup lang="ts">
import LogoIcon from '../icons/LogoIcon.vue';
import FooterPhoneIcon from '../icons/FooterPhoneIcon.vue';
import TelegramIcon from '../icons/TelegramIcon.vue';
import WhatsappIcon from '../icons/WhatsappIcon.vue';
import MarkerIcon from '../icons/MarkerIcon.vue';
import EnvelopeIcon from '../icons/EnvelopeIcon.vue';
</script>

<template>
  <footer class="footer text-white pt-32 pb-20" >
    <div class="container flex justify-between gap-36 mb-16">
      <div class="flex items-start flex-col gap-2.5">
        <RouterLink to="/" ><LogoIcon/></RouterLink>
        <span class="text-18 font-light">ООО “Спарт”</span>
      </div>
      <div class="flex gap-36 text-16 font-light">
        <ul class="flex flex-col gap-2.5">
          <li><RouterLink to="/">Каталоги</RouterLink></li>
          <li><RouterLink to="/">Запчасти</RouterLink></li>
          <li><RouterLink to="/">Агрегаты</RouterLink></li>
          <li><RouterLink to="/">Ремонт</RouterLink></li>
          <li><RouterLink to="/">Спецтехника</RouterLink></li>
        </ul>
        <ul class="flex flex-col gap-2.5">
          <li><RouterLink to="/">Марки машин</RouterLink></li>
          <li><RouterLink to="/">Экспресс-доставка</RouterLink></li>
          <li><RouterLink to="/">О компании</RouterLink></li>
          <li><RouterLink to="/">Контакты</RouterLink></li>
        </ul>
      </div>
      <div class="max-w-[292px] text-right">
        <div class="flex flex-col items-end gap-2.5">
          <div class="flex items-center gap-4">
            <a href="#" class="flex items-center gap-2.5 text-20 font-bold leading-none">
              <FooterPhoneIcon/>
              <span>+7 966 032 02 30</span>
            </a>
            <a href="#">
              <WhatsappIcon/>
            </a>
            <a href="#">
              <TelegramIcon/>
            </a>
          </div>
          <p class="text-14 font-bold text-yellow underline cursor-pointer">Заказать звонок</p>
        </div>
        <a href="#" class="flex items-center justify-end gap-2.5 my-8">
          <EnvelopeIcon/>
          <span>info@spart.pro</span>
        </a>
        <div class="flex gap-2.5 justify-end">
          <MarkerIcon class="mt-1"/>
          <span class="max-w-[259px] flex">Приморский край, г.  Владивосток,  ул. Снеговая, д. 64</span>
        </div>
      </div>
    </div>
    <div class="text-center text-16 font-light">© ООО Спарт.  Все права защищены. 2025</div>
  </footer>
</template>


<style scoped>
.footer {
  background-image: url('/images/footer.jpg');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
}
</style>
