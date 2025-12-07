<script setup lang="ts">
import ServicesSection from './sections/services-section/ServicesSection.vue';
import BlockImgSection from './sections/blockimg-section/BlockImgSection.vue';
import ContactSection from './sections/contacts-section/ContactSection.vue';
</script>

<template>
  <div class="about-page">
    <!-- Секция "О компании" (верхняя) -->
    <section class="about-top-section pb-12">
      <div class="container">
        <BlockImgSection
          image="/images/excavator.png"
          content="Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem."
          title="О КОМПАНИИ"
        />
      </div>
    </section>

    <!-- Секция преимуществ -->
    <section class="services-section pb-12">
      <div class="container">
        <ServicesSection />
      </div>
    </section>

    <!-- Секция "О компании" (нижняя) -->
    <section class="about-bottom-section pb-12">
      <div class="container">
        <BlockImgSection
          image="/images/bulldozer.png"
          content="Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem."
          reversed
        />
      </div>
    </section>

    <!-- Секция контактов -->
    <section class="contacts-section pb-28">
      <div class="container">
        <ContactSection />
      </div>
    </section>
  </div>
</template>

<style scoped>
.about-page {
  min-height: calc(100vh - 200px);
}
</style>

