<script setup lang="ts">
defineProps<{
  about: any
}>()
</script>

<template>
  <section class="about-block">
    <img src="/images/about-elipse.png" alt="" class="about-block__elipse" />
    <img src="/images/about.png" alt="О компании" class="about-block__image" />
    <div class="about-block__container container">
      <div class="about-block__content">
        <div class="about-block__text">
          <h3 class="about-block__title">{{ about.about_title }}</h3>
          <div class="about-block__description">
            <div v-html="about.about_text"></div>
          </div>
        </div>
      </div>
      <div class="about-block__features">
        <ul class="about-block__features-list">
          <li v-for="(feature, i) in about.about_list" :key="i" class="about-block__feature-item">
            <div class="about-block__feature-content">
              <div class="about-block__feature-image-wrapper">
                <img :src="`/images/about-1.png`" alt="" class="about-block__feature-image" />
              </div>
              <h5 class="about-block__feature-title">{{ feature.title }}</h5>
              <div v-html="feature.text"></div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </section>
</template>

<style scoped lang="scss">
.about-block {
  background-image: url('/images/about-bg.png');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  position: relative;
  color: $color-white;
  border-radius: 0 0 200px 0;
  padding: $m-sec 0;

  @include bp($point_2) {
    padding: 0 0 50px 0;
    border-radius: 0 0 160px 0;
  }

  &__content {
    position: relative;
    margin-bottom: $m-sec;
    overflow: visible;

    @media (min-width: 1024px) {
      display: flex;
      align-items: center;
      justify-content: flex-end;
      gap: 40px;
      margin-bottom: $m-sec;
    }
  }

  &__elipse {
    position: absolute;
    top: 0;
    left: 0;
    z-index: 1;

    @media (min-width: 1024px) {
      width: 500px;
      left: 0;
    }

    @include bp($point_2) {
      width: 100%;
    }
  }

  &__image {
    position: absolute;
    left: 0;
    top: 40px;
    z-index: 10;

    @media (min-width: 1024px) {
      width: 600px;
      left: 9%;
      top: 0;
    }

    @include bp($point_2) {
      width: 100%;
      position: relative;
      top: 10px;
    }
  }

  &__text {
    max-width: 590px;
    position: relative;
    z-index: 10;

    @media (min-width: 1024px) {
      flex: 1;
    }

    @include bp($point_2) {
      font-size: 18px;
    }
  }

  &__title {
    font-size: 50px;
    font-family: $font-family-bebas;
    text-transform: uppercase;
    margin-bottom: 24px;
    line-height: 160%;

    @include bp($point_2) {
      font-size: 35px;
      font-weight: 400;
      margin-bottom: 12px;
      padding-top: 30px;
    }
  }

  &__description {
    display: flex;
    flex-direction: column;
    gap: 24px;
    font-size: 18px;
    line-height: 160%;
    font-weight: 400;

    @include bp($point_2) {
      font-size: 18px;
      font-weight: 400;
    }
  }

  &__features-list {
    display: grid;
    grid-template-columns: 1fr;
    gap: 16px;
    list-style: none;
    padding: 0;
    margin: 0;

    @media (min-width: 1024px) {
      grid-template-columns: repeat(3, 1fr);
      gap: 40px;
    }
  }

  &__feature-item {
    margin: 0;
  }

  &__feature-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;

    @media (min-width: 1024px) {
      align-items: flex-start;
      text-align: left;
    }

    @include bp($point_2) {
      text-align: left;
      justify-content: flex-start;
      align-items: flex-start;
      max-width: 321px;
    }
  }

  &__feature-image-wrapper {
    margin-bottom: 16px;
    display: flex;
    align-items: center;
    justify-content: center;

    @media (min-width: 1024px) {
      justify-content: flex-start;
    }
  }

  &__feature-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  &__feature-title {
    font-size: 20px;
    font-weight: 500;
    margin-bottom: 16px;

    @include bp($point_2) {
      font-size: 20px;
      font-weight: 400;
      margin-bottom: 5px;
      text-align: left;
    }
  }

  &__feature-text {
    font-size: 18px;
    line-height: 160%;
    font-weight: 400;
  }
}
</style>
