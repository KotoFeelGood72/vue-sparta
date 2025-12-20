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
  <li class="my-0 relative">
    <div
      class="flex cursor-pointer items-center gap-0.5 rounded px-1 py-0 text-[11px] hover:bg-slate-100 relative"
      :class="{
        'bg-teal-50 text-teal-700 font-semibold': tree.isSelected(node.id),
      }"
      :style="{
        paddingLeft: level && level > 0 ? `${level * 16 + 4}px` : '0',
        borderLeft: level && level > 0 ? '1px solid #cbd5e1' : 'none',
      }"
      @click="tree.toggleNode(node)"
    >
      <!-- Горизонтальная соединительная линия -->
      <template v-if="level && level > 0">
        <div
          class="absolute left-0 top-1/2 h-px w-3 bg-slate-300"
          :style="{ left: `${(level - 1) * 16}px` }"
        />
      </template>

      <span class="inline-block w-3 text-center text-[10px] font-semibold relative z-10">
        <template v-if="!node.leaf">
          {{ tree.isExpanded(node.id) ? '−' : '+' }}
        </template>
      </span>
      <span v-if="!node.leaf" class="w-3 text-[12px] relative z-10">📁</span>
      <span v-else class="w-3 text-[12px] relative z-10">⚙️</span>
      <span class="truncate text-[11px] relative z-10">
        {{ node.text ?? node.name ?? 'Категория' }}
      </span>
    </div>

    <div
      v-if="tree.loadingChildsId.value === node.id"
      class="mt-0.5 text-[10px] text-slate-400 relative"
      :style="{
        paddingLeft: `${((level ?? 0) + 1) * 16 + 8}px`,
        borderLeft: '1px solid #cbd5e1',
      }"
    >
      Загрузка...
    </div>

    <ul
      v-if="!node.leaf && tree.isExpanded(node.id)"
      class="my-0 list-none p-0 relative"
    >
      <!-- Вертикальная линия для дочерних элементов -->
      <div
        v-if="(bucket.folders.length > 0 || bucket.objects.length > 0) && level !== undefined"
        class="absolute left-0 top-0 bottom-0 w-px bg-slate-300"
        :style="{ left: `${(level ?? 0) * 16 + 8}px` }"
      />

      <!-- папки -->
      <TreeNode
        v-for="(folder, index) in bucket.folders"
        :key="`f-${folder.id ?? folder.code ?? JSON.stringify(folder)}`"
        :node="folder"
        :level="(level ?? 0) + 1"
      />

      <!-- объекты (leaf: true) -->
      <li
        v-for="obj in bucket.objects"
        :key="`o-${obj.id ?? obj.code ?? JSON.stringify(obj)}`"
        class="my-0 relative"
      >
        <div
          class="flex items-center gap-0.5 rounded px-1 py-0 text-[11px] hover:bg-slate-50 relative"
          :class="{
            'bg-teal-50 text-teal-700 font-semibold': tree.isSelected(obj.id),
          }"
          :style="{
            paddingLeft: `${((level ?? 0) + 1) * 16 + 4}px`,
            borderLeft: '1px solid #cbd5e1',
          }"
          @click.stop="tree.toggleNode(obj)"
        >
          <!-- Горизонтальная соединительная линия -->
          <div
            class="absolute left-0 top-1/2 h-px w-3 bg-slate-300"
            :style="{ left: `${(level ?? 0) * 16}px` }"
          />

          <span class="inline-block w-3 relative z-10" />
          <span class="w-3 text-[12px] relative z-10">⚙️</span>
          <span class="truncate text-[11px] relative z-10">
            {{ obj.text ?? obj.name ?? 'Объект' }}
          </span>
        </div>
      </li>
    </ul>
  </li>
</template>



