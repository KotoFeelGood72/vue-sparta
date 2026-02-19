<script setup lang="ts">
import { ref } from 'vue'
import ProfileIcon from '@/components/icons/ProfileIcon.vue'
import FooterPhoneIcon from '@/components/icons/FooterPhoneIcon.vue'
import { useNotify } from '@/composables/useNotify'
import { validateCallback } from '@/utils/validation'

defineProps<{
  open: boolean
}>()

const emit = defineEmits<{
  close: []
}>()

const { notify } = useNotify()
const name = ref('')
const phone = ref('')
const errors = ref({ name: false, phone: false })

const closeModal = () => emit('close')

const handleSubmit = () => {
  const result = validateCallback(name.value, phone.value)
  errors.value = result.errors
  if (!result.valid) {
    notify({ type: 'error', text: result.message })
    return
  }
  // TODO: cart order API
  notify({ type: 'success', text: 'Заявка успешно отправлена!' })
  name.value = ''
  phone.value = ''
  closeModal()
}
</script>

<template>
  <Teleport to="body">
    <Transition name="modal">
      <div
        v-show="open"
        class="modal-cart-order"
        role="dialog"
        aria-modal="true"
        aria-labelledby="modal-cart-order-title"
        :aria-hidden="!open"
      >
        <div class="modal-cart-order__overlay" aria-hidden="true" @click="closeModal" />
        <div class="modal-cart-order__box">
          <header class="modal-cart-order__header">
            <h2 id="modal-cart-order-title" class="modal-cart-order__title">ОТПРАВИТЬ ЗАЯВКУ</h2>
            <button
              type="button"
              class="modal-cart-order__close"
              aria-label="Закрыть"
              @click="closeModal"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
              >
                <path
                  d="M18 6L6 18M6 6L18 18"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </button>
          </header>
          <div class="modal-cart-order__body">
            <p class="modal-cart-order__hint">
              Оставьте ваши контактные данные, и мы свяжемся с вами для оформления заказа
            </p>
            <form class="modal-cart-order__form" @submit.prevent="handleSubmit">
              <div
                class="modal-cart-order__field"
                :class="{ 'modal-cart-order__field--error': errors.name }"
              >
                <span class="modal-cart-order__icon modal-cart-order__icon--accent">
                  <ProfileIcon />
                </span>
                <input
                  v-model="name"
                  type="text"
                  class="modal-cart-order__input"
                  placeholder="Ваше имя"
                  autocomplete="name"
                  @input="errors.name = false"
                />
              </div>
              <div
                class="modal-cart-order__field"
                :class="{ 'modal-cart-order__field--error': errors.phone }"
              >
                <span class="modal-cart-order__icon modal-cart-order__icon--accent">
                  <FooterPhoneIcon />
                </span>
                <input
                  v-model="phone"
                  type="tel"
                  class="modal-cart-order__input"
                  placeholder="Телефон"
                  autocomplete="tel"
                  @input="errors.phone = false"
                />
              </div>
              <button type="submit" class="modal-cart-order__submit">Отправить заявку</button>
            </form>
          </div>
        </div>
      </div>
    </Transition>
  </Teleport>
</template>

<style scoped lang="scss">
.modal-cart-order {
  position: fixed;
  inset: 0;
  z-index: 1100;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 20px;
  pointer-events: none;

  &[aria-hidden='false'],
  &.modal-enter-active,
  &.modal-leave-active {
    pointer-events: auto;
  }
}

.modal-cart-order__overlay {
  position: absolute;
  inset: 0;
  background-color: rgba(0, 0, 0, 0.4);
  cursor: pointer;
}

.modal-cart-order__box {
  position: relative;
  z-index: 1;
  width: 100%;
  max-width: 440px;
  background-color: #f7f7f7;
  border-radius: 12px;
  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.12);
  overflow: hidden;
}

.modal-cart-order__header {
  @include flex-space;
  padding: 20px 24px;
  background-color: $color-white;
  border-bottom: 1px solid $color-light-gray;
  position: relative;
}

.modal-cart-order__title {
  margin: 0;
  font-size: $font-size-20;
  font-weight: 700;
  color: $color-dark;
  text-align: center;
  flex: 1;
}

.modal-cart-order__close {
  @include flex-center;
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  right: 16px;
  width: 40px;
  height: 40px;
  background: transparent;
  border: none;
  cursor: pointer;
  color: $color-dark;
  transition:
    color 0.2s,
    background-color 0.2s;
  border-radius: 8px;

  &:hover {
    color: $color-yellow;
    background-color: $color-light-gray;
  }
}

.modal-cart-order__body {
  padding: 24px;
}

.modal-cart-order__hint {
  margin: 0 0 20px;
  font-size: $font-size-14;
  font-weight: 400;
  color: $color-dark;
  text-align: center;
  line-height: 1.4;
}

.modal-cart-order__form {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.modal-cart-order__field {
  position: relative;
  display: flex;
  align-items: center;
  background-color: $color-white;
  border-radius: 8px;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.06);
  border: 1px solid $color-light-gray;
  transition: border-color 0.2s;

  &--error {
    border-color: #e53e3e;
    box-shadow: 0 0 0 1px #e53e3e;
  }
}

.modal-cart-order__icon {
  flex-shrink: 0;
  margin-left: 16px;
  display: flex;
  align-items: center;
  justify-content: center;
  color: $color-yellow-light;

  :deep(svg),
  :deep(svg path) {
    fill: currentColor;
  }
}

.modal-cart-order__input {
  flex: 1;
  width: 100%;
  padding: 14px 16px 14px 12px;
  font-size: $font-size-16;
  color: $color-dark;
  background: transparent;
  border: none;
  outline: none;

  &::placeholder {
    color: $color-light-gray-text;
  }
}

.modal-cart-order__submit {
  width: 100%;
  margin-top: 8px;
  padding: 16px 24px;
  font-size: $font-size-16;
  font-weight: 700;
  color: $color-dark;
  background-color: $color-yellow-light;
  border: none;
  border-radius: 50px;
  cursor: pointer;
  transition:
    opacity 0.2s,
    background-color 0.2s;

  &:hover {
    opacity: 0.95;
    background-color: $color-yellow;
  }
}

// Transition
.modal-enter-active .modal-cart-order__overlay,
.modal-leave-active .modal-cart-order__overlay {
  transition: opacity 0.25s ease;
}

.modal-enter-from .modal-cart-order__overlay,
.modal-leave-to .modal-cart-order__overlay {
  opacity: 0;
}

.modal-enter-active .modal-cart-order__box,
.modal-leave-active .modal-cart-order__box {
  transition:
    opacity 0.25s ease,
    transform 0.25s ease;
}

.modal-enter-from .modal-cart-order__box,
.modal-leave-to .modal-cart-order__box {
  opacity: 0;
  transform: scale(0.96);
}
</style>
