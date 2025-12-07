<script setup lang="ts">
import SpeedIcon from '@/components/icons/SpeedIcon.vue';
import ShieldIcon from '@/components/icons/ShieldIcon.vue';
import GarantIcon from '@/components/icons/GarantIcon.vue';

</script>

<template>
  <div>
    <ul class="flex flex-col max-w-[560px] gap-6">
      <li>
        <div class="flex items-center gap-8 mb-3">
          <div class="flex items-center">
            <SpeedIcon />
          </div>
          <h3 class="text-25 text-gray font-semibold">Скорость</h3>
        </div>
        <p class="text-20 text-gray ">Мы быстро расцениваем заявки и оперативно доставляем запчасти, чтобы сократить время простоя техники.</p>
      </li>
      <li>
        <div class="flex items-center gap-8 mb-3">
          <div class="flex items-center">
            <ShieldIcon />
          </div>
          <h3 class="text-25 text-gray font-semibold">Надежность</h3>
        </div>
        <p class="text-20 text-gray ">Мы не работаем с подделками и сомнительными производителями.</p>
      </li>
      <li>
        <div class="flex items-center gap-8 mb-3">
          <div class="flex items-center">
            <GarantIcon />
          </div>
          <h3 class="text-25 text-gray font-semibold">Гарантия</h3>
        </div>
        <p class="text-20 text-gray ">Мы всегда честно сообщаем о сроках, стоимости. На все запчасти есть гарантия.</p>
      </li>
    </ul>
  </div>
</template>

<style scoped>

</style>
