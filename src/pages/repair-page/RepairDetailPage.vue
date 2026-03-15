<script setup lang="ts">
import BlockForm from '@/components/shared/BlockForm.vue'
import { useRepairStore, useRepairStoreRefs } from '@/stores/useRepairStore'
import { useRoute } from 'vue-router'
import { onMounted, watch } from 'vue'

const route = useRoute()
const { fetchRepairBySlug } = useRepairStore()
const { repair } = useRepairStoreRefs()

const loadRepair = async () => {
  const slug = route.params.slug
  if (typeof slug === 'string') {
    await fetchRepairBySlug(slug)
  }
}

onMounted(loadRepair)
watch(() => route.params.slug, loadRepair)
</script>

<template>
  <div class="repair-detail-page">
    <div class="repair-detail-page__container container">
      <div class="repair-detail-page__content">
        <div class="repair-detail-page__image-wrapper">
          <img :src="repair?.featured_media.source_url" alt="" class="repair-detail-page__image" />
        </div>
        <div class="repair-detail-page__text">
          <p class="repair-detail-page__paragraph" v-html="repair?.content.rendered" />
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

<style scoped lang="scss">
.repair-detail-page {
  padding-top: 24px;

  &__content {
    margin-bottom: $m-sec;
    display: flex;
    align-items: center;
    border-radius: 10px;
    overflow: hidden;
    flex-direction: column;
    height: 400px;
    background-color: $color-dark;

    @media (min-width: 1024px) {
      flex-direction: row;
    }

    @include bp($point_2) {
      height: auto;
    }
  }

  &__image-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    flex: 1;
  }

  &__image {
    display: block;
    width: 100%;
    height: auto;

    @media (min-width: 1024px) {
      width: auto;
      height: 100%;
    }
  }

  &__text {
    background-color: $color-gray;
    color: $color-white;
    height: 100%;
    display: flex;
    flex-direction: column;
    padding: 20px;
    width: 100%;
    font-size: 16px;
    line-height: 160%;
    font-weight: 400;
    gap: 16px;
  }

  &__paragraph {
    margin: 0;
    font-size: inherit;
    line-height: inherit;
  }
}
</style>
