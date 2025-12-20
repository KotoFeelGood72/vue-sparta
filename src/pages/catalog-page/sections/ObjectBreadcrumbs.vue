<script setup lang="ts">
interface Crumb {
  id?: string | number
  text?: string
}

const props = defineProps<{
  path?: Crumb[] | null
}>()
</script>

<template>
  <nav
    v-if="props.path && props.path.length"
    class="flex flex-wrap gap-1 text-xs text-slate-500"
  >
    <span
      v-for="(crumb, index) in props.path"
      :key="crumb.id ?? index"
      class="flex items-center"
    >
      <span>{{ crumb.text }}</span>
      <span
        v-if="index < props.path.length - 1"
        class="mx-0.5"
      >
        /
      </span>
    </span>
  </nav>
</template>




