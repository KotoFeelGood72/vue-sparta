<script setup lang="ts">
import { inject } from 'vue'
import CheckFillIcon from '@/components/icons/CheckFillIcon.vue'
import BlockForm from '@/components/shared/BlockForm.vue'

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
    {
      label: 'Номер по каталогу',
      value: '1262598455',
      link: 'https://www.google.com',
      target: '_blank',
    },
  ],
  description:
    'Топливный насос высокого давления (ТНВД) предназначен для подачи топлива в цилиндры дизельного двигателя под высоким давлением. Данная модель обеспечивает стабильную работу двигателя и оптимальный расход топлива. Изготовлен из высококачественных материалов с соблюдением всех технических требований.',
}

type OrderProductPayload = {
  image?: string
  title?: string
  subtitle?: string
}

const openOrderModal = inject<(payload?: OrderProductPayload) => void>('openOrderModal', () => {})

const handleOpenOrderClick = () => {
  const manufacturer = product.characteristics.find(
    (characteristic) => characteristic.label === 'Производитель',
  )?.value

  openOrderModal({
    image: product.image,
    title: product.title,
    subtitle: manufacturer,
  })
}

const handleAddToCartClick = () => {
  // TODO: реализовать добавление товара в корзину
}
</script>

<template>
  <div class="product-page">
    <div class="product-page__container container">
      <div class="product-page__content">
        <!-- Левая часть: Изображение -->
        <div class="product-page__image-wrapper">
          <img :src="product.image" :alt="product.title" class="product-page__image" />
        </div>

        <!-- Правая часть: Информация -->
        <div class="product-page__info">
          <h2 class="product-page__title">{{ product.title }}</h2>
          <h2 class="product-page__price">{{ product.price }}</h2>

          <!-- Статус наличия -->
          <div class="product-page__instock">
            <div class="product-page__instock-icon">
              <CheckFillIcon />
            </div>
            <span class="product-page__instock-text">{{ product.instock }}</span>
          </div>

          <ul class="product-page__characteristics">
            <li
              v-for="characteristic in product.characteristics"
              :key="characteristic.label"
              class="product-page__characteristic"
            >
              <span class="product-page__characteristic-label">{{ characteristic.label }}:</span>
              <component
                :class="[
                  'product-page__characteristic-value',
                  characteristic.link ? 'product-page__characteristic-value--link' : '',
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
            {{ product.description }}
          </div>

          <div class="product-page__actions">
            <button class="product-page__cta-button" type="button" @click="handleOpenOrderClick">
              Оставить заявку
            </button>
            <button class="product-page__cart-button" type="button" @click="handleAddToCartClick">
              В корзину
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Секция "Связаться с менеджером" -->
    <div class="product-page__form-section">
      <BlockForm
        image="/images/form-car.png"
        customClass="!right-0"
        title="Связаться с менеджером"
        subtitle="Если у Вас есть сложности с выбором товара или другие вопросы, то Вы можете получить консультацию у наших менеджеров в рабочие часы компании."
        theme="white"
      />
    </div>
  </div>
</template>

<style scoped lang="scss">
.product-page {
  min-height: calc(100vh - 200px);
  padding-top: 16px;

  &__container {
    margin-bottom: $m-sec;
  }

  &__content {
    display: grid;
    grid-template-columns: 1fr;
    gap: 20px;
    align-items: flex-start;

    @media (min-width: 1024px) {
      grid-template-columns: repeat(2, 1fr);
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

    // @media (min-width: 768px) {
    //   min-height: 280px;
    //   padding: 24px;
    // }

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
    font-size: 22px;
    line-height: 140%;
    font-family: $font-family-bebas;
    text-transform: uppercase;
    color: $color-gray;
    margin-bottom: 6px;
    word-break: break-word;

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

    // @media (min-width: 768px) {
    //   font-size: 28px;
    // }

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
      font-size: 16px;
      line-height: 160%;
    }
  }

  &__actions {
    margin-top: 16px;
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
  }

  &__cta-button {
    padding: 10px 24px;
    border-radius: 999px;
    border: none;
    background-color: $color-yellow;
    color: $color-gray;
    font-weight: 600;
    font-size: $font-size-14;
    line-height: $line-height-14;
    cursor: pointer;
    transition:
      background-color 0.2s ease,
      transform 0.1s ease;

    @media (min-width: 768px) {
      font-size: $font-size-18;
      line-height: $line-height-18;
      padding: 12px 32px;
    }

    &:hover {
      background-color: darken($color-yellow, 5%);
      transform: translateY(-1px);
    }

    &:active {
      transform: translateY(0);
    }
  }

  &__cart-button {
    padding: 10px 24px;
    border-radius: 999px;
    border: 1px solid $color-yellow;
    background-color: $color-white;
    color: $color-gray;
    font-weight: 600;
    font-size: $font-size-14;
    line-height: $line-height-14;
    cursor: pointer;
    transition:
      background-color 0.2s ease,
      color 0.2s ease,
      transform 0.1s ease;

    @media (min-width: 768px) {
      font-size: $font-size-18;
      line-height: $line-height-18;
      padding: 12px 32px;
    }

    &:hover {
      background-color: $color-yellow;
      color: $color-gray;
      transform: translateY(-1px);
    }

    &:active {
      transform: translateY(0);
    }
  }

  &__form-section {
    margin-top: $m-sec;
  }
}
</style>
