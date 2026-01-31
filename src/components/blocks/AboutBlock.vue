<script setup lang="ts">
</script>

<template>
  <section class="about-block">
    <img src="/images/about-elipse.png" alt="" class="about-block__elipse">
    <img src="/images/about.png" alt="О компании" class="about-block__image">
    <div class="about-block__container">
      <div class="about-block__content">
        <div class="about-block__text">
          <h3 class="about-block__title">О компании</h3>
          <div class="about-block__description">
            <p>Gd ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam</p>
            <p>Kst, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatu</p>
          </div>
        </div>
      </div>
      <div class="about-block__features">
        <ul class="about-block__features-list">
          <li v-for="i in 3" :key="i" class="about-block__feature-item">
            <div class="about-block__feature-content">
              <div class="about-block__feature-image-wrapper">
                <img :src="`/images/about-${i}.png`" alt="" class="about-block__feature-image">
              </div>
              <h5 class="about-block__feature-title">Sed ut perspiciatis</h5>
              <p class="about-block__feature-text">ed ut perspiciatis unde omnis i natus error sit voluptatem accusantium doloremque laudantium, totam rem</p>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </section>
</template>

<style scoped lang="scss">
// @use '@/styles/variables' as *;

.about-block {
  background-image: url('/images/about-bg.png');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  position: relative;
  color: $color-white;
  border-radius: 0 0 300px 0;
  padding: 80px 0;

  @media (min-width: 1024px) {
    padding: 128px 0;
  }

  &__container {
    max-width: 1187px;
    margin: 0 auto;
    padding: 0 16px;
    position: relative;

    @media (min-width: 1024px) {
      padding-left: 0;
      padding-right: 16px;
    }
  }

  &__content {
    position: relative;
    margin-bottom: 64px;
    overflow: visible;

    @media (min-width: 1024px) {
      display: flex;
      align-items: center;
      justify-content: flex-end;
      gap: 80px;
      margin-bottom: 96px;
    }
  }

  &__elipse {
    position: absolute;
    top: 0;
    left: 0;
    z-index: 1;

    @media (min-width: 1024px) {
      width: 800px;
      left: 0;
    }
  }

  &__image {
    position: absolute;
    left: 0;
    top: 40px;
    z-index: 10;

    @media (min-width: 1024px) {
      width: 768px;
      left: 10px;
    }
  }

  &__text {
    max-width: 590px;
    position: relative;
    z-index: 10;

    @media (min-width: 1024px) {
      flex: 1;
    }
  }

  &__title {
    font-size: $font-size-55;
    line-height: $line-height-55;
    font-family: $font-family-bebas;
    text-transform: uppercase;
    margin-bottom: 24px;

    @media (min-width: 1024px) {
      margin-bottom: 32px;
    }
  }

  &__description {
    display: flex;
    flex-direction: column;
    gap: 24px;
    font-size: $font-size-20;
    line-height: $line-height-20;
    line-height: 175%;
  }

  &__features {
    // features styles
  }

  &__features-list {
    display: grid;
    grid-template-columns: 1fr;
    gap: 32px;
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
  }

  &__feature-image-wrapper {
    margin-bottom: 24px;
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
    font-size: $font-size-25;
    line-height: $line-height-25;
    font-weight: 700;
    margin-bottom: 16px;
  }

  &__feature-text {
    font-size: $font-size-20;
    line-height: $line-height-20;
    line-height: 175%;
  }
}
</style>

