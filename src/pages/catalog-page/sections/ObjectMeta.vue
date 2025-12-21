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
    class="mt-2 flex flex-wrap gap-3 text-xs text-slate-700"
  >
    <div>
      <span class="font-semibold">Книга:</span>
      {{ props.data.BookName }}
    </div>
    <div>
      <span class="font-semibold">Страница:</span>
      {{ props.data.PageTitle }}
    </div>
  </div>
</template>





