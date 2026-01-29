<script setup lang="ts">
import AirIcon from '@/components/icons/AirIcon.vue';
import BlockForm from '@/components/shared/BlockForm.vue';
</script>

<template>
  <div class="delivery-page">
    <div class="delivery-page__container">
      <div class="delivery-page__card">
        <AirIcon class="delivery-page__card-icon"/>
        <p class="delivery-page__card-text">Мы можем отправить авиа до их областного центра за 1-3 дня</p>
      </div>
      <p class="delivery-page__description">st, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatu</p>
    </div>
    <BlockForm
      image="/images/form-one.png"
      title="закажите экспресс-доставку"
      subtitle="Если у Вас есть сложности с выбором товара или другие вопросы, то Вы можете получить консультацию у наших менеджеров
в рабочие часы компании."
      theme="white"
    />
  </div>
</template>

<style scoped lang="scss">
@import '@/styles/variables';

.delivery-page {
  padding-top: 24px;

  &__container {
    max-width: 1187px;
    margin: 0 auto;
    padding: 0 16px;
    padding-bottom: 112px;
  }

  &__card {
    display: flex;
    align-items: center;
    border-radius: 10px;
    padding: 16px 40px;
    gap: 32px;
    margin-bottom: 28px;
    background-image: url('/images/delivery-card.png');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
  }

  &__card-icon {
    flex-shrink: 0;
  }

  &__card-text {
    font-size: $font-size-32;
    line-height: $line-height-32;
    color: $color-white;
  }

  &__description {
    font-size: $font-size-20;
    line-height: $line-height-20;
    font-weight: 400;
  }
}
</style>

