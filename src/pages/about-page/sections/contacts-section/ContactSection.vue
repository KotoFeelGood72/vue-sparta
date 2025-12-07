<script setup lang="ts">
import ContactDecorator from '@/components/icons/ContactDecorator.vue';
import FooterPhoneIcon from '@/components/icons/FooterPhoneIcon.vue';
import EnvelopeIcon from '@/components/icons/EnvelopeIcon.vue';
import AddressIcon from '@/components/icons/AddressIcon.vue';
import WhatsappIcon from '@/components/icons/WhatsappIcon.vue';
import TelegramIcon from '@/components/icons/TelegramIcon.vue';

</script>

<template>
  <div>

    <h2 class="text-55 leading-[105%] font-bebas uppercase text-gray mb-6">НАШИ КОНТАКТЫ</h2>
        <div class="grid lg:grid-cols-2 gap-8 lg:gap-10">
          <!-- Блок контактов -->
          <div class="bg-dark rounded-[10px] p-8 lg:p-10 relative overflow-hidden">
            <!-- Фоновый паттерн (шестеренка) -->
            <div class="absolute pointer-events-none bottom-0 right-0">
              <ContactDecorator/>
            </div>
            <div class="relative z-10 flex flex-col gap-6">
              <!-- Телефон -->
              <div class="flex items-start flex-col gap-2">
                <p class="text-20 text-[#A7A7A7]">Телефон:</p>
                <div class="flex items-center gap-3">
                  <FooterPhoneIcon class="flex items-center justify-center"/>
                  <a href="tel:+74232025502" class="text-18 lg:text-20 text-white hover:text-yellow transition-colors">
                    +7 423 202 55 02
                  </a>
                </div>
                <div class="flex items-center gap-3">
                  <FooterPhoneIcon class="flex items-center justify-center"/>
                  <a href="tel:+79660320230" class="text-18 lg:text-20 text-white hover:text-yellow transition-colors">
                    +7 966 032 02 30
                  </a>
                  <a href="https://wa.me/79660320230" target="_blank" class="hover:opacity-80 transition-opacity">
                    <WhatsappIcon />
                  </a>
                  <a href="https://t.me/+79660320230" target="_blank" class="hover:opacity-80 transition-opacity">
                    <TelegramIcon />
                  </a>
                </div>
              </div>
              <!-- Почта -->
              <div class="flex items-start gap-2 flex-col" >
                <p class="text-20 text-[#A7A7A7]">Почта:</p>
                <div class="flex items-center gap-3">
                  <div class="flex-shrink-0 mt-1">
                    <EnvelopeIcon />
                  </div>
                  <a href="mailto:info@spart.pro" class="text-18 lg:text-20 text-white hover:text-yellow transition-colors">
                    info@spart.pro
                  </a>
                </div>
              </div>
              <!-- Адрес -->
              <div class="flex items-start gap-2 flex-col">
                <p class="text-20 text-[#A7A7A7]">Адрес:</p>
                <div class="flex gap-3">
                  <div class="flex-shrink-0 mt-1.5">
                    <AddressIcon />
                  </div>
                  <p class="text-18 lg:text-20 text-white max-w-[320px] flex">
                    Приморский край, г. Владивосток, ул. Снеговая, д. 64
                  </p>
                </div>
              </div>
            </div>
          </div>
          <!-- Карта -->
          <div class="rounded-[10px] overflow-hidden h-full">
            <iframe
              src="https://yandex.ru/map-widget/v1/?ll=131.920000%2C43.130000&z=16&pt=131.920000%2C43.130000&l=map"
              width="100%"
              height="100%"
              frameborder="0"
              class="w-full h-full"
              allowfullscreen="true"
            ></iframe>
          </div>
        </div>
  </div>
</template>

<style scoped>

</style>
