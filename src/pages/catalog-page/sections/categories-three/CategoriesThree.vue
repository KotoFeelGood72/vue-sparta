<script setup lang="ts">
import { onMounted, ref, provide, watch } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import { useCatalogStore, useCatalogStoreRefs } from '@/stores/useCatalogStore'
import TreeNode from './TreeNode.vue'

const catalogStore = useCatalogStore()
const { rootItems } = useCatalogStoreRefs()
const route = useRoute()
const router = useRouter()

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

const syncExpandedToQuery = () => {
  const expandedParam = expandedIds.value.length > 0
    ? expandedIds.value.join(',')
    : undefined

  router.replace({
    query: {
      ...route.query,
      expanded: expandedParam,
    },
  })
}

const loadExpandedFromQuery = (): number[] => {
  const expandedParam = route.query.expanded
  if (typeof expandedParam === 'string' && expandedParam) {
    const ids = expandedParam
      .split(',')
      .map((id) => Number.parseInt(id.trim(), 10))
      .filter((id) => Number.isFinite(id) && id > 0)
    return Array.from(new Set(ids))
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
    syncExpandedToQuery()
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
    syncExpandedToQuery()
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

const restoreExpandedFromQuery = async () => {
  const ids = loadExpandedFromQuery()
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
      syncExpandedToQuery()
    } finally {
      loadingChildsId.value = null
    }
  }
}

// Синхронизация при изменении query параметров
watch(
  () => route.query.expanded,
  async (newExpanded) => {
    if (typeof newExpanded === 'string' && newExpanded) {
      const ids = newExpanded
        .split(',')
        .map((id) => Number.parseInt(id.trim(), 10))
        .filter((id) => Number.isFinite(id) && id > 0)
      const uniqueIds = Array.from(new Set(ids))

      // Обновляем expandedIds только если они отличаются
      const currentIds = expandedIds.value.sort((a, b) => a - b)
      const newIds = uniqueIds.sort((a, b) => a - b)
      if (JSON.stringify(currentIds) !== JSON.stringify(newIds)) {
        expandedIds.value = uniqueIds

        // Загружаем дочерние элементы для новых id
        for (const id of uniqueIds) {
          if (!childsByParent.value[id]) {
            try {
              loadingChildsId.value = id
              const children = (await catalogStore.getChilds(String(id))) as CatalogNode[] | null
              const filteredChildren = (children || []).filter((c: CatalogNode) => !c.empty)
              childsByParent.value[id] = {
                folders: filteredChildren.filter((c) => !c.leaf),
                objects: filteredChildren.filter((c) => c.leaf),
              }
            } catch (e) {
              console.error(`Failed to load children for id ${id}`, e)
            } finally {
              loadingChildsId.value = null
            }
          }
        }
      }
    } else if (!newExpanded && expandedIds.value.length > 0) {
      // Если параметр удален, очищаем expandedIds
      expandedIds.value = []
    }
  },
)

onMounted(async () => {
  await loadRoot()
  await restoreExpandedFromQuery()
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
  <section class="h-full overflow-y-auto">
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

