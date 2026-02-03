<script setup lang="ts">
import BlockForm from '@/components/shared/BlockForm.vue';

</script>

<template>
  <div class="repair-detail-page">
    <div class="repair-detail-page__container">
      <div class="repair-detail-page__content">
        <div class="repair-detail-page__image-wrapper">
          <img src="/images/repair-detail.png" alt="" class="repair-detail-page__image">
        </div>
        <div class="repair-detail-page__text">
          <p class="repair-detail-page__paragraph">Gd ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam</p>
          <p class="repair-detail-page__paragraph">Kst, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatu</p>
        </div>
      </div>
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
.repair-detail-page {
  padding-top: 24px;

  @media (min-width: 1024px) {
    padding-top: 24px;
  }

  &__container {
    max-width: 1187px;
    margin: 0 auto;
    padding: 0 16px;
    padding-bottom: 96px;

    @media (min-width: 1024px) {
      padding-bottom: 96px;
    }
  }

  &__content {
    display: flex;
    align-items: center;
    border-radius: 10px;
    overflow: hidden;
    flex-direction: column;

    @media (min-width: 1024px) {
      flex-direction: row;
      height: 493px;
    }
  }

  &__image-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    width: 100%;

    @media (min-width: 1024px) {
      width: auto;
    }
  }

  &__image {
    display: block;
    width: 100%;
    height: auto;

    @media (min-width: 1024px) {
      width: auto;
      height: 100%;
    }
  }

  &__text {
    background-color: $color-gray;
    color: $color-white;
    height: 100%;
    display: flex;
    flex-direction: column;
    padding: 20px;
    width: 100%;

    @media (min-width: 1024px) {
      padding: 40px;
      font-size: $font-size-20;
      line-height: $line-height-20;
      line-height: 175%;
      gap: 20px;
    }
  }

  &__paragraph {
    margin: 0;
    font-size: inherit;
    line-height: inherit;
  }
}
</style>

