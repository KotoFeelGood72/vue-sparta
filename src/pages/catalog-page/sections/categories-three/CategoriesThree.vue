<script setup lang="ts">
import { onMounted, ref, provide } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import { useCatalogStore, useCatalogStoreRefs } from '@/stores/useCatalogStore'
import TreeNode from './TreeNode.vue'

const catalogStore = useCatalogStore()
const { rootItems } = useCatalogStoreRefs()

interface CatalogNode {
  id: number
  leaf?: boolean
  text?: string
  name?: string
}

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

const route = useRoute()
const router = useRouter()

const isExpanded = (id: number) => expandedIds.value.includes(id)

const syncOpenedToRoute = () => {
  const opened = expandedIds.value.join(',')
  router.replace({
    query: {
      ...route.query,
      opened: opened || undefined,
    },
  })
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
    syncOpenedToRoute()
    return
  }

  try {
    error.value = null

    // если по этому id ещё ничего не запрашивали — тянем детей
    if (!childsByParent.value[id]) {
      loadingChildsId.value = id

      const children = (await catalogStore.getChilds(String(id))) as CatalogNode[] | null

      childsByParent.value[id] = {
        folders: (children || []).filter((c) => !c.leaf),
        objects: (children || []).filter((c) => c.leaf),
      }
    }

    expandedIds.value.push(id)
    syncOpenedToRoute()
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

const restoreExpandedFromRoute = async () => {
  const openedParam = route.query.opened

  let ids: number[] = []

  if (typeof openedParam === 'string') {
    ids = openedParam
      .split(',')
      .map((v) => Number(v.trim()))
      .filter((v) => Number.isFinite(v))
  } else if (Array.isArray(openedParam)) {
    ids = openedParam
      .flatMap((part) =>
        String(part)
          .split(',')
          .map((v) => Number(v.trim())),
      )
      .filter((v) => Number.isFinite(v))
  }

  const uniqueIds = Array.from(new Set(ids))

  for (const id of uniqueIds) {
    // создаём минимальный объект-папку, чтобы toggleNode мог его раскрыть
    await toggleNode({ id, leaf: false } as CatalogNode)
  }
}

onMounted(async () => {
  await loadRoot()
  await restoreExpandedFromRoute()
})

provide('catalogTree', {
  childsByParent,
  expandedIds,
  loadingChildsId,
  toggleNode,
  isExpanded,
})
</script>

<template>
  <section class="h-[100dvh] overflow-auto rounded-2xl border border-slate-100 bg-white p-4 shadow-[0_18px_40px_rgba(15,23,42,0.04)]">
    <h3 class="mb-3 text-sm font-semibold uppercase tracking-wide text-slate-500">
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

