<script setup lang="ts">
import LogoIcon from '../icons/LogoIcon.vue';
import FooterPhoneIcon from '../icons/FooterPhoneIcon.vue';
import TelegramIcon from '../icons/TelegramIcon.vue';
import WhatsappIcon from '../icons/WhatsappIcon.vue';
import MarkerIcon from '../icons/MarkerIcon.vue';
import EnvelopeIcon from '../icons/EnvelopeIcon.vue';
</script>

<template>
  <footer class="footer">
    <div class="container">
      <div>
        <RouterLink to="/"><LogoIcon/></RouterLink>
        <span>ООО “Спарт”</span>
      </div>
      <div>
        <ul>
          <li><RouterLink to="/">Каталоги</RouterLink></li>
          <li><RouterLink to="/">Запчасти</RouterLink></li>
          <li><RouterLink to="/">Агрегаты</RouterLink></li>
          <li><RouterLink to="/">Ремонт</RouterLink></li>
          <li><RouterLink to="/">Спецтехника</RouterLink></li>
        </ul>
        <ul>
          <li><RouterLink to="/">Марки машин</RouterLink></li>
          <li><RouterLink to="/">Экспресс-доставка</RouterLink></li>
          <li><RouterLink to="/">О компании</RouterLink></li>
          <li><RouterLink to="/">Контакты</RouterLink></li>
        </ul>
      </div>
      <div>
        <div>
          <div>
            <a href="#">
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
          <p>Заказать звонок</p>
        </div>
        <a href="#">
          <EnvelopeIcon/>
          <span>info@spart.pro</span>
        </a>
        <div>
          <MarkerIcon/>
          <span>Приморский край, г.  Владивосток,  ул. Снеговая, д. 64</span>
        </div>
      </div>
    </div>
    <div>© ООО Спарт.  Все права защищены. 2025</div>
  </footer>
</template>
