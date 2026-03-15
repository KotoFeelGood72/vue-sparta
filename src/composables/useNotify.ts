import { useNotification } from '@kyvg/vue3-notification'

/**
 * Composable для показа уведомлений (обёртка над useNotification).
 *
 * @example
 * const { notify } = useNotify()
 * notify({ title: 'Готово', text: 'Данные сохранены', type: 'success' })
 * notify('Просто текст')
 */
export function useNotify() {
  return useNotification()
}
