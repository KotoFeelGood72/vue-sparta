<script setup lang="ts">
import RepairSection from '../main-page/sections/repair/RepairSection.vue';
import BlockForm from '@/components/shared/BlockForm.vue';

const repairs = [
  {
    id: '1',
    slug: 'repair-1',
    image: '/images/repair-1.png',
    title: 'Ремонт ДВС и КПП',
  },
  {
    id: '2',
    slug: 'repair-2',
    image: '/images/repair-2.png',
    title: 'Ремонт гидравлики',
  },
  {
    id: '3',
    slug: 'repair-3',
    image: '/images/repair-3.png',
    title: 'Trade-in',
  },
]
</script>

<template>
  <div class="repair-page pt-6">
    <RepairSection :repairs="repairs">
      <template #bottom>
        <div>
          <p>Gd ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam</p>
          <p>Kst, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatu</p>
        </div>
      </template>
    </RepairSection>
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

