<script setup lang="ts">
import SpeedIcon from '@/components/icons/SpeedIcon.vue'
import ShieldIcon from '@/components/icons/ShieldIcon.vue'
import GarantIcon from '@/components/icons/GarantIcon.vue'
</script>

<template>
  <div class="services-section">
    <ul class="services-section__list">
      <li class="services-section__item">
        <div class="services-section__header">
          <div class="services-section__icon-wrapper">
            <SpeedIcon />
          </div>
          <h3 class="services-section__title">Скорость</h3>
        </div>
        <p class="services-section__text">
          Мы быстро расцениваем заявки и оперативно доставляем запчасти, чтобы сократить время
          простоя техники.
        </p>
      </li>
      <li class="services-section__item">
        <div class="services-section__header">
          <div class="services-section__icon-wrapper">
            <ShieldIcon />
          </div>
          <h3 class="services-section__title">Надежность</h3>
        </div>
        <p class="services-section__text">
          Мы не работаем с подделками и сомнительными производителями.
        </p>
      </li>
      <li class="services-section__item">
        <div class="services-section__header">
          <div class="services-section__icon-wrapper">
            <GarantIcon />
          </div>
          <h3 class="services-section__title">Гарантия</h3>
        </div>
        <p class="services-section__text">
          Мы всегда честно сообщаем о сроках, стоимости. На все запчасти есть гарантия.
        </p>
      </li>
    </ul>
  </div>
</template>

<style scoped lang="scss">
.services-section {
  padding: 32px;
  border-radius: 10px;
  overflow: hidden;
  color: $color-white;
  background-image: url('/images/services-bg.png');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;

  &__list {
    display: grid;
    grid-template-columns: 1fr;
    gap: 16px;
    list-style: none;
    padding: 0;
    margin: 0;
    text-align: center;

    @media (min-width: 1024px) {
      grid-template-columns: repeat(3, 1fr);
      gap: 32px;
    }
  }

  &__item {
    margin: 0;
  }

  &__header {
    display: flex;
    align-items: center;
    flex-direction: column;
    gap: 20px;
    margin-bottom: 8px;
  }

  &__icon-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  &__title {
    font-size: 22px;
    line-height: 140%;
    font-weight: 600;
  }

  &__text {
    font-size: 16px;
    line-height: 140%;
    font-weight: 300;
  }
}
</style>
