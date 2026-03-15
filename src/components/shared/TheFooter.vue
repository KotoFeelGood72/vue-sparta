<script setup lang="ts">
import LogoIcon from '../icons/LogoIcon.vue'
import FooterPhoneIcon from '../icons/FooterPhoneIcon.vue'
import TelegramIcon from '../icons/TelegramIcon.vue'
import WhatsappIcon from '../icons/WhatsappIcon.vue'
import MarkerIcon from '../icons/MarkerIcon.vue'
import EnvelopeIcon from '../icons/EnvelopeIcon.vue'
import { useRoute } from 'vue-router'
import { computed } from 'vue'
import MaxIcon from '../icons/MaxIcon.vue'

const emit = defineEmits<{
  callbackClick: []
}>()

const route = useRoute()

const isNotMT = computed(() => {
  switch (route.path) {
    case '/repair':
      return true
    case '/cart':
      return true
    case '/delivery':
      return true
    default:
      return false
  }
})
</script>

<template>
  <footer class="footer" :class="{ mt: isNotMT }">
    <div class="footer__inner container">
      <div class="footer__logo-block">
        <RouterLink to="/" class="footer__logo-link">
          <LogoIcon />
        </RouterLink>
        <span class="footer__company-name">ООО "Спарт"</span>
      </div>
      <div class="footer__nav">
        <ul class="footer__nav-list">
          <li class="footer__nav-item">
            <RouterLink to="/catalog" class="footer__nav-link">Каталоги</RouterLink>
          </li>
          <li class="footer__nav-item">
            <RouterLink to="/shop" class="footer__nav-link">Запчасти</RouterLink>
          </li>
          <li class="footer__nav-item">
            <RouterLink to="/shop" class="footer__nav-link">Агрегаты</RouterLink>
          </li>
          <li class="footer__nav-item">
            <RouterLink to="/repair" class="footer__nav-link">Ремонт</RouterLink>
          </li>
          <li class="footer__nav-item">
            <RouterLink to="/catalog" class="footer__nav-link">Спецтехника</RouterLink>
          </li>
        </ul>
        <ul class="footer__nav-list">
          <li class="footer__nav-item">
            <RouterLink to="/catalog" class="footer__nav-link">Марки машин</RouterLink>
          </li>
          <li class="footer__nav-item">
            <RouterLink to="/delivery" class="footer__nav-link">Экспресс-доставка</RouterLink>
          </li>
          <li class="footer__nav-item">
            <RouterLink to="/about" class="footer__nav-link">О компании</RouterLink>
          </li>
          <li class="footer__nav-item">
            <RouterLink to="/about" class="footer__nav-link">Контакты</RouterLink>
          </li>
        </ul>
      </div>
      <div class="footer__contacts">
        <div class="footer__contacts-block">
          <div class="footer__phone-block">
            <a href="#" class="footer__phone-link">
              <FooterPhoneIcon class="footer__phone-icon" />
              <span>+7 966 032 02 30</span>
            </a>
            <a href="#" class="footer__social-link">
              <WhatsappIcon />
            </a>
            <a href="#" class="footer__social-link">
              <TelegramIcon />
            </a>
            <a href="#" class="footer__social-link">
              <MaxIcon />
            </a>
          </div>
          <button type="button" class="footer__callback-link" @click="emit('callbackClick')">
            Заказать звонок
          </button>
        </div>
        <a href="#" class="footer__email-link">
          <EnvelopeIcon class="footer__email-icon" />
          <span>info@spart.pro</span>
        </a>
        <div class="footer__address-block">
          <MarkerIcon class="footer__address-icon" />
          <span class="footer__address-text"
            >Приморский край, г. Владивосток, ул. Снеговая, д. 64</span
          >
        </div>
      </div>
    </div>
    <div class="footer__copyright">© ООО Спарт. Все права защищены. 2016</div>
  </footer>
</template>

<style scoped lang="scss">
.footer {
  background-image: url('/images/footer.jpg');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  color: $color-white;
  padding: $m-sec 0;
  margin-top: $m-sec;

  &.mt {
    margin-top: 0;
  }

  &__inner {
    display: flex;
    justify-content: space-between;
    gap: 144px;
    margin-bottom: 32px;

    @include bp($point_2) {
      gap: 30px;
      flex-direction: column;
    }
  }

  &__logo-block {
    display: flex;
    align-items: flex-start;
    flex-direction: column;
    gap: 10px;
  }

  &__logo-link {
    display: inline-block;

    @include bp($point_2) {
      width: 142px;
      margin-bottom: 40px;
    }

    :deep(.logo-icon) {
      @include bp($point_2) {
        max-width: 100%;
        width: 100%;
      }
    }

    :deep(svg) {
      @include bp($point_2) {
        width: 100%;
        height: 100%;
      }
    }
  }

  &__company-name {
    font-size: 18px;
    font-weight: 300;
    line-height: 160%;
  }

  &__nav {
    display: flex;
    gap: 144px;
    font-size: 16px;
    line-height: 160%;
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
    max-width: 310px;
    text-align: right;

    @include bp($point_2) {
      text-align: left;
    }
  }

  &__contacts-block {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    gap: 10px;
    margin-bottom: 32px;

    @include bp($point_2) {
      align-items: flex-start;
    }
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
    font-size: 20px;
    font-weight: 700;
    line-height: 160%;
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
    background: transparent;
    border: none;
    padding: 0;
    font: inherit;

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

    @include bp($point_2) {
      justify-content: flex-start;
    }

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

    @include bp($point_2) {
      justify-content: flex-start;
    }
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
    font-size: 14px;
    line-height: 160%;
    font-weight: 300;
  }
}

:deep(.max-icon) {
  @include bp($point_4) {
    width: 24px;
    height: 24px;
  }
}
</style>
