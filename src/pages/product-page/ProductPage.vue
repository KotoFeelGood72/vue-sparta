<script setup lang="ts">
import CheckFillIcon from '@/components/icons/CheckFillIcon.vue';
import BlockForm from '@/components/shared/BlockForm.vue';


const product = {
  id: '1',
  image: '/images/agregate-1.png',
  title: 'ТНВД 12 12 04 00 000',
  rating: 5,
  instock: 'Под заказ 7 дней',
  price: '575 000 ₽',
  characteristics: [
    { label: 'Производитель', value: 'Caterpillar' },
    { label: 'Применение', value: 'Спецтехника' },
    { label: 'Тип', value: 'ТНВД' },
    { label: 'Модель', value: '12 12 04 00 000' },
    { label: 'Номер по каталогу', value: '1262598455', link: 'https://www.google.com', target: '_blank' },
  ],
  description: 'Топливный насос высокого давления (ТНВД) предназначен для подачи топлива в цилиндры дизельного двигателя под высоким давлением. Данная модель обеспечивает стабильную работу двигателя и оптимальный расход топлива. Изготовлен из высококачественных материалов с соблюдением всех технических требований.',
};
</script>

<template>
  <div class="product-page">
    <div class="product-page__container">
      <div class="product-page__content">
        <!-- Левая часть: Изображение -->
        <div class="product-page__image-wrapper">
          <img :src="product.image" :alt="product.title" class="product-page__image">
        </div>

        <!-- Правая часть: Информация -->
        <div class="product-page__info">
          <h2 class="product-page__title">{{ product.title }}</h2>
          <h2 class="product-page__price">{{ product.price }}</h2>

          <!-- Статус наличия -->
          <div class="product-page__instock">
            <div class="product-page__instock-icon">
              <CheckFillIcon/>
            </div>
            <span class="product-page__instock-text">{{ product.instock }}</span>
          </div>

          <ul class="product-page__characteristics">
            <li v-for="characteristic in product.characteristics" :key="characteristic.label" class="product-page__characteristic">
              <span class="product-page__characteristic-label">{{ characteristic.label }}:</span>
              <component
                :class="[
                  'product-page__characteristic-value',
                  characteristic.link ? 'product-page__characteristic-value--link' : ''
                ]"
                :is="characteristic.link ? 'a' : 'span'"
                :href="characteristic.link"
                :target="characteristic.target"
              >
                {{ characteristic.value }}
              </component>
            </li>
          </ul>

          <div class="product-page__description">
            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.
          </div>
        </div>
      </div>
    </div>

    <!-- Секция "Связаться с менеджером" -->
    <BlockForm
      image="/images/form-car.png"
      customClass="!right-0"
      title="Связаться с менеджером"
      subtitle="Если у Вас есть сложности с выбором товара или другие вопросы, то Вы можете получить консультацию у наших менеджеров в рабочие часы компании."
      theme="white"
    />
  </div>
</template>

<style scoped lang="scss">

.product-page {
  min-height: calc(100vh - 200px);
  padding-top: 16px;

  @media (min-width: 768px) {
    padding-top: 20px;
  }

  @media (min-width: 1024px) {
    padding-top: 24px;
    min-height: calc(100vh - 200px);
  }

  &__container {
    max-width: 1187px;
    margin: 0 auto;
    padding: 0 12px;
    padding-bottom: 48px;

    @media (min-width: 480px) {
      padding: 0 16px;
      padding-bottom: 56px;
    }

    @media (min-width: 768px) {
      padding-bottom: 64px;
    }

    @media (min-width: 1024px) {
      padding-bottom: 96px;
    }
  }

  &__content {
    display: grid;
    grid-template-columns: 1fr;
    gap: 20px;

    @media (min-width: 768px) {
      gap: 24px;
    }

    @media (min-width: 1024px) {
      grid-template-columns: repeat(2, 1fr);
      gap: 40px;
    }
  }

  &__image-wrapper {
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 200px;
    background-color: $color-light-gray;
    border-radius: 10px;
    padding: 16px;

    @media (min-width: 768px) {
      min-height: 280px;
      padding: 24px;
    }

    @media (min-width: 1024px) {
      min-height: auto;
      padding: 0;
      background-color: transparent;
    }

    @include bp($point_2) {
      padding: 0;
    }
  }

  &__image {
    width: 100%;
    height: auto;
    object-fit: contain;
    max-height: 280px;

    @include bp($point_2) {
      max-height: 100%;
    }

    @media (min-width: 768px) {
      max-height: 360px;
    }

    @media (min-width: 1024px) {
      max-height: 500px;
    }
  }

  &__info {
    display: flex;
    flex-direction: column;
    background-color: $color-white;
    padding: 16px;
    border-radius: 10px;

    @media (min-width: 768px) {
      padding: 24px;
    }

    @media (min-width: 1024px) {
      padding: 32px;
    }
  }

  &__title {
    font-size: $font-size-25;
    line-height: 1.2;
    font-family: $font-family-bebas;
    text-transform: uppercase;
    color: $color-gray;
    margin-bottom: 6px;
    word-break: break-word;

    @media (min-width: 768px) {
      font-size: 28px;
      margin-bottom: 8px;
    }

    @media (min-width: 1024px) {
      font-size: $font-size-35;
      line-height: $line-height-35;
    }
  }

  &__price {
    font-size: 24px;
    line-height: 1;
    font-family: $font-family-base;
    font-weight: 700;
    color: $color-gray;
    margin-bottom: 8px;

    @media (min-width: 768px) {
      font-size: 28px;
    }

    @media (min-width: 1024px) {
      font-size: $font-size-30;
      line-height: $line-height-30;
    }
  }

  &__instock {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 16px;

    @media (min-width: 1024px) {
      margin-bottom: 24px;
    }
  }

  &__instock-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 18px;
    height: 18px;
    flex-shrink: 0;

    @media (min-width: 768px) {
      width: 20px;
      height: 20px;
    }
  }

  &__instock-text {
    font-size: $font-size-14;
    line-height: $line-height-14;
    font-weight: 300;
    color: $color-gray;

    @media (min-width: 768px) {
      font-size: $font-size-18;
      line-height: $line-height-18;
    }
  }

  &__characteristics {
    list-style: none;
    padding: 0;
    margin: 0 0 8px 0;
    display: flex;
    flex-direction: column;
    gap: 6px;

    @media (min-width: 768px) {
      gap: 8px;
      margin-bottom: 12px;
    }
  }

  &__characteristic {
    display: flex;
    flex-wrap: wrap;
    gap: 4px 8px;
    font-size: $font-size-14;
    line-height: $line-height-14;

    @media (min-width: 768px) {
      font-size: $font-size-18;
      line-height: $line-height-18;
      gap: 8px;
    }
  }

  &__characteristic-label {
    font-weight: 300;
    color: $color-light-gray-text;
    flex-shrink: 0;
  }

  &__characteristic-value {
    font-weight: 600;
    color: $color-gray;
    word-break: break-word;

    &--link {
      color: $color-yellow;
      text-decoration: none;
      transition: color 0.2s;

      &:hover {
        color: darken($color-yellow, 10%);
      }
    }
  }

  &__description {
    font-size: $font-size-14;
    line-height: $line-height-14;
    color: $color-gray;

    @media (min-width: 768px) {
      font-size: $font-size-18;
      line-height: $line-height-18;
    }
  }
}
</style>

