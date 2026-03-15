export const mainRoutes = [
  {
    path: '/',
    name: 'main',
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
    path: '/cart',
    component: () => import('@/pages/cart-page/CartPage.vue'),
    meta: {
      layout: 'default',
      title: 'Корзина',
      breadcrumbs: [
        { label: 'Главная', to: '/' },
        {
          label: 'Корзина',
        },
      ],
    },
  },
  {
    path: '/repair/:slug',
    component: () => import('@/pages/repair-page/RepairDetailPage.vue'),
    meta: {
      layout: 'default',
      title: 'Ремонт',
    },
  },
  {
    path: '/shop',
    component: () => import('@/pages/shop-page/ShopPage.vue'),
    meta: {
      layout: 'default',
      title: 'Топливная аппаратура',
      breadcrumbs: [
        { label: 'Главная', to: '/' },
        { label: 'Запчасти', to: '/shop' },
        { label: 'Топливная аппаратура' },
      ],
    },
  },
  {
    path: '/shop/:slug',
    component: () => import('@/pages/shop-page/ShopPage.vue'),
    meta: {
      layout: 'default',
      title: 'Категория товаров',
      breadcrumbs: [
        { label: 'Главная', to: '/' },
        { label: 'Запчасти', to: '/shop' },
        { label: 'Категория товаров' },
      ],
    },
  },
  {
    path: '/shop/:slug/:id',
    component: () => import('@/pages/product-page/ProductPage.vue'),
    meta: {
      layout: 'default',
      breadcrumbs: [
        { label: 'Главная', to: '/' },
        { label: 'Агрегаты', to: '/shop' },
        { label: 'Глушитель ЕК-12 312-04-03.50.600 (312040300 99)' },
      ],
    },
  },
  {
    path: '/agreement',
    component: () => import('@/pages/agreement-page/AgreementPage.vue'),
    meta: {
      layout: 'default',
      title: 'Пользовательское соглашение',
      breadcrumbs: [
        { label: 'Главная', to: '/' },
        { label: 'Пользовательское соглашение' },
      ],
    },
  },
  // Страница о компании
  {
    path: '/about',
    component: () => import('@/pages/about-page/AboutPage.vue'),
    meta: {
      layout: 'default',
      breadcrumbs: [
        { label: 'Главная', to: '/' },
        { label: 'О компании' },
      ],
    },
  },
  {
    path: '/contacts',
    component: () => import('@/pages/contacts-page/ContactsPage.vue'),
    meta: {
      layout: 'default',
    },
  },
  {
    path: '/catalog',
    name: 'catalog',
    component: () => import('@/pages/catalog-page/CatalogPage.vue'),
    meta: {
      layout: 'default',
    },
  },
  {
    path: '/category/:slug',
    component: () => import('@/pages/category-page/CategoryPage.vue'),
    meta: {
      layout: 'default',
      title: 'Категория',
      breadcrumbs: [
        { label: 'Главная', to: '/' },
        { label: 'Категория' },
      ],
    },
  },
  {
    path: '/:slug/:id',
    component: () => import('@/pages/product-page/ProductPage.vue'),
    meta: {
      layout: 'default',
      breadcrumbs: [
        { label: 'Главная', to: '/' },
        { label: 'Товар' },
      ],
    },
  },
  {
    path: '/manufacturer/:slug',
    component: () => import('@/pages/shop-page/ShopPage.vue'),
    meta: {
      layout: 'default',
      title: 'Производитель',
      breadcrumbs: [
        { label: 'Главная', to: '/' },
        { label: 'Производитель' },
      ],
    },
  },
]
