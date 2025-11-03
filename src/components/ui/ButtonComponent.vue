<script setup lang="ts">
import LoadingIcon from '../icons/LoadingIcon.vue';

export interface ButtonComponentModel {
  text: string
  size: 'small' | 'medium' | 'large'
  variant: 'primary' | 'secondary'
  loading?: boolean
}

const { text, size, variant, loading } = defineProps<ButtonComponentModel>();

</script>

<template>
  <div>
    <div class="loading" v-if="loading">
      <LoadingIcon/>
    </div>
    <span>{{ text }}</span>
  </div>
</template>
