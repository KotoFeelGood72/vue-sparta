import axios from 'axios'

const WP_BASE = 'http://kotenkxj.beget.tech/wp-json/wp/v2'

const wpApi = axios.create({
  baseURL: WP_BASE,
  timeout: 10000,
  headers: {
    'Content-Type': 'application/json',
  },
})

export const wpPages = {
  getById (id: number) {
    return wpApi.get(`/pages/${id}`)
  },

  getBySlug(slug: string) {
    return wpApi.get(`/pages`, { params: { slug } })
  },

  getList(params?: Record<string, unknown>) {
    return wpApi.get('/pages', { params })
  },
}

export const wpBrands = {
  getList(params?: Record<string, unknown>) {
    return wpApi.get('/brands', { params })
  },

  getBySlug(slug: string) {
    return wpApi.get('/brands', { params: { slug } })
  },

  getById(id: number) {
    return wpApi.get(`/brands/${id}`)
  },
}

export const wpRepair = {
  getList(params?: Record<string, unknown>) {
    return wpApi.get('/repair', { params })
  },

  getBySlug(slug: string) {
    return wpApi.get('/repair', { params: { slug } })
  },

  getById(id: number) {
    return wpApi.get(`/repair/${id}`)
  },
}

export default wpApi
