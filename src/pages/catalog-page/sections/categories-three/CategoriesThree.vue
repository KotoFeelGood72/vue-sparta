<script setup lang="ts">
import { onMounted, ref, provide } from 'vue'
import { useCatalogStore, useCatalogStoreRefs } from '@/stores/useCatalogStore'
import TreeNode from './TreeNode.vue'

const catalogStore = useCatalogStore()
const { rootItems } = useCatalogStoreRefs()

interface CatalogNode {
  id: number
  leaf?: boolean
  text?: string
  name?: string
  empty?: boolean
}

const props = defineProps<{
  selectedObjectId?: string | number
}>()

const emit = defineEmits<{
  (e: 'select-object', payload: CatalogNode): void
}>()

const loadingRoot = ref(false)
const loadingChildsId = ref<number | null>(null)
const error = ref<string | null>(null)

interface TreeBucket {
  folders: CatalogNode[]
  objects: CatalogNode[]
}

// по какому id уже что загружено: папки + объекты (из /parts/childs)
const childsByParent = ref<Record<number, TreeBucket>>({})
const expandedIds = ref<number[]>([])

const isExpanded = (id: number) => expandedIds.value.includes(id)

const saveExpandedToStorage = () => {
  localStorage.setItem('catalog_expanded_ids', JSON.stringify(expandedIds.value))
}

const loadExpandedFromStorage = (): number[] => {
  try {
    const stored = localStorage.getItem('catalog_expanded_ids')
    if (stored) {
      const ids = JSON.parse(stored)
      return Array.isArray(ids) ? ids.filter((id) => Number.isFinite(id)) : []
    }
  } catch (e) {
    console.error('Failed to load expanded ids from storage', e)
  }
  return []
}

const toggleNode = async (node: CatalogNode) => {
  const id = node.id as number

  // если это лист (leaf === true) — это уже объект, просто выбираем его
  if (node.leaf) {
    emit('select-object', node)
    return
  }

  // уже раскрыт — свернуть
  if (isExpanded(id)) {
    expandedIds.value = expandedIds.value.filter((x) => x !== id)
    saveExpandedToStorage()
    return
  }

  try {
    error.value = null

    // если по этому id ещё ничего не запрашивали — тянем детей
    if (!childsByParent.value[id]) {
      loadingChildsId.value = id

      const children = (await catalogStore.getChilds(String(id))) as CatalogNode[] | null

      const filteredChildren = (children || []).filter((c: CatalogNode) => !c.empty)

      childsByParent.value[id] = {
        folders: filteredChildren.filter((c) => !c.leaf),
        objects: filteredChildren.filter((c) => c.leaf),
      }
    }

    expandedIds.value.push(id)
    saveExpandedToStorage()
  } catch (e) {
    error.value = 'Не удалось загрузить подкатегории'
    console.error(e)
  } finally {
    loadingChildsId.value = null
  }
}

const loadRoot = async () => {
  try {
    loadingRoot.value = true
    error.value = null
    await catalogStore.fetchRoot()
  } catch (e) {
    error.value = 'Не удалось загрузить категории'
    console.error(e)
  } finally {
    loadingRoot.value = false
  }
}

const restoreExpandedFromStorage = async () => {
  const ids = loadExpandedFromStorage()
  const uniqueIds = Array.from(new Set(ids))

  // Сначала добавляем все id в expandedIds, чтобы они отображались как раскрытые
  expandedIds.value = [...uniqueIds]

  // Затем загружаем дочерние элементы для каждого id
  for (const id of uniqueIds) {
    try {
      // Если по этому id ещё ничего не загружено — загружаем детей
      if (!childsByParent.value[id]) {
        loadingChildsId.value = id

        const children = (await catalogStore.getChilds(String(id))) as CatalogNode[] | null

        const filteredChildren = (children || []).filter((c: CatalogNode) => !c.empty)

        childsByParent.value[id] = {
          folders: filteredChildren.filter((c) => !c.leaf),
          objects: filteredChildren.filter((c) => c.leaf),
        }
      }
    } catch (e) {
      console.error(`Failed to load children for id ${id}`, e)
      // Удаляем id из expandedIds, если не удалось загрузить
      expandedIds.value = expandedIds.value.filter((x) => x !== id)
    } finally {
      loadingChildsId.value = null
    }
  }
}

onMounted(async () => {
  await loadRoot()
  await restoreExpandedFromStorage()
})

const isSelected = (id: number) => {
  if (!props.selectedObjectId) return false
  return String(id) === String(props.selectedObjectId)
}

provide('catalogTree', {
  childsByParent,
  expandedIds,
  loadingChildsId,
  toggleNode,
  isExpanded,
  isSelected,
})
</script>

<template>
  <section class="h-full overflow-y-auto p-2 lg:p-2">
    <h3 class="mb-3 hidden text-sm font-semibold uppercase tracking-wide text-slate-500 lg:block">
      Каталог
    </h3>

    <div v-if="loadingRoot" class="text-sm text-slate-500">
      Загрузка категорий...
    </div>

    <div v-else-if="error" class="text-sm text-red-500">
      {{ error }}
    </div>

    <ul v-else class="list-none p-0 m-0">
      <TreeNode
        v-for="root in rootItems"
        :key="root.id"
        :node="root"
        :level="0"
      />
    </ul>
  </section>
</template>

