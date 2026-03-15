import { defineStore, storeToRefs } from 'pinia'
import { useMediaQuery } from '@vueuse/core'

export const useMediaStore = defineStore('media-store', () => {
  const isMobile = useMediaQuery('(max-width: 480px)')
  const isTablet = useMediaQuery('(min-width: 481px) and (max-width: 920px)')
  const isDesktop = useMediaQuery('(min-width: 921px)')

  return { isMobile, isTablet, isDesktop }
})


export const useMediaStoreRefs = () => storeToRefs(useMediaStore())
