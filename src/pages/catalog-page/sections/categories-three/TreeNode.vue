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
  <li class="tree-node">
    <div
      class="tree-node__item"
      :class="{
        'tree-node__item--selected': tree.isSelected(node.id),
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
          class="tree-node__connector"
          :style="{ left: `${(level - 1) * 16}px` }"
        />
      </template>

      <span class="tree-node__expand-icon">
        <template v-if="!node.top">
          {{ tree.isExpanded(node.id) ? '−' : '+' }}
        </template>
      </span>
      <span v-if="!node.top" class="tree-node__folder-icon">📁</span>
      <span v-else class="tree-node__object-icon">⚙️</span>
      <span class="tree-node__text">
        {{ node.text ?? node.name ?? 'Категория' }}
      </span>
    </div>

    <div
      v-if="tree.loadingChildsId.value === node.id"
      class="tree-node__loading"
      :style="{
        paddingLeft: `${((level ?? 0) + 1) * 16 + 8}px`,
        borderLeft: '1px solid #cbd5e1',
      }"
    >
      Загрузка...
    </div>

    <ul
      v-if="!node.top && tree.isExpanded(node.id)"
      class="tree-node__children"
    >
      <!-- Вертикальная линия для дочерних элементов -->
      <div
        v-if="(bucket.folders.length > 0 || bucket.objects.length > 0) && level !== undefined"
        class="tree-node__vertical-line"
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
        class="tree-node__object-item"
      >
        <div
          class="tree-node__item tree-node__item--object"
          :class="{
            'tree-node__item--selected': tree.isSelected(obj.id),
          }"
          :style="{
            paddingLeft: `${((level ?? 0) + 1) * 16 + 4}px`,
            borderLeft: '1px solid #cbd5e1',
          }"
          @click.stop="tree.toggleNode(obj)"
        >
          <!-- Горизонтальная соединительная линия -->
          <div
            class="tree-node__connector"
            :style="{ left: `${(level ?? 0) * 16}px` }"
          />

          <span class="tree-node__expand-icon"></span>
          <span class="tree-node__object-icon">⚙️</span>
          <span class="tree-node__text">
            {{ obj.text ?? obj.name ?? 'Объект' }}
          </span>
        </div>
      </li>
    </ul>
  </li>
</template>

<style scoped lang="scss">
// @use '@/styles/variables' as *;

.tree-node {
  margin: 0;
  position: relative;

  &__item {
    display: flex;
    cursor: pointer;
    align-items: center;
    gap: 2px;
    border-radius: 4px;
    padding: 0 4px;
    font-size: 11px;
    position: relative;
    transition: background-color 0.2s;

    &:hover {
      background-color: #f1f5f9;
    }

    &--selected {
      background-color: #f0fdfa;
      color: #0f766e;
      font-weight: 600;
    }

    &--object {
      &:hover {
        background-color: #f8fafc;
      }
    }
  }

  &__connector {
    position: absolute;
    left: 0;
    top: 50%;
    height: 1px;
    width: 12px;
    background-color: #cbd5e1;
    transform: translateY(-50%);
  }

  &__expand-icon {
    display: inline-block;
    width: 12px;
    text-align: center;
    font-size: 10px;
    font-weight: 600;
    position: relative;
    z-index: 10;
  }

  &__folder-icon,
  &__object-icon {
    width: 12px;
    font-size: 12px;
    position: relative;
    z-index: 10;
  }

  &__text {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    font-size: 11px;
    position: relative;
    z-index: 10;
  }

  &__loading {
    margin-top: 2px;
    font-size: 10px;
    color: #94a3b8;
    position: relative;
  }

  &__children {
    margin: 0;
    list-style: none;
    padding: 0;
    position: relative;
  }

  &__vertical-line {
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 1px;
    background-color: #cbd5e1;
  }

  &__object-item {
    margin: 0;
    position: relative;
  }
}
</style>



