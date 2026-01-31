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
// @use '@/styles/variables' as *;

.product-page {
  min-height: calc(100vh - 200px);

  &__container {
    max-width: 1187px;
    margin: 0 auto;
    padding: 0 16px;
    padding-bottom: 64px;
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

  &__image-wrapper {
    flex-shrink: 0;
  }

  &__image {
    width: 100%;
    height: auto;
    object-fit: contain;
    max-height: 500px;
  }

  &__info {
    display: flex;
    flex-direction: column;
    background-color: $color-white;
    padding: 32px;
    border-radius: 10px;
  }

  &__title {
    font-size: $font-size-35;
    line-height: $line-height-35;
    font-family: $font-family-bebas;
    text-transform: uppercase;
    color: $color-gray;
    margin-bottom: 8px;
    line-height: 1;
  }

  &__price {
    font-size: $font-size-30;
    line-height: $line-height-30;
    font-family: $font-family-base;
    font-weight: 700;
    color: $color-gray;
    margin-bottom: 8px;
    line-height: 1;
  }

  &__instock {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 24px;
  }

  &__instock-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 20px;
    height: 20px;
    border-radius: 50%;
  }

  &__instock-text {
    font-size: $font-size-18;
    line-height: $line-height-18;
    font-weight: 300;
    color: $color-gray;
  }

  &__characteristics {
    list-style: none;
    padding: 0;
    margin: 0 0 12px 0;
    display: flex;
    flex-direction: column;
    gap: 8px;
  }

  &__characteristic {
    display: flex;
    gap: 8px;
    font-size: $font-size-18;
    line-height: $line-height-18;
  }

  &__characteristic-label {
    font-weight: 300;
    color: $color-light-gray-text;
  }

  &__characteristic-value {
    font-weight: 600;
    color: $color-gray;

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
    font-size: $font-size-18;
    line-height: $line-height-18;
    color: $color-gray;
  }
}
</style>

