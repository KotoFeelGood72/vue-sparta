<script setup lang="ts">
import ContactDecorator from '@/components/icons/ContactDecorator.vue';
import FooterPhoneIcon from '@/components/icons/FooterPhoneIcon.vue';
import EnvelopeIcon from '@/components/icons/EnvelopeIcon.vue';
import AddressIcon from '@/components/icons/AddressIcon.vue';
import WhatsappIcon from '@/components/icons/WhatsappIcon.vue';
import TelegramIcon from '@/components/icons/TelegramIcon.vue';

</script>

<template>
  <div class="contact-section">
    <h2 class="contact-section__title">НАШИ КОНТАКТЫ</h2>
    <div class="contact-section__content">
      <!-- Блок контактов -->
      <div class="contact-section__contacts-block">
        <!-- Фоновый паттерн (шестеренка) -->
        <div class="contact-section__decorator">
          <ContactDecorator/>
        </div>
        <div class="contact-section__contacts-inner">
          <!-- Телефон -->
          <div class="contact-section__contact-item">
            <p class="contact-section__contact-label">Телефон:</p>
            <div class="contact-section__contact-row">
              <FooterPhoneIcon class="contact-section__contact-icon"/>
              <a href="tel:+74232025502" class="contact-section__contact-link">
                +7 423 202 55 02
              </a>
            </div>
            <div class="contact-section__contact-row">
              <FooterPhoneIcon class="contact-section__contact-icon"/>
              <a href="tel:+79660320230" class="contact-section__contact-link">
                +7 966 032 02 30
              </a>
              <a href="https://wa.me/79660320230" target="_blank" class="contact-section__social-link">
                <WhatsappIcon />
              </a>
              <a href="https://t.me/+79660320230" target="_blank" class="contact-section__social-link">
                <TelegramIcon />
              </a>
            </div>
          </div>
          <!-- Почта -->
          <div class="contact-section__contact-item">
            <p class="contact-section__contact-label">Почта:</p>
            <div class="contact-section__contact-row">
              <div class="contact-section__contact-icon-wrapper">
                <EnvelopeIcon />
              </div>
              <a href="mailto:info@spart.pro" class="contact-section__contact-link">
                info@spart.pro
              </a>
            </div>
          </div>
          <!-- Адрес -->
          <div class="contact-section__contact-item">
            <p class="contact-section__contact-label">Адрес:</p>
            <div class="contact-section__address-row">
              <div class="contact-section__address-icon-wrapper">
                <AddressIcon />
              </div>
              <p class="contact-section__address-text">
                Приморский край, г. Владивосток, ул. Снеговая, д. 64
              </p>
            </div>
          </div>
        </div>
      </div>
      <!-- Карта -->
      <div class="contact-section__map">
        <iframe
          src="https://yandex.ru/map-widget/v1/?ll=131.920000%2C43.130000&z=16&pt=131.920000%2C43.130000&l=map"
          width="100%"
          height="100%"
          frameborder="0"
          class="contact-section__map-iframe"
          allowfullscreen="true"
        ></iframe>
      </div>
    </div>
  </div>
</template>

<style scoped lang="scss">
.contact-section {
  &__title {
    font-size: $font-size-55;
    line-height: $line-height-55;
    line-height: 105%;
    font-family: $font-family-bebas;
    text-transform: uppercase;
    color: $color-gray;
    margin-bottom: 24px;
  }

  &__content {
    display: grid;
    grid-template-columns: 1fr;
    gap: 32px;

    @media (min-width: 1024px) {
      grid-template-columns: repeat(2, 1fr);
      gap: 40px;
    }
  }

  &__contacts-block {
    background-color: $color-dark;
    border-radius: 10px;
    padding: 32px;
    position: relative;
    overflow: hidden;

    @media (min-width: 1024px) {
      padding: 40px;
    }
  }

  &__decorator {
    position: absolute;
    pointer-events: none;
    bottom: 0;
    right: 0;
  }

  &__contacts-inner {
    position: relative;
    z-index: 10;
    display: flex;
    flex-direction: column;
    gap: 24px;
  }

  &__contact-item {
    display: flex;
    align-items: flex-start;
    flex-direction: column;
    gap: 8px;
  }

  &__contact-label {
    font-size: $font-size-20;
    line-height: $line-height-20;
    color: $color-light-gray-text;
  }

  &__contact-row {
    display: flex;
    align-items: center;
    gap: 12px;
  }

  &__contact-icon {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  &__contact-icon-wrapper {
    flex-shrink: 0;
    margin-top: 4px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  &__contact-link {
    font-size: $font-size-18;
    line-height: $line-height-18;
    color: $color-white;
    text-decoration: none;
    transition: color 0.2s;

    @media (min-width: 1024px) {
      font-size: $font-size-20;
      line-height: $line-height-20;
    }

    &:hover {
      color: $color-yellow;
    }
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

  &__address-row {
    display: flex;
    gap: 12px;
  }

  &__address-icon-wrapper {
    flex-shrink: 0;
    margin-top: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  &__address-text {
    font-size: $font-size-18;
    line-height: $line-height-18;
    color: $color-white;
    max-width: 320px;
    display: flex;

    @media (min-width: 1024px) {
      font-size: $font-size-20;
      line-height: $line-height-20;
    }
  }

  &__map {
    border-radius: 10px;
    overflow: hidden;
    height: 100%;
  }

  &__map-iframe {
    width: 100%;
    height: 100%;
    border: none;
  }
}
</style>
