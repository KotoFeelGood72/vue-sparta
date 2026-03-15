<script setup lang="ts">
import ServicesSection from './sections/services-section/ServicesSection.vue'
import BlockImgSection from './sections/blockimg-section/BlockImgSection.vue'
// import ContactSection from './sections/contacts-section/ContactSection.vue'
</script>

<template>
  <div class="about-page">
    <!-- Секция "О компании" (верхняя) -->
    <section class="about-page__section">
      <div class="about-page__container container">
        <BlockImgSection
          image="/images/excavator.png"
          content="Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem."
          title="О КОМПАНИИ"
        />
      </div>
    </section>

    <!-- Секция преимуществ -->
    <section class="about-page__section">
      <div class="about-page__container container">
        <ServicesSection />
      </div>
    </section>

    <!-- Секция "О компании" (нижняя) -->
    <section class="about-page__section">
      <div class="about-page__container container">
        <BlockImgSection
          image="/images/bulldozer.png"
          content="Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem."
          reversed
        />
      </div>
    </section>

    <!-- Секция контактов -->
    <!-- <section class="about-page__section about-page__section--contacts">
      <div class="about-page__container">
        <ContactSection />
      </div>
    </section> -->
  </div>
</template>

<style scoped lang="scss">
.about-page {
  min-height: calc(100vh - 200px);

  &__section {
    padding-bottom: 32px;
  }
}
</style>
