<script setup lang="ts">
import IntroSlider from './sections/intro-slider/IntroSlider.vue';
import BrandSlider from './sections/brand-slider/BrandSlider.vue';
import AgregatesSection from './sections/agregates-section/AgregatesSection.vue';
import SectionHead from '@/components/blocks/section-head/SectionHead.vue';
import AboutBlock from '@/components/blocks/AboutBlock.vue';
import DefaultCard from '@/components/cards/DefaultCard.vue';
import BlockForm from '@/components/shared/BlockForm.vue';
import RepairSection from './sections/repair/RepairSection.vue';

const agregates = [
  {
    id: '1',
    slug: 'agregate-1',
    image: '/images/agregate-1.png',
    title: 'ДВС',
  },
  {
    id: '2',
    slug: 'agregate-2',
    image: '/images/agregate-2.png',
    title: 'КПП',
  },
  {
    id: '3',
    slug: 'agregate-3',
    image: '/images/agregate-3.png',
    title: 'Мосты и запчасти к ним',
  },
]

const categories = [
  {
    id: '1',
    slug: 'category-1',
    image: '/images/category-1.png',
    title: 'Запчасти ДВС',
  },
  {
    id: '2',
    slug: 'category-2',
    image: '/images/category-2.png',
    title: 'Запчасти КПП',
  },
  {
    id: '3',
    slug: 'category-3',
    image: '/images/category-3.png',
    title: 'Гидравлическая система',
  },
  {
    id: '4',
    slug: 'category-4',
    image: '/images/category-4.png',
    title: 'Топливная система',
  },
  {
    id: '5',
    slug: 'category-5',
    image: '/images/category-5.png',
    title: 'Турбины',
  },
  {
    id: '6',
    slug: 'category-6',
    image: '/images/category-6.png',
    title: 'Электрика',
  },
  {
    id: '7',
    slug: 'category-7',
    image: '/images/category-7.png',
    title: 'Система охлаждения',
  },
  {
    id: '8',
    slug: 'category-8',
    image: '/images/category-8.png',
    title: 'Фильтры ',
  },
  {
    id: '9',
    slug: 'category-9',
    image: '/images/category-9.png',
    title: 'Навесное оборудование',
  },
  {
    id: '10',
    slug: 'category-10',
    image: '/images/category-10.png',
    title: 'Ремкомплекты',
  },
  {
    id: '11',
    slug: 'category-11',
    image: '/images/category-11.png',
    title: 'Рама',
  },
  {
    id: '12',
    slug: 'category-12',
    image: '/images/category-12.png',
    title: 'Другое',
  },
]

const repairs = [
  {
    id: '1',
    slug: 'repair-1',
    image: '/images/repair-1.png',
    title: 'Ремонт ДВС и КПП',
  },
  {
    id: '2',
    slug: 'repair-2',
    image: '/images/repair-2.png',
    title: 'Ремонт гидравлики',
  },
  {
    id: '3',
    slug: 'repair-3',
    image: '/images/repair-3.png',
    title: 'Trade-in',
  },
]
</script>

<template>
  <div class="main-page">
    <IntroSlider/>
    <BrandSlider/>
    <AgregatesSection :agregates="agregates"/>
    <AboutBlock/>
    <BrandSlider>
      <template #head>
        <SectionHead title="категории запчастей" buttonText="смотреть все"/>
      </template>
    </BrandSlider>
    <section class="categories-section">
      <div class="container">
        <ul>
          <li v-for="category in categories" :key="category.id">
            <DefaultCard v-bind="category"/>
          </li>
        </ul>
      </div>
    </section>
    <BlockForm
      image="/images/form-one.png"
      title="закажите экспресс-доставку"
      subtitle="Если у Вас есть сложности с выбором товара или другие вопросы, то Вы можете получить консультацию у наших менеджеров
в рабочие часы компании."
      theme="white"
    />
    <RepairSection :repairs="repairs"/>
  </div>
</template>

