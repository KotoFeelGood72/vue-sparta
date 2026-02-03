export interface FormHandlerValidationResult {
  valid: boolean
  message: string
  errors: { name: boolean; phone: boolean }
}

export class FormHandler {
  name: string
  phone: string

  constructor(name: string, phone: string) {
    this.name = name
    this.phone = phone
  }

  validate(): FormHandlerValidationResult {
    const errors = {
      name: !this.name?.trim(),
      phone: !this.phone?.trim() || this.phone.replace(/\D/g, '').length < 10,
    }
    const valid = !errors.name && !errors.phone
    let message = ''
    if (errors.name && errors.phone) message = 'Заполните имя и телефон'
    else if (errors.name) message = 'Введите имя'
    else if (!this.phone?.trim()) message = 'Введите номер телефона'
    else message = 'Введите корректный номер телефона'
    return { valid, message, errors }
  }

  submit() {
    console.log(this.name, this.phone)
  }
}
