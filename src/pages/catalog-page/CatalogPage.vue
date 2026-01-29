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
  <div class="catalog-page">
    <div class="catalog-page__container">
      <!-- Кнопка для открытия каталога на мобильных -->
      <button
        class="catalog-page__toggle-button"
        @click="toggleCatalog"
      >
        <span class="catalog-page__toggle-text">Каталог</span>
        <span class="catalog-page__toggle-icon">{{ isCatalogOpen ? '−' : '+' }}</span>
      </button>

      <div class="catalog-page__content">
        <!-- Overlay для мобильных -->
        <div
          v-if="isCatalogOpen"
          class="catalog-page__overlay"
          @click="isCatalogOpen = false"
        />

        <!-- Боковая панель каталога -->
        <div
          class="catalog-page__sidebar"
          :class="{
            'catalog-page__sidebar--open': isCatalogOpen,
          }"
        >
          <div class="catalog-page__sidebar-inner">
            <div class="catalog-page__sidebar-header">
              <h3 class="catalog-page__sidebar-title">Каталог</h3>
              <button
                class="catalog-page__sidebar-close"
                @click="isCatalogOpen = false"
              >
                ×
              </button>
            </div>
            <div class="catalog-page__sidebar-content">
              <CategoriesThree
                :selected-object-id="selectedLeaf?.id"
                @select-object="handleSelectObjectWithClose"
              />
            </div>
          </div>
        </div>

        <!-- Основной контент -->
        <div class="catalog-page__main">
          <div class="catalog-page__main-content">
            <div
              v-if="!selectedLeaf"
              class="catalog-page__empty"
            >
              Выберите объект (шестерёнку) слева или воспользуйтесь поиском сверху.
            </div>

            <div
              v-else
              class="catalog-page__object-content"
            >
              <h3 class="catalog-page__object-title">
                {{ selectedLeaf.text ?? selectedLeaf.name }}
              </h3>

              <div
                v-if="loadingObject"
                class="catalog-page__loading"
              >
                Загрузка содержимого...
              </div>

              <div
                v-else-if="error"
                class="catalog-page__error"
              >
                {{ error }}
              </div>

              <template v-else-if="objectDetails">
                <ObjectBreadcrumbs :path="objectDetails.path" />

                <div
                  v-if="objectDetails.part && objectDetails.part.length"
                  class="catalog-page__object-details"
                >
                  <div class="catalog-page__images-wrapper">
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
                  class="catalog-page__empty"
                >
                  Нет деталей для этого объекта
                </div>
              </template>

              <div
                v-else
                class="catalog-page__empty"
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

<style scoped lang="scss">
@import '@/styles/variables';

.catalog-page {
  &__container {
    max-width: 1187px;
    margin: 0 auto;
    padding: 0 16px;
    padding-top: 16px;
    padding-bottom: 32px;

    @media (min-width: 768px) {
      padding-top: 32px;
    }
  }

  &__toggle-button {
    margin-bottom: 16px;
    display: flex;
    width: 100%;
    align-items: center;
    justify-content: space-between;
    border-radius: 6px;
    background-color: $color-white;
    padding: 12px 16px;
    box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    border: none;
    cursor: pointer;

    @media (min-width: 1024px) {
      display: none;
    }
  }

  &__toggle-text {
    font-size: 14px;
    font-weight: 600;
    color: #334155;
  }

  &__toggle-icon {
    font-size: 18px;
  }

  &__content {
    display: flex;
    flex-direction: column;
    gap: 8px;
    background-color: $color-white;
    border-radius: 6px;
    padding: 8px;

    @media (min-width: 1024px) {
      flex-direction: row;
      height: 90dvh;
    }
  }

  &__overlay {
    position: fixed;
    inset: 0;
    z-index: 40;
    background-color: rgba(0, 0, 0, 0.5);

    @media (min-width: 1024px) {
      display: none;
    }
  }

  &__sidebar {
    position: fixed;
    left: 0;
    top: 0;
    z-index: 50;
    height: 100%;
    width: 320px;
    transform: translateX(-100%);
    background-color: $color-white;
    transition: transform 0.3s;

    @media (min-width: 1024px) {
      position: relative;
      z-index: auto;
      width: 25%;
      transform: none;
    }

    &--open {
      transform: translateX(0);
    }
  }

  &__sidebar-inner {
    display: flex;
    height: 100%;
    flex-direction: column;
  }

  &__sidebar-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 1px solid #e2e8f0;
    padding: 16px;

    @media (min-width: 1024px) {
      display: none;
    }
  }

  &__sidebar-title {
    font-size: 18px;
    font-weight: 600;
  }

  &__sidebar-close {
    font-size: 24px;
    background: transparent;
    border: none;
    cursor: pointer;
    padding: 0;
    line-height: 1;
  }

  &__sidebar-content {
    flex: 1;
    overflow: hidden;
  }

  &__main {
    display: flex;
    flex: 1;
    flex-direction: column;
    gap: 16px;
    min-height: 0;
  }

  &__main-content {
    min-height: 260px;
    flex: 1;
    overflow: auto;
    border-radius: 6px;

    @media (min-width: 1024px) {
      max-height: 100dvh;
    }
  }

  &__empty {
    font-size: 14px;
    color: #64748b;
  }

  &__object-content {
    display: flex;
    flex-direction: column;
    gap: 12px;
  }

  &__object-title {
    font-size: 16px;
    font-weight: 600;
    color: #0f172a;
  }

  &__loading {
    font-size: 14px;
    color: #64748b;
  }

  &__error {
    font-size: 14px;
    color: #ef4444;
  }

  &__object-details {
    margin-top: 8px;
    display: flex;
    flex-direction: column;
    gap: 16px;

    @media (min-width: 1024px) {
      display: grid;
      grid-template-columns: minmax(0, 1.1fr) minmax(0, 1fr);
    }
  }

  &__images-wrapper {
    @media (min-width: 1024px) {
      position: sticky;
      top: 16px;
      align-self: flex-start;
    }
  }
}
</style>
