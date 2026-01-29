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
    <div class="footer__inner">
      <div class="footer__logo-block">
        <RouterLink to="/" class="footer__logo-link">
          <LogoIcon/>
        </RouterLink>
        <span class="footer__company-name">ООО "Спарт"</span>
      </div>
      <div class="footer__nav">
        <ul class="footer__nav-list">
          <li class="footer__nav-item"><RouterLink to="/" class="footer__nav-link">Каталоги</RouterLink></li>
          <li class="footer__nav-item"><RouterLink to="/" class="footer__nav-link">Запчасти</RouterLink></li>
          <li class="footer__nav-item"><RouterLink to="/" class="footer__nav-link">Агрегаты</RouterLink></li>
          <li class="footer__nav-item"><RouterLink to="/" class="footer__nav-link">Ремонт</RouterLink></li>
          <li class="footer__nav-item"><RouterLink to="/" class="footer__nav-link">Спецтехника</RouterLink></li>
        </ul>
        <ul class="footer__nav-list">
          <li class="footer__nav-item"><RouterLink to="/" class="footer__nav-link">Марки машин</RouterLink></li>
          <li class="footer__nav-item"><RouterLink to="/" class="footer__nav-link">Экспресс-доставка</RouterLink></li>
          <li class="footer__nav-item"><RouterLink to="/" class="footer__nav-link">О компании</RouterLink></li>
          <li class="footer__nav-item"><RouterLink to="/" class="footer__nav-link">Контакты</RouterLink></li>
        </ul>
      </div>
      <div class="footer__contacts">
        <div class="footer__contacts-block">
          <div class="footer__phone-block">
            <a href="#" class="footer__phone-link">
              <FooterPhoneIcon class="footer__phone-icon"/>
              <span>+7 966 032 02 30</span>
            </a>
            <a href="#" class="footer__social-link">
              <WhatsappIcon/>
            </a>
            <a href="#" class="footer__social-link">
              <TelegramIcon/>
            </a>
          </div>
          <p class="footer__callback-link">Заказать звонок</p>
        </div>
        <a href="#" class="footer__email-link">
          <EnvelopeIcon class="footer__email-icon"/>
          <span>info@spart.pro</span>
        </a>
        <div class="footer__address-block">
          <MarkerIcon class="footer__address-icon"/>
          <span class="footer__address-text">Приморский край, г.  Владивосток,  ул. Снеговая, д. 64</span>
        </div>
      </div>
    </div>
    <div class="footer__copyright">© ООО Спарт.  Все права защищены. 2025</div>
  </footer>
</template>

<style scoped lang="scss">
@import '@/styles/variables';

.footer {
  background-image: url('/images/footer.jpg');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  color: $color-white;
  padding-top: 128px;
  padding-bottom: 80px;

  &__inner {
    max-width: 1187px;
    margin: 0 auto;
    padding: 0 16px;
    display: flex;
    justify-content: space-between;
    gap: 144px;
    margin-bottom: 64px;
  }

  &__logo-block {
    display: flex;
    align-items: flex-start;
    flex-direction: column;
    gap: 10px;
  }

  &__logo-link {
    display: inline-block;
  }

  &__company-name {
    font-size: $font-size-18;
    line-height: $line-height-18;
    font-weight: 300;
  }

  &__nav {
    display: flex;
    gap: 144px;
    font-size: $font-size-16;
    line-height: $line-height-16;
    font-weight: 300;
  }

  &__nav-list {
    display: flex;
    flex-direction: column;
    gap: 10px;
    list-style: none;
    padding: 0;
    margin: 0;
  }

  &__nav-item {
    margin: 0;
  }

  &__nav-link {
    color: $color-white;
    text-decoration: none;
    transition: opacity 0.2s;

    &:hover {
      opacity: 0.8;
    }
  }

  &__contacts {
    max-width: 292px;
    text-align: right;
  }

  &__contacts-block {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    gap: 10px;
    margin-bottom: 32px;
  }

  &__phone-block {
    display: flex;
    align-items: center;
    gap: 16px;
  }

  &__phone-link {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: $font-size-20;
    line-height: $line-height-20;
    font-weight: 700;
    line-height: 1;
    color: $color-white;
    text-decoration: none;
  }

  &__phone-icon {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  &__social-link {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: opacity 0.2s;

    &:hover {
      opacity: 0.8;
    }
  }

  &__callback-link {
    font-size: $font-size-14;
    line-height: $line-height-14;
    font-weight: 700;
    color: $color-yellow;
    text-decoration: underline;
    cursor: pointer;
    transition: opacity 0.2s;

    &:hover {
      opacity: 0.8;
    }
  }

  &__email-link {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 10px;
    margin-bottom: 32px;
    color: $color-white;
    text-decoration: none;
    transition: opacity 0.2s;

    &:hover {
      opacity: 0.8;
    }
  }

  &__email-icon {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  &__address-block {
    display: flex;
    gap: 10px;
    justify-content: flex-end;
  }

  &__address-icon {
    margin-top: 4px;
    flex-shrink: 0;
  }

  &__address-text {
    max-width: 259px;
    display: flex;
  }

  &__copyright {
    text-align: center;
    font-size: $font-size-16;
    line-height: $line-height-16;
    font-weight: 300;
  }
}
</style>
