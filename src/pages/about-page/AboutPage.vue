<script setup lang="ts">
import PhoneCircleIcon from '@/components/icons/PhoneCircleIcon.vue';
import EnvelopeIcon from '@/components/icons/EnvelopeIcon.vue';
import AddressIcon from '@/components/icons/AddressIcon.vue';
import WhatsappIcon from '@/components/icons/WhatsappIcon.vue';
import TelegramIcon from '@/components/icons/TelegramIcon.vue';
import ServicesSection from './sections/services-section/ServicesSection.vue';
import BlockImgSection from './sections/blockimg-section/BlockImgSection.vue';
</script>

<template>
  <div class="about-page">
    <!-- Секция "О компании" (верхняя) -->
    <section class="about-top-section pt-10 pb-16 lg:pt-16 lg:pb-24">
      <div class="container">
        <BlockImgSection
          image="/images/excavator.png"
          content="Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem."
          title="О КОМПАНИИ"
        />
      </div>
    </section>

    <!-- Секция преимуществ -->
    <section class="services-section py-16 lg:py-24">
      <div class="container">
        <ServicesSection />
      </div>
    </section>

    <!-- Секция "О компании" (нижняя) -->
    <section class="about-bottom-section py-16 lg:py-24">
      <div class="container">
        <BlockImgSection
          image="/images/bulldozer.png"
          content="Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem."
          reversed
        />
      </div>
    </section>

    <!-- Секция контактов -->
    <section class="contacts-section py-16 lg:py-24">
      <div class="container">
        <h2 class="text-55 lg:text-75 font-bebas uppercase text-gray mb-10 lg:mb-16">НАШИ КОНТАКТЫ</h2>
        <div class="grid lg:grid-cols-2 gap-8 lg:gap-10">
          <!-- Блок контактов -->
          <div class="bg-dark rounded-[10px] p-8 lg:p-10 relative overflow-hidden">
            <!-- Фоновый паттерн (шестеренка) -->
            <div class="absolute inset-0 opacity-[0.03] pointer-events-none">
              <svg width="300" height="300" viewBox="0 0 100 100" class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                <path d="M50 0 L55 20 L75 15 L70 35 L90 50 L70 65 L75 85 L55 80 L50 100 L45 80 L25 85 L30 65 L10 50 L30 35 L25 15 L45 20 Z" fill="#FDC043" />
                <circle cx="50" cy="50" r="15" fill="#FDC043" />
              </svg>
            </div>
            <div class="relative z-10 flex flex-col gap-8">
              <!-- Телефон -->
              <div class="flex items-start gap-4">
                <div class="flex-shrink-0 mt-1">
                  <PhoneCircleIcon />
                </div>
                <div class="flex flex-col gap-2">
                  <a href="tel:+74232025502" class="text-18 lg:text-20 text-white hover:text-yellow transition-colors">
                    +7 423 202 55 02
                  </a>
                  <div class="flex items-center gap-3">
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
              </div>
              <!-- Почта -->
              <div class="flex items-start gap-4">
                <div class="flex-shrink-0 mt-1">
                  <EnvelopeIcon />
                </div>
                <a href="mailto:info@spart.pro" class="text-18 lg:text-20 text-white hover:text-yellow transition-colors">
                  info@spart.pro
                </a>
              </div>
              <!-- Адрес -->
              <div class="flex items-start gap-4">
                <div class="flex-shrink-0 mt-1">
                  <AddressIcon />
                </div>
                <p class="text-18 lg:text-20 text-white">
                  Приморский край, г. Владивосток, ул. Снеговая, д. 64
                </p>
              </div>
            </div>
          </div>
          <!-- Карта -->
          <div class="rounded-[10px] overflow-hidden h-[400px] lg:h-[500px]">
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
    </section>
  </div>
</template>

<style scoped>
.about-page {
  min-height: calc(100vh - 200px);
}
</style>

