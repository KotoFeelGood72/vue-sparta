<script setup lang="ts">
// eslint-disable-next-line @typescript-eslint/no-explicit-any
type AnyFn = (value: any) => void | boolean

const props = defineProps<{
  // eslint-disable-next-line @typescript-eslint/no-explicit-any
  images?: any[] | null
  isSelectedItem: AnyFn
  toggleSelectedItem: AnyFn
}>()
</script>

<template>
  <div
    v-if="props.images && props.images.length"
    class="relative overflow-auto rounded-lg bg-slate-50 p-2"
  >
    <div
      v-for="img in props.images"
      :key="img.PicNum"
      class="relative w-full overflow-hidden"
    >
      <img
        class="block h-auto max-w-full"
        :src="`https://klaxon-parts.ru/img/${img.BookDir}/${img.PicName}`"
        alt=""
      >

      <button
        v-for="(label, idx) in img.labels"
        :key="idx"
        type="button"
        class="absolute flex h-5 w-5 -translate-x-1/2 -translate-y-1/2 items-center justify-center rounded-full border border-teal-700 bg-white text-[10px] font-semibold text-teal-700 outline-none transition-colors hover:bg-teal-700 hover:text-white"
        :style="{
          left: (Number(label.LabelX1) / Number(img.SrcPicWidth)) * 100 + '%',
          top: (Number(label.LabelY1) / Number(img.SrcPicHeight)) * 100 + '%',
        }"
        :class="{
          'bg-teal-700 text-white': props.isSelectedItem(label.sLabel),
        }"
        @click.stop="props.toggleSelectedItem(label.sLabel)"
      >
        {{ label.sLabel }}
      </button>
    </div>
  </div>
</template>



