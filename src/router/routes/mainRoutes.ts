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
  {
    path: '/icons',
    component: () => import('@/pages/icons-page/IconsPage.vue'),
    meta: {
      layout: 'default',
      title: 'Иконки',
    },
  },
  {
    path: '/repair',
    component: () => import('@/pages/repair-page/RepairPage.vue'),
    meta: {
      layout: 'default',
      title: 'Ремонт',
    },
  },
  {
    path: '/repair/:id',
    component: () => import('@/pages/repair-page/RepairDetailPage.vue'),
    meta: {
      layout: 'default',
      title: 'Ремонт',
    },
  },
]
