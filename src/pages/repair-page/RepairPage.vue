<script setup lang="ts">
import RepairSection from '../main-page/sections/repair/RepairSection.vue'
import BlockForm from '@/components/shared/BlockForm.vue'
import { useRepairStore, useRepairStoreRefs } from '@/stores/useRepairStore'
import { onMounted } from 'vue'

const { fetchRepair } = useRepairStore()
const { repairs } = useRepairStoreRefs()

onMounted(async () => {
  await fetchRepair()
})
</script>

<template>
  <div class="repair-page">
    <RepairSection :repairs="repairs" header-hidden :slider-enabled="false">
      <template #bottom>
        <div class="repair-page__description">
          <p>
            Gd ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
            laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
            architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas
            sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione
            voluptatem sequi nesciunt. Neque porro quisquam
          </p>
          <p>
            Kst, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non
            numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat
            voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis
            suscipit laboriosam, nisi ut aliquid ex ea commodi consequatu
          </p>
        </div>
      </template>
    </RepairSection>
    <BlockForm
      image="/images/form-car.png"
      customClass="!right-0"
      title="закажите экспресс-доставку"
      subtitle="Если у Вас есть сложности с выбором товара или другие вопросы, то Вы можете получить консультацию у наших менеджеров
в рабочие часы компании."
      theme="white"
    />
  </div>
</template>

<style scoped lang="scss">
.repair-page {
  padding-top: 24px;

  &__description {
    font-size: 16px;
    line-height: 175%;
    font-weight: 400;
    padding-top: 40px;
    padding-bottom: $m-sec;
  }

  :deep(.repair-section) {
    @include bp($point_2) {
      padding: 0;
    }
  }
}
</style>
