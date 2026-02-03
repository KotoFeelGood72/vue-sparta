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
    class="object-images"
  >
    <div
      v-for="img in props.images"
      :key="img.PicNum"
      class="object-images__image-wrapper"
    >
      <img
        class="object-images__image"
        :src="`https://klaxon-parts.ru/img/${img.BookDir}/${img.PicName}`"
        alt=""
      >

      <button
        v-for="(label, idx) in img.labels"
        :key="idx"
        type="button"
        class="object-images__label-button"
        :class="{
          'object-images__label-button--active': props.isSelectedItem(label.sLabel),
        }"
        :style="{
          left: (Number(label.LabelX1) / Number(img.SrcPicWidth)) * 100 + '%',
          top: (Number(label.LabelY1) / Number(img.SrcPicHeight)) * 100 + '%',
        }"
        @click.stop="props.toggleSelectedItem(label.sLabel)"
      >
        {{ label.sLabel }}
      </button>
    </div>
  </div>
</template>

<style scoped lang="scss">
.object-images {
  position: relative;
  overflow: auto;
  border-radius: 8px;
  background-color: #f8fafc;
  padding: 8px;

  &__image-wrapper {
    position: relative;
    width: 100%;
    overflow: hidden;
  }

  &__image {
    display: block;
    height: auto;
    max-width: 100%;
  }

  &__label-button {
    position: absolute;
    display: flex;
    height: 20px;
    width: 20px;
    transform: translate(-50%, -50%);
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    border: 1px solid #0f766e;
    background-color: $color-white;
    font-size: 10px;
    font-weight: 600;
    color: #0f766e;
    outline: none;
    transition: background-color 0.2s, color 0.2s;
    cursor: pointer;

    &:hover {
      background-color: #0f766e;
      color: $color-white;
    }

    &--active {
      background-color: #0f766e;
      color: $color-white;
    }
  }
}
</style>





