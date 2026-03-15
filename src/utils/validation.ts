/** Минимальная длина телефона (цифры) */
const PHONE_MIN_DIGITS = 10

/** Регулярка: только цифры в телефоне */
const PHONE_DIGITS_REGEX = /^\d+$/

function trim(value: string): string {
  return (value ?? '').trim()
}

/** Поле обязательно к заполнению */
export function isRequired(value: string): boolean {
  return trim(value).length > 0
}

/** Валидация телефона: только цифры, минимум PHONE_MIN_DIGITS */
export function isPhone(value: string): boolean {
  const digits = trim(value).replace(/\D/g, '')
  return digits.length >= PHONE_MIN_DIGITS && PHONE_DIGITS_REGEX.test(digits)
}

export interface AuthValidationResult {
  valid: boolean
  message: string
  errors: { login: boolean; password: boolean }
}

export function validateAuth(login: string, password: string): AuthValidationResult {
  const errors = {
    login: !isRequired(login),
    password: !isRequired(password),
  }
  const invalid = errors.login || errors.password
  let message = ''
  if (errors.login && errors.password) message = 'Заполните логин и пароль'
  else if (errors.login) message = 'Введите логин'
  else if (errors.password) message = 'Введите пароль'
  return { valid: !invalid, message, errors }
}

export interface CallbackValidationResult {
  valid: boolean
  message: string
  errors: { name: boolean; phone: boolean }
}

export function validateCallback(name: string, phone: string): CallbackValidationResult {
  const errors = {
    name: !isRequired(name),
    phone: !isRequired(phone) || !isPhone(phone),
  }
  const invalid = errors.name || errors.phone
  let message = ''
  if (errors.name && errors.phone) message = 'Заполните имя и телефон'
  else if (errors.name) message = 'Введите имя'
  else if (!isRequired(phone)) message = 'Введите номер телефона'
  else if (!isPhone(phone)) message = 'Введите корректный номер телефона'
  return { valid: !invalid, message, errors }
}

export interface DeliveryFormValidationResult {
  valid: boolean
  message: string
  errors: { name: boolean; phone: boolean }
}

export function validateDeliveryForm(name: string, phone: string): DeliveryFormValidationResult {
  return validateCallback(name, phone)
}
