<script setup lang="ts">
import type { Ref } from 'vue'
import { ref, onMounted } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import CategoriesThree from './sections/categories-three/CategoriesThree.vue'
import ObjectBreadcrumbs from './sections/ObjectBreadcrumbs.vue'
import ObjectMeta from './sections/ObjectMeta.vue'
import ObjectImages from './sections/ObjectImages.vue'
import ObjectPartsTable from './sections/ObjectPartsTable.vue'

import type { CategoryRootItem } from '@/entities/catalog-entities'
import { useCatalogStore } from '@/stores/useCatalogStore'

defineSlots<{
  // eslint-disable-next-line @typescript-eslint/no-explicit-any
  item(props: { item: CategoryRootItem; level: number }): any
}>()

const catalogStore = useCatalogStore()
const route = useRoute()
const router = useRouter()

interface CatalogObjectDetails {
  id?: string | number
  text?: string
  name?: string
  path?: Array<{ id?: string | number; text?: string }>
  data?: {
    BookName?: string
    PageTitle?: string
  } | null
  image?: Array<{
    PicNum?: string | number
    BookDir?: string
    PicName?: string
    SrcPicWidth?: string | number
    SrcPicHeight?: string | number
    labels: Array<{
      LabelX1: string | number
      LabelY1: string | number
      sLabel: string | number
    }>
  }> | null
  part?: Array<{
    data_id?: string | number
    number?: string
    name?: string
    item?: string | number
    options?: string[]
  }> | null
}

const selectedLeaf: Ref<CatalogObjectDetails | null> = ref(null)
const objectDetails: Ref<CatalogObjectDetails | null> = ref(null)
const loadingObject = ref(false)
const error = ref<string | null>(null)

const selectedItems = ref<string[]>([])

const isSelectedItem = (item: string | number | undefined) => {
  if (item === undefined || item === null) return false
  return selectedItems.value.includes(String(item))
}

const toggleSelectedItem = (item: string | number | undefined) => {
  if (item === undefined || item === null) return
  const key = String(item)
  const idx = selectedItems.value.indexOf(key)
  if (idx === -1) {
    selectedItems.value.push(key)
  } else {
    selectedItems.value.splice(idx, 1)
  }
}

const syncSelectedObjectToRoute = (id?: string | number) => {
  router.replace({
    query: {
      ...route.query,
      object: id ? String(id) : undefined,
    },
  })
}

const handleSelectObject = async (node: CatalogObjectDetails) => {
  selectedLeaf.value = node
  if (node.id !== undefined) {
    syncSelectedObjectToRoute(node.id)
  }
  loadingObject.value = true
  error.value = null
  objectDetails.value = null
  selectedItems.value = []

  try {
    const data = await catalogStore.getObject(String(node.id))
    objectDetails.value = data
  } catch (e) {
    error.value = 'Не удалось загрузить данные объекта'
    console.error(e)
  } finally {
    loadingObject.value = false
  }
}

onMounted(async () => {
  const objectId = route.query.object
  if (typeof objectId === 'string' && objectId) {
    await handleSelectObject({ id: objectId } as CatalogObjectDetails)
  }
})
</script>

<template>
  <div class="min-h-[100dvh] bg-slate-50">
    <div class="container py-8">

      <div class="grid gap-6 lg:grid-cols-[320px_minmax(0,1fr)]">
        <div class="min-w-0">
          <CategoriesThree @select-object="handleSelectObject" />
        </div>

        <div class="flex flex-col gap-4">
          <div class="min-h-[260px] max-h-[100dvh] overflow-auto rounded-2xl border border-slate-100 bg-white p-4 shadow-[0_18px_40px_rgba(15,23,42,0.04)] md:p-5">
          <div
            v-if="!selectedLeaf"
            class="text-sm text-slate-500"
          >
            Выберите объект (шестерёнку) слева или воспользуйтесь поиском сверху.
          </div>

          <div
            v-else
            class="flex flex-col gap-3"
          >
            <h3 class="text-base font-semibold text-slate-900">
              {{ selectedLeaf.text ?? selectedLeaf.name }}
            </h3>

            <div
              v-if="loadingObject"
              class="text-sm text-slate-500"
            >
              Загрузка содержимого...
            </div>

            <div
              v-else-if="error"
              class="text-sm text-red-500"
            >
              {{ error }}
            </div>

            <template v-else-if="objectDetails">
              <ObjectBreadcrumbs :path="objectDetails.path" />
              <ObjectMeta :data="objectDetails.data" />

              <div
                v-if="objectDetails.part && objectDetails.part.length"
                class="mt-2 grid gap-4 lg:grid-cols-[minmax(0,1.1fr)_minmax(0,1fr)]"
              >
                <ObjectImages
                  :images="objectDetails.image"
                  :is-selected-item="isSelectedItem"
                  :toggle-selected-item="toggleSelectedItem"
                />

                <ObjectPartsTable
                  :rows="objectDetails.part"
                  :is-selected-item="isSelectedItem"
                  :toggle-selected-item="toggleSelectedItem"
                />
              </div>

              <div
                v-else
                class="text-sm text-slate-500"
              >
                Нет деталей для этого объекта
              </div>
            </template>

            <div
              v-else
              class="text-sm text-slate-500"
            >
              Нет данных по этому объекту
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</template>
