import axios from 'axios'

// Создаем экземпляр axios
// В dev режиме используем прокси из vite.config.ts (/api -> http://95.154.83.43/api)
// В production на Vercel используем rewrites из vercel.json (/api -> http://95.154.83.43/api)
// Если указана переменная окружения, используем её, иначе используем относительный путь /api
const api = axios.create({
  baseURL: import.meta.env.VITE_CATALOG_API_URL || '/api',
  timeout: 10000,
  headers: {
    'Content-Type': 'application/json',
  },
})

// Request interceptor - добавляем токен к каждому запросу
// api.interceptors.request.use(
//   (config) => {
//     const token = localStorage.getItem('auth_token')
//     console.log('🔑 Token from localStorage:', token ? 'Present' : 'Missing')

//     if (token) {
//       config.headers.Authorization = `Bearer ${token}`
//       console.log('✅ Token added to request headers')
//     } else {
//       console.log('❌ No token found, request will be sent without authorization')
//     }

//     console.log('📤 Request config:', {
//       url: config.url,
//       method: config.method,
//       headers: config.headers
//     })

//     return config
//   },
//   (error) => {
//     return Promise.reject(error)
//   }
// )

// Response interceptor - обрабатываем ответы
// api.interceptors.response.use(
//   (response) => {
//     return response
//   },
//   (error) => {
//     // Если получили 401 (Unauthorized), удаляем токен и перенаправляем на логин
//     if (error.response?.status === 401) {
//       localStorage.removeItem('auth_token')
//       // Перенаправляем на страницу входа
//       window.location.href = '/signin'
//     }

//     // Если получили 403 (Forbidden), показываем ошибку
//     if (error.response?.status === 403) {
//       console.error('Access denied')
//     }

//     return Promise.reject(error)
//   }
// )

export default api
