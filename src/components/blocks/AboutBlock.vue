<script setup lang="ts">
</script>

<template>
  <section class="about-block py-20 lg:py-32 relative">
    <div class="container">
      <div class="about-block-content lg:flex lg:items-center lg:justify-end lg:gap-20 mb-16 lg:mb-24">
        <img src="/images/about-elipse.png" alt="" class="absolute top-0 left-0 lg:w-[800px]">
        <img src="/images/about.png" alt="О компании" class="lg:w-[768px] lg:absolute lg:left-10 lg:top-10 z-10">
        <div class="about-block-text lg:flex-1 max-w-[590px]">
          <h3 class="text-55 font-bebas  uppercase mb-6 lg:mb-8">О компании</h3>
          <div class="flex flex-col gap-6 text-20  leading-[175%]">
            <p>Gd ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam</p>
            <p>Kst, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatu</p>
          </div>
        </div>
      </div>
      <div class="about-block-features">
        <ul class="grid lg:grid-cols-3 gap-8 lg:gap-10">
          <li class="about-block-feature-item">
            <div class="flex flex-col items-center lg:items-start text-center lg:text-left">
              <div class="mb-6 flex items-center justify-center lg:justify-start">
                <img src="/images/about-1.png" alt="" class="w-full h-full object-cover">
              </div>
              <h5 class="text-25 font-bold  mb-4">Sed ut perspiciatis</h5>
              <p class="text-20  leading-[175%]">ed ut perspiciatis unde omnis i natus error sit voluptatem accusantium doloremque laudantium, totam rem</p>
            </div>
          </li>
          <li class="about-block-feature-item">
            <div class="flex flex-col items-center lg:items-start text-center lg:text-left">
              <div class="mb-6 flex items-center justify-center lg:justify-start">
                <img src="/images/about-2.png" alt="" class="w-full h-full object-cover">
              </div>
              <h5 class="text-25 font-bold  mb-4">Sed ut perspiciatis</h5>
              <p class="text-20  leading-[175%]">ed ut perspiciatis unde omnis i natus error sit voluptatem accusantium doloremque laudantium, totam rem</p>
            </div>
          </li>
          <li class="about-block-feature-item">
            <div class="flex flex-col items-center lg:items-start text-center lg:text-left">
              <div class="mb-6 flex items-center justify-center lg:justify-start">
                <img src="/images/about-3.png" alt="" class="w-full h-full object-cover">
              </div>
              <h5 class="text-25 font-bold  mb-4">Sed ut perspiciatis</h5>
              <p class="text-20  leading-[175%]">ed ut perspiciatis unde omnis i natus error sit voluptatem accusantium doloremque laudantium, totam rem</p>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </section>
</template>

<style scoped>
.about-block {
  background-image: url('/images/about-bg.png');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  position: relative;
  color: #fff;
  border-radius: 0 0 300px 0;
  }


@media (min-width: 1024px) {
  .about-block-content {
    flex-direction: row;
  }

  .about-block-image {
    flex: 0 0 auto;
  }
}
</style>

