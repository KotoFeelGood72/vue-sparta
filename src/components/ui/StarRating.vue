<script setup lang="ts">
import { computed } from 'vue';

const { rating = 5, maxRating = 5 } = defineProps<{
  rating?: number
  maxRating?: number
}>()

const getStarFill = (starIndex: number) => {
  return starIndex <= rating ? '#FDC043' : '#D9D9D9';
}
</script>

<template>
  <div class="star-rating">
    <svg
      v-for="star in maxRating"
      :key="star"
      width="20"
      height="20"
      viewBox="0 0 20 20"
      fill="none"
      xmlns="http://www.w3.org/2000/svg"
      class="star-rating__star"
    >
      <path
        d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z"
        :fill="getStarFill(star)"
        class="star-rating__path"
      />
    </svg>
  </div>
</template>

<style scoped lang="scss">
.star-rating {
  display: flex;
  align-items: center;
  gap: 4px;

  &__star {
    display: block;
  }

  &__path {
    // path styles
  }
}
</style>







