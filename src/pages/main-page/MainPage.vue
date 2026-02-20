<script setup lang="ts">
import 'swiper/css/pagination'

import { toRaw } from 'vue'
import { Navigation, Pagination } from 'swiper/modules'
import { useMediaStoreRefs } from '@/stores/useMediaStore'
import ChevronButtonIcon from '@/components/icons/ChevronButtonIcon.vue'

import IntroSlider from './sections/intro-slider/IntroSlider.vue'
import ButtonComponent from '@/components/ui/ButtonComponent.vue'
import BrandSlider from './sections/brand-slider/BrandSlider.vue'
import AgregatesSection from './sections/agregates-section/AgregatesSection.vue'
import SectionHead from '@/components/blocks/section-head/SectionHead.vue'
import AboutBlock from '@/components/blocks/AboutBlock.vue'
import DefaultCard from '@/components/cards/DefaultCard.vue'
import BlockForm from '@/components/shared/BlockForm.vue'
import RepairSection from './sections/repair/RepairSection.vue'
import SliderPaginationNav from '@/components/ui/SliderPaginationNav.vue'

const { isMobile } = useMediaStoreRefs()

const categoriesBreakpoints = {
  0: {
    slidesPerView: 1,
    spaceBetween: 20,
  },
  1024: {
    slidesPerView: 3,
    spaceBetween: 40,
  },
}

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
    <IntroSlider />
    <div class="">
      <BrandSlider />
    </div>
    <div class="main-page__section">
      <AgregatesSection :agregates="agregates" />
    </div>
    <div class="main-page__section">
      <AboutBlock />
    </div>
    <div class="main-page__section main-page__section--small">
      <BrandSlider>
        <template #head>
          <div class="main-page__container">
            <SectionHead
              title="категории запчастей"
              buttonText="смотреть все"
              class="main-page__section-head"
              buttonAbsolute
            />
          </div>
        </template>
      </BrandSlider>
    </div>
    <section class="main-page__section main-page__categories">
      <div class="main-page__container">
        <div class="main-page__categories-slider-wrapper">
          <Swiper
            :modules="[Navigation, Pagination]"
            :breakpoints="toRaw(categoriesBreakpoints)"
            :speed="700"
            :navigation="{
              nextEl: '.categories-slider-navigation-next',
              prevEl: '.categories-slider-navigation-prev',
            }"
            :pagination="{
              el: '.categories-slider-pagination',
              clickable: true,
            }"
            class="main-page__categories-swiper"
          >
            <SwiperSlide
              v-for="category in categories"
              :key="category.id"
              class="main-page__category-slide"
            >
              <DefaultCard v-bind="category" />
            </SwiperSlide>
          </Swiper>
          <div class="main-page__categories-navigation">
            <SliderPaginationNav
              prev-el-class="categories-slider-navigation-prev"
              next-el-class="categories-slider-navigation-next"
              pagination-class="categories-slider-pagination"
            />
          </div>
          <ButtonComponent
            :icon="ChevronButtonIcon"
            v-if="isMobile"
            text="СМОТРЕТЬ ВСЕ"
            size="small"
            variant="primary"
            custom-class="main-page__categories-button"
          />
        </div>
      </div>
    </section>
    <div class="main-page__section main-page__section--form">
      <BlockForm
        image="/images/form-one.png"
        title="закажите экспресс-доставку"
        subtitle="Если у Вас есть сложности с выбором товара или другие вопросы, то Вы можете получить консультацию у наших менеджеров
в рабочие часы компании."
        theme="dark"
      />
    </div>
    <div class="main-page__section">
      <RepairSection :repairs="repairs" />
    </div>
  </div>
</template>

<style scoped lang="scss">
.main-page {
  &__section {
    margin-bottom: 96px;

    @include bp($point_2) {
      margin-bottom: 55px;
    }

    &--small {
      margin-bottom: 40px;
    }
    &--form {
      margin-bottom: 80px;
    }
  }

  &__container {
    max-width: 1187px;
    margin: 0 auto;
    padding: 0 16px;
  }

  &__section-head {
    margin-bottom: 24px;
  }

  &__categories-slider-wrapper {
    overflow: hidden;
  }

  &__categories-swiper {
    overflow: visible;

    @media (min-width: 1024px) {
      overflow: hidden;
    }
  }

  &__category-slide {
    height: auto;
  }

  &__categories-button {
    @include bp($point_2) {
      font-weight: 600;
      max-width: 194px;
      margin: 0 auto;
    }
  }

  &__categories-navigation {
    @include bp($point_2) {
      margin-top: 40px;
      margin-bottom: 30px;
    }

    @media (min-width: 1024px) {
      display: none;
    }
  }
}
</style>
