<script setup lang="ts">
import { Navigation, Pagination } from 'swiper/modules';

import SpeedIcon from '@/components/icons/SpeedIcon.vue';
import ShieldIcon from '@/components/icons/ShieldIcon.vue';
import GarantIcon from '@/components/icons/GarantIcon.vue';
import ChevronIcon from '@/components/icons/ChevronIcon.vue';
</script>

<template>
  <div class="intro-slider">
    <div class="container">
      <Swiper :modules="[Navigation, Pagination]">
        <SwiperSlide>
          <div class="intro-slider-item">
            <div class="intro-slider-item-content">
              <h1>Поставка двигателей для спецтехники</h1>
              <ul>
                <li>
                  <div>
                    <SpeedIcon />
                  </div>
                  <h3>Скорость</h3>
                  <p>Мы быстро расцениваем заявки и оперативно доставляем запчасти, чтобы сократить время простоя техники.</p>
                </li>
                <li>
                  <div>
                    <ShieldIcon />
                  </div>
                  <h3>Надежность </h3>
                  <p>Мы не работаем с подделками и сомнительными производителями.</p>
                </li>
                <li>
                  <div>
                    <GarantIcon />
                  </div>
                  <h3>Гарантия</h3>
                  <p>Мы всегда честно сообщаем о сроках, стоимости. На все запчасти есть гарантия.</p>
                </li>
              </ul>
            </div>
            <div class="intro-slider-item-image">
              <img src="/images/intro-slide.png" alt="">
            </div>
          </div>
        </SwiperSlide>
      </Swiper>
      <div>
        <div>
          <ChevronIcon />
        </div>
        <div class="swiper-pagination"></div>
        <div>
          <ChevronIcon />
        </div>
      </div>

    </div>
  </div>
</template>
