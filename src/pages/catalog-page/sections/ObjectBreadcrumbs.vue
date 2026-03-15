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
    class="object-breadcrumbs"
  >
    <span
      v-for="(crumb, index) in props.path"
      :key="crumb.id ?? index"
      class="object-breadcrumbs__item"
    >
      <span class="object-breadcrumbs__text">{{ crumb.text }}</span>
      <span
        v-if="index < props.path.length - 1"
        class="object-breadcrumbs__separator"
      >
        /
      </span>
    </span>
  </nav>
</template>

<style scoped lang="scss">
.object-breadcrumbs {
  display: flex;
  flex-wrap: wrap;
  gap: 4px;
  font-size: 12px;
  color: #64748b;

  &__item {
    display: flex;
    align-items: center;
  }

  &__text {
    display: inline-block;
  }

  &__separator {
    margin: 0 2px;
  }
}
</style>





