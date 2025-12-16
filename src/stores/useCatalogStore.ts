import { defineStore, storeToRefs } from 'pinia'
import type { CategoryRootItem } from '@/entities/catalog-entities'
import { ref } from 'vue'
import api from '@/api/api'

export const useCatalogStore = defineStore('catalog', () => {

  const rootItems = ref<CategoryRootItem[]>([])


  // GET /api/parts/root
  const fetchRoot = async () => {
    const response = await api.get('/parts/root')
    rootItems.value = (response.data || []).filter((item: any) => !item.empty)
  }

  // GET /api/parts/childs/{parent_id}
  const getChilds = async (parent_id: string) => {
    const response = await api.get(`/parts/childs/${parent_id}`)
    return response.data
  }


  // GET /api/parts/object/{obj_id}
  const getObject = async (obj_id: string) => {
    const response = await api.get(`/parts/object/${obj_id}`)
    return response.data
  }


  // GET /api/parts/search
  const search = async (query: string) => {
    const response = await api.get(`/parts/search?query=${query}`)
    return response.data
  }

  return {
    fetchRoot,
    getChilds,
    getObject,
    search,

    rootItems,
  }
})

export const useCatalogStoreRefs = () => storeToRefs(useCatalogStore())
