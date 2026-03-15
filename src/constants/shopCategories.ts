export interface ShopCategory {
  id: string;
  title: string;
  slug: string;
}

export const SHOP_CATEGORIES: ShopCategory[] = [
  { id: '1', title: 'Запчасти по ДВС', slug: 'dvs' },
  { id: '2', title: 'Гидравлическая система', slug: 'hydraulic' },
  { id: '3', title: 'Топливная система', slug: 'fuel' },
  { id: '4', title: 'Турбины', slug: 'turbines' },
  { id: '5', title: 'Система охлаждения', slug: 'cooling' },
  { id: '6', title: 'Электрика', slug: 'electrics' },
  { id: '7', title: 'Фильтры', slug: 'filters' },
  { id: '8', title: 'Ремкомплекты', slug: 'repair-kits' },
  { id: '9', title: 'Навесное оборудование', slug: 'attachments' },
  { id: '10', title: 'Рамы', slug: 'frames' },
  { id: '11', title: 'Другое', slug: 'other' },
];

export function getShopCategoryTitleBySlug(slug: string): string | undefined {
  return SHOP_CATEGORIES.find((c) => c.slug === slug)?.title;
}
