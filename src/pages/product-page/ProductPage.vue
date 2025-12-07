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
    <div class="container pb-16">
      <div class="grid lg:grid-cols-2 gap-8 lg:gap-10">
        <!-- Левая часть: Изображение -->
        <div class="flex-shrink-0">
          <img :src="product.image" :alt="product.title" class="w-full h-auto object-contain max-h-[500px]">
        </div>

        <!-- Правая часть: Информация -->
        <div class="flex flex-col bg-white p-8 rounded-[10px]">
          <h2 class="text-35 font-bebas uppercase text-[#9A9A9A] mb-2 leading-none">{{ product.title }}</h2>
          <h2 class="text-30 font-roboto font-bold text-gray mb-2 leading-none">{{ product.price }}</h2>

          <!-- Статус наличия -->
          <div class="flex items-center gap-2 mb-6">
            <div class="flex items-center justify-center w-5 h-5 rounded-full ">
              <CheckFillIcon class="flex items-center justify-center" />
            </div>
            <span class="text-18 font-light text-gray">{{ product.instock }}</span>
          </div>
          <ul class="space-y-2 mb-3">
            <li v-for="characteristic in product.characteristics" :key="characteristic.label" class="flex gap-2 text-18">
              <span class="font-light text-[#A7A7A7]">{{ characteristic.label }}:</span>
              <component :class="[characteristic.link ? 'text-yellow' : 'text-gray', 'font-semibold']" :is="characteristic.link ? 'a' : 'span'" :href="characteristic.link" :target="characteristic.target">{{ characteristic.value }}</component>
            </li>
          </ul>
          <div class="text-18 text-gray">
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

<style scoped>
.product-page {
  min-height: calc(100vh - 200px);
}
</style>

