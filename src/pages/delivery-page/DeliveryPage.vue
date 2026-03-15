<script setup lang="ts">
import { onMounted, computed } from 'vue'
import AirIcon from '@/components/icons/AirIcon.vue'
import BlockForm from '@/components/shared/BlockForm.vue'
import { useDeliveryStore, useDeliveryStoreRefs } from '@/stores/useDeliveryStore'

const { fetchDelivery } = useDeliveryStore()
const { delivery } = useDeliveryStoreRefs()

const cardText = computed(() => {
  if (!delivery.value?.content?.rendered) return ''
  const parser = new DOMParser()
  const doc = parser.parseFromString(delivery.value.content.rendered, 'text/html')
  const blockquote = doc.querySelector('.wp-block-quote p, blockquote p')
  return blockquote?.textContent?.trim() ?? ''
})

const contentWithoutBlockquote = computed(() => {
  if (!delivery.value?.content?.rendered) return ''
  const parser = new DOMParser()
  const doc = parser.parseFromString(delivery.value.content.rendered, 'text/html')
  const blockquote = doc.querySelector('.wp-block-quote, blockquote')
  blockquote?.remove()
  return doc.body.innerHTML.trim()
})

onMounted(fetchDelivery)
</script>

<template>
  <div class="delivery-page">
    <div class="delivery-page__container container">
      <div class="delivery-page__card">
        <AirIcon class="delivery-page__card-icon" />
        <p v-if="cardText" class="delivery-page__card-text">
          {{ cardText }}
        </p>
      </div>
      <div
        v-if="contentWithoutBlockquote"
        class="delivery-page__description"
        v-html="contentWithoutBlockquote"
      />
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

<style scoped lang="scss">
.delivery-page {
  padding-top: 24px;

  &__container {
    margin-bottom: $m-sec;
  }

  &__card {
    display: flex;
    align-items: center;
    border-radius: 10px;
    padding: 16px 40px;
    gap: 16px;
    margin-bottom: 28px;
    background-image: url('/images/delivery-card.png');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
  }

  &__card-icon {
    flex-shrink: 0;
    width: 30px;
    height: 30px;
  }

  &__card-text {
    font-size: 22px;
    line-height: 100%;
    color: $color-white;
  }

  &__description {
    font-size: 18px;
    line-height: 140%;
    font-weight: 400;
  }
}
</style>
