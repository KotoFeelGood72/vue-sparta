import { defineStore, storeToRefs } from 'pinia'
import { wpPages } from '@/api/wpApi'
import { ref } from 'vue'

export const useDeliveryStore = defineStore('delivery', () => {
  const delivery = ref<any | null>(null)

  const fetchDelivery = async () => {
    try {
      const response = await wpPages.getById(48)
      delivery.value = response.data
    } catch (error) {
      console.error(error)
    }
  }

  return {
    delivery,
    fetchDelivery,
  }
})

export const useDeliveryStoreRefs = () => storeToRefs(useDeliveryStore())
