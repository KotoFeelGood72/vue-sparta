<script setup lang="ts">
import 'swiper/css/pagination'

import { toRaw } from 'vue'
import { Navigation, Pagination } from 'swiper/modules'

import SectionHead from '@/components/blocks/section-head/SectionHead.vue'
import DefaultCard from '@/components/cards/DefaultCard.vue'
import type { DefaultCardModel } from '@/components/cards/DefaultCard.vue'
import SliderPaginationNav from '@/components/ui/SliderPaginationNav.vue'

const {
  repairs,
  headerHidden,
  sliderEnabled = true,
} = defineProps<{
  repairs: DefaultCardModel[]
  headerHidden?: boolean
  /** Включить слайдер (true) или показывать карточки сеткой (false) */
  sliderEnabled?: boolean
}>()

const breakpoints = {
  0: {
    slidesPerView: 1,
    spaceBetween: 20,
  },
  1024: {
    slidesPerView: 3,
    spaceBetween: 40,
  },
}

const transformRepairs = (repairs: any[]) => {
  return repairs.map((repair: any) => ({
    id: repair.id,
    slug: repair.slug,
    image: repair.featured_media.source_url,
    title: repair.title.rendered,
  }))
}
</script>

<template>
  <div class="repair-section">
    <div class="repair-section__container">
      <div v-if="!headerHidden" class="repair-section__header">
        <SectionHead title="ремонт" buttonText="смотреть все" buttonAbsolute />
      </div>
      <div class="repair-section__slider-wrapper">
        <Swiper
          v-if="sliderEnabled"
          :modules="[Navigation, Pagination]"
          :breakpoints="toRaw(breakpoints)"
          :speed="700"
          :navigation="{
            nextEl: '.repair-slider-navigation-next',
            prevEl: '.repair-slider-navigation-prev',
          }"
          :pagination="{
            el: '.repair-slider-pagination',
            clickable: true,
          }"
          class="repair-section__swiper"
        >
          <SwiperSlide
            v-for="repair in transformRepairs(repairs)"
            :key="repair.id"
            class="repair-section__slide"
          >
            <DefaultCard v-bind="repair" :to="`/repair/${repair.slug}`" />
          </SwiperSlide>
        </Swiper>
        <div v-else class="repair-section__grid">
          <DefaultCard
            v-for="repair in transformRepairs(repairs)"
            :key="repair.id"
            class="repair-section__grid-item"
            v-bind="repair"
            :to="`/repair/${repair.slug}`"
          />
        </div>
        <div v-if="sliderEnabled" class="repair-section__navigation">
          <SliderPaginationNav
            prev-el-class="repair-slider-navigation-prev"
            next-el-class="repair-slider-navigation-next"
            pagination-class="repair-slider-pagination"
          />
        </div>
      </div>
      <slot name="bottom" />
    </div>
  </div>
</template>

<style scoped lang="scss">
.repair-section {
  position: relative;

  @include bp($point_2) {
    padding: 0 0 55px 0;
  }

  &__container {
    max-width: 1187px;
    margin: 0 auto;
    padding: 0 16px;
  }

  &__header {
    margin-bottom: 12px;
  }

  &__slider-wrapper {
    overflow: hidden;
  }

  &__grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 20px;

    @media (min-width: 1024px) {
      grid-template-columns: repeat(3, 1fr);
      gap: 40px;
    }
  }

  &__grid-item {
    height: auto;
  }

  &__swiper {
    overflow: visible;

    @media (min-width: 1024px) {
      overflow: hidden;
    }
  }

  &__slide {
    height: auto;
  }

  &__navigation {
    display: none;
    justify-content: center;
    margin: 40px auto 30px auto;

    @include bp($point_2) {
      display: flex;
    }
  }
}
</style>
