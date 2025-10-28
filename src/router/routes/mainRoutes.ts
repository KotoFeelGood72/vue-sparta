export const mainRoutes = [
  {
    path: '/',
    component: () => import('@/views/MainPage.vue'),
    meta: {
      layout: 'default',
    },
  },
]
