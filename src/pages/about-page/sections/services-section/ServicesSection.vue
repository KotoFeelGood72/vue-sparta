<script setup lang="ts">
import SpeedIcon from '@/components/icons/SpeedIcon.vue';
import ShieldIcon from '@/components/icons/ShieldIcon.vue';
import GarantIcon from '@/components/icons/GarantIcon.vue';

</script>

<template>
  <div class="p-14 services-section-container rounded-[10px] overflow-hidden text-white">
    <ul class="grid lg:grid-cols-3 gap-8 lg:gap-10 text-center">
      <li>
        <div class="flex items-center flex-col gap-5 mb-2">
          <div class="flex items-center">
            <SpeedIcon />
          </div>
          <h3 class="text-25 font-semibold">Скорость</h3>
        </div>
        <p class="text-20 font-light">Мы быстро расцениваем заявки и оперативно доставляем запчасти, чтобы сократить время простоя техники.</p>
      </li>
      <li>
        <div class="flex items-center flex-col gap-5 mb-2">
          <div class="flex items-center">
            <ShieldIcon />
          </div>
          <h3 class="text-25 font-semibold">Надежность</h3>
        </div>
        <p class="text-20 font-light">Мы не работаем с подделками и сомнительными производителями.</p>
      </li>
      <li>
        <div class="flex items-center flex-col gap-5 mb-2">
          <div class="flex items-center">
            <GarantIcon />
          </div>
          <h3 class="text-25 font-semibold">Гарантия</h3>
        </div>
        <p class="text-20 font-light">Мы всегда честно сообщаем о сроках, стоимости. На все запчасти есть гарантия.</p>
      </li>
    </ul>
  </div>
</template>

<style scoped>

  .services-section-container {
    background-image: url('/images/services-bg.png');
  }

</style>
