export class FormHandler {
  name: string
  phone: string

  constructor(name: string, phone: string) {
    this.name = name
    this.phone = phone
  }

  validate() {
    if (!this.name) {
      return false
    }
    if (!this.phone) {
      return false
    }
  }

  submit() {
    console.log(this.name, this.phone)
  }
}
