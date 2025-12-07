<script setup lang="ts">
import BlockForm from '@/components/shared/BlockForm.vue';

</script>

<template>
  <div class="repair-page lg:pt-6">
    <div class="container lg:pb-24">
      <div class="flex items-center rounded-[10px] overflow-hidden lg:h-[493px]">
        <div class="flex items-center justify-center flex-shrink-0">
          <img src="/images/repair-detail.png" alt="">
        </div>
        <div class="lg:p-10 bg-gray text-white h-full lg:text-20 lg:leading-[175%] flex flex-col lg:gap-5">
          <p>Gd ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam
          </p>
          <p>
    Kst, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatu</p>
        </div>
      </div>
    </div>
    <BlockForm
      image="/images/form-one.png"
      title="закажите экспресс-доставку"
      subtitle="Если у Вас есть сложности с выбором товара или другие вопросы, то Вы можете получить консультацию у наших менеджеров
в рабочие часы компании."
      theme="white"
    />
  </div>
</template>

<style scoped>

</style>

