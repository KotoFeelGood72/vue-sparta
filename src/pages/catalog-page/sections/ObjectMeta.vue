<script setup lang="ts">
interface ObjectMetaData {
  BookName?: string
  PageTitle?: string
}

const props = defineProps<{
  data?: ObjectMetaData | null
}>()
</script>

<template>
  <div
    v-if="props.data"
    class="object-meta"
  >
    <div class="object-meta__item">
      <span class="object-meta__label">Книга:</span>
      {{ props.data.BookName }}
    </div>
    <div class="object-meta__item">
      <span class="object-meta__label">Страница:</span>
      {{ props.data.PageTitle }}
    </div>
  </div>
</template>

<style scoped lang="scss">
// @use '@/styles/variables' as *;

.object-meta {
  margin-top: 8px;
  display: flex;
  flex-wrap: wrap;
  gap: 12px;
  font-size: 12px;
  color: #334155;

  &__item {
    display: inline-block;
  }

  &__label {
    font-weight: 600;
  }
}
</style>





