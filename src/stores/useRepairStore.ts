import { defineStore, storeToRefs } from 'pinia'
import { wpRepair } from '@/api/wpApi'
import { ref } from 'vue'

export const useRepairStore = defineStore('repair', () => {
  const repair = ref<any | null>(null)
  const repairs = ref<any[]>([])

  const fetchRepair = async () => {
    try {
      const response = await wpRepair.getList()
      repairs.value = response.data
    } catch (error) {
      console.error(error)
    }
  }

  const fetchRepairBySlug = async (slug: string) => {
    try {
      const response = await wpRepair.getBySlug(slug)
      repair.value = response.data[0]
    } catch (error) {
      console.error(error)
    }
  }

  return {
    repair,
    repairs,
    fetchRepair,
    fetchRepairBySlug,
  }
})

export const useRepairStoreRefs = () => storeToRefs(useRepairStore())
