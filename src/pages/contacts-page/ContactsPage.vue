<script setup lang="ts">
import ContactSection from './sections/contacts-section/ContactSection.vue'
</script>

<template>
  <div class="about-page">
    <section class="about-page__section about-page__section--contacts">
      <div class="about-page__container container">
        <ContactSection />
      </div>
    </section>
  </div>
</template>

<style scoped lang="scss">
.about-page {
  min-height: calc(80dvh - 200px);
  margin-bottom: $m-sec;
}
</style>
