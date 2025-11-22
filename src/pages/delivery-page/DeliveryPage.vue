<script setup lang="ts">
import AirIcon from '@/components/icons/AirIcon.vue';
import BlockForm from '@/components/shared/BlockForm.vue';
</script>

<template>
  <div class="delivery-page pt-6">
    <div class="container pb-28">
      <div class="delivery-card flex items-center rounded-[10px] py-4 px-10 gap-8 mb-7">
        <AirIcon/>
        <p class="text-32 text-white">Мы можем отправить авиа до их областного центра за 1-3 дня</p>
      </div>
      <p class="text-20 font-normal">st, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatu</p>
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
.delivery-card {
  background-image: url('/images/delivery-card.png');
}
</style>

