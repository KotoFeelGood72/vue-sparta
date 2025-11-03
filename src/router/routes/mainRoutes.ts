export const mainRoutes = [
  {
    path: '/',
    component: () => import('@/pages/main-page/MainPage.vue'),
    meta: {
      layout: 'default',
    },
  },
  {
    path: '/delivery',
    component: () => import('@/pages/delivery-page/DeliveryPage.vue'),
    meta: {
      layout: 'default',
      title: 'Экспресс- доставка',
      breadcrumbs: [
        { label: 'Главная', to: '/' },
        {
          label: 'Экспресс- доставка',
        },
      ],
    },
  },
]
