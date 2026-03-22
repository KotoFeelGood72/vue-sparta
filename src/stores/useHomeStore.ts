import { defineStore, storeToRefs } from 'pinia'
import { wpPages, wpBrands } from '@/api/wpApi'
import { ref } from 'vue'

export const useHomeStore = defineStore('home', () => {
  const home = ref<any | null>(null)
  const brands = ref<any[]>([])

  const fetchHome = async () => {
    try {
      const response = await wpPages.getById(238295)
      home.value = response.data
    } catch (error) {
      console.error(error)
    }
  }

  const fetchBrands = async () => {
    const response = await wpBrands.getList()
    brands.value = response.data
  }

  return {
    home,
    fetchHome,
    fetchBrands,
    brands,
  }
})

export const useHomeStoreRefs = () => storeToRefs(useHomeStore())
