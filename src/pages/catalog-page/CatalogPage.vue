<script setup lang="ts">
import type { Ref } from 'vue'
import { ref, onMounted, watch } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import CategoriesThree from './sections/categories-three/CategoriesThree.vue'
import ObjectBreadcrumbs from './sections/ObjectBreadcrumbs.vue'
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
const isCatalogOpen = ref(false)

const isSelectedItem = (item: string | number | undefined) => {
  if (item === undefined || item === null) return false
  return selectedItems.value.includes(String(item))
}

const toggleCatalog = () => {
  isCatalogOpen.value = !isCatalogOpen.value
}

const handleSelectObjectWithClose = async (node: CatalogObjectDetails) => {
  await handleSelectObject(node)
  // Закрываем каталог на мобильных после выбора
  if (window.innerWidth < 1024) {
    isCatalogOpen.value = false
  }
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

const clearSelectedObject = () => {
  selectedLeaf.value = null
  objectDetails.value = null
  selectedItems.value = []
  error.value = null
  loadingObject.value = false
  syncSelectedObjectToRoute(undefined)
}

watch(
  () => route.query.object,
  async (objectId) => {
    if (typeof objectId === 'string' && objectId) {
      await handleSelectObject({ id: objectId } as CatalogObjectDetails)
    } else {
      clearSelectedObject()
    }
  },
)

onMounted(async () => {
  const objectId = route.query.object
  if (typeof objectId === 'string' && objectId) {
    await handleSelectObject({ id: objectId } as CatalogObjectDetails)
  }
})
</script>

<template>
  <div class="">
    <div class="container py-4 md:py-8">
      <!-- Кнопка для открытия каталога на мобильных -->
      <button
        class="mb-4 flex w-full items-center justify-between rounded-md bg-white px-4 py-3 shadow-sm lg:hidden"
        @click="toggleCatalog"
      >
        <span class="text-sm font-semibold text-slate-700">Каталог</span>
        <span class="text-lg">{{ isCatalogOpen ? '−' : '+' }}</span>
      </button>

      <div class="flex flex-col gap-2 bg-white rounded-md p-2 lg:flex-row lg:h-[90dvh]">
        <!-- Overlay для мобильных -->
        <div
          v-if="isCatalogOpen"
          class="fixed inset-0 z-40 bg-black/50 lg:hidden"
          @click="isCatalogOpen = false"
        />

        <!-- Боковая панель каталога -->
        <div
          class="fixed left-0 top-0 z-50 h-full w-80 transform bg-white transition-transform duration-300 lg:relative lg:z-auto lg:w-1/4 lg:transform-none"
          :class="{
            'translate-x-0': isCatalogOpen,
            '-translate-x-full': !isCatalogOpen,
          }"
        >
          <div class="flex h-full flex-col">
            <div class="flex items-center justify-between border-b p-4 lg:hidden">
              <h3 class="text-lg font-semibold">Каталог</h3>
              <button
                class="text-2xl"
                @click="isCatalogOpen = false"
              >
                ×
              </button>
            </div>
            <div class="flex-1 overflow-hidden">
              <CategoriesThree
                :selected-object-id="selectedLeaf?.id"
                @select-object="handleSelectObjectWithClose"
              />
            </div>
          </div>
        </div>

        <!-- Основной контент -->
        <div class="flex flex-1 flex-col gap-4 min-h-0">
          <div class="min-h-[260px] flex-1 overflow-auto rounded-md lg:max-h-[100dvh]">
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

              <div
                v-if="objectDetails.part && objectDetails.part.length"
                class="mt-2 flex flex-col gap-4 lg:grid lg:grid-cols-[minmax(0,1.1fr)_minmax(0,1fr)]"
              >
                <div class="lg:sticky lg:top-4 lg:self-start">
                  <ObjectImages
                    :images="objectDetails.image"
                    :is-selected-item="isSelectedItem"
                    :toggle-selected-item="toggleSelectedItem"
                  />
                </div>

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
