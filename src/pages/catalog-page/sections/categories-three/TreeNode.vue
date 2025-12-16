<script setup lang="ts">
import { computed, inject } from 'vue'

type TreeBucket = {
  folders: any[]
  objects: any[]
}

const props = defineProps<{
  node: any
  level?: number
}>()

const tree = inject<{
  childsByParent: { value: Record<number, TreeBucket> }
  expandedIds: { value: number[] }
  loadingChildsId: { value: number | null }
  toggleNode: (node: any) => void | Promise<void>
  isExpanded: (id: number) => boolean
  isSelected: (id: number) => boolean
}>('catalogTree')

if (!tree) {
  throw new Error('TreeNode must be used inside CategoriesThree (catalogTree not provided)')
}

const bucket = computed<TreeBucket>(() => {
  return tree.childsByParent.value[props.node.id] || { folders: [], objects: [] }
})
</script>

<template>
  <li class="my-0.5">
    <div
      class="flex cursor-pointer items-center gap-1 rounded px-1 py-0.5 text-sm hover:bg-slate-100"
      :class="{
        'bg-teal-50 text-teal-700 font-semibold': tree.isSelected(node.id),
      }"
      :style="{ marginLeft: `${(level ?? 0) * 8}px` }"
      @click="tree.toggleNode(node)"
    >
      <span class="inline-block w-4 text-center text-xs font-semibold">
        <template v-if="!node.leaf">
          {{ tree.isExpanded(node.id) ? '−' : '+' }}
        </template>
      </span>
      <span v-if="!node.leaf" class="w-4">📁</span>
      <span v-else class="w-4">⚙️</span>
      <span class="truncate text-xs">
        {{ node.text ?? node.name ?? 'Категория' }}
      </span>
    </div>

    <div
      v-if="tree.loadingChildsId.value === node.id"
      class="ml-6 mt-1 text-xs text-slate-400"
    >
      Загрузка...
    </div>

    <ul
      v-if="!node.leaf && tree.isExpanded(node.id)"
      class="my-0.5 list-none p-0"
    >
      <!-- папки -->
      <TreeNode
        v-for="folder in bucket.folders"
        :key="`f-${folder.id ?? folder.code ?? JSON.stringify(folder)}`"
        :node="folder"
        :level="(level ?? 0) + 1"
      />

      <!-- объекты (leaf: true) -->
      <li
        v-for="obj in bucket.objects"
        :key="`o-${obj.id ?? obj.code ?? JSON.stringify(obj)}`"
      class="my-0.5"
      >
        <div
          class="ml-6 flex items-center gap-1 rounded px-1 py-0.5 text-sm hover:bg-slate-50"
          :class="{
            'bg-teal-50 text-teal-700 font-semibold': tree.isSelected(obj.id),
          }"
          @click.stop="tree.toggleNode(obj)"
        >
          <span class="inline-block w-4" />
          <span class="w-4">⚙️</span>
          <span class="truncate text-xs">
            {{ obj.text ?? obj.name ?? 'Объект' }}
          </span>
        </div>
      </li>
    </ul>
  </li>
</template>



