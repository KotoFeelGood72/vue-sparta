<script setup lang="ts">
import { ref } from 'vue'
import { RouterLink } from 'vue-router'
import ProfileIcon from '@/components/icons/ProfileIcon.vue'
import KeyIcon from '@/components/icons/KeyIcon.vue'
import { useNotify } from '@/composables/useNotify'
import { validateAuth } from '@/utils/validation'

defineProps<{
  open: boolean
}>()

const emit = defineEmits<{
  close: []
}>()

const { notify } = useNotify()
const login = ref('')
const password = ref('')
const showPassword = ref(false)
const errors = ref({ login: false, password: false })

const closeModal = () => emit('close')

const handleSubmit = () => {
  const result = validateAuth(login.value, password.value)
  errors.value = result.errors
  if (!result.valid) {
    notify({ type: 'error', text: result.message })
    return
  }
  // TODO: auth API
  closeModal()
}
</script>

<template>
  <Teleport to="body">
    <Transition name="modal">
      <div
        v-show="open"
        class="modal-auth"
        role="dialog"
        aria-modal="true"
        aria-labelledby="modal-auth-title"
        :aria-hidden="!open"
      >
        <div class="modal-auth__overlay" aria-hidden="true" @click="closeModal" />
        <div class="modal-auth__box">
          <header class="modal-auth__header">
            <h2 id="modal-auth-title" class="modal-auth__title">ВХОД В ЛИЧНЫЙ КАБИНЕТ</h2>
            <button
              type="button"
              class="modal-auth__close"
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
          <div class="modal-auth__body">
            <p class="modal-auth__hint">
              Для регистрации обратитесь по номеру: <a href="#">89660320230</a>
            </p>
            <form class="modal-auth__form" @submit.prevent="handleSubmit">
              <div class="modal-auth__field" :class="{ 'modal-auth__field--error': errors.login }">
                <span class="modal-auth__icon modal-auth__icon--accent">
                  <ProfileIcon />
                </span>
                <input
                  v-model="login"
                  type="text"
                  class="modal-auth__input"
                  placeholder="Логин"
                  autocomplete="username"
                  @input="errors.login = false"
                />
              </div>
              <div
                class="modal-auth__field"
                :class="{ 'modal-auth__field--error': errors.password }"
              >
                <span class="modal-auth__icon modal-auth__icon--accent">
                  <KeyIcon />
                </span>
                <input
                  v-model="password"
                  :type="showPassword ? 'text' : 'password'"
                  class="modal-auth__input"
                  placeholder="Пароль"
                  autocomplete="current-password"
                  @input="errors.password = false"
                />
                <button
                  type="button"
                  class="modal-auth__eye"
                  :aria-label="showPassword ? 'Скрыть пароль' : 'Показать пароль'"
                  @click="showPassword = !showPassword"
                >
                  <svg
                    v-if="!showPassword"
                    xmlns="http://www.w3.org/2000/svg"
                    width="20"
                    height="20"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                  >
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                    <circle cx="12" cy="12" r="3" />
                  </svg>
                  <svg
                    v-else
                    xmlns="http://www.w3.org/2000/svg"
                    width="20"
                    height="20"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                  >
                    <path
                      d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"
                    />
                    <line x1="1" y1="1" x2="23" y2="23" />
                  </svg>
                </button>
              </div>
              <p class="modal-auth__terms">
                Регистрируясь, вы принимаете условия
                <RouterLink to="/agreement" class="modal-auth__link" @click="closeModal">
                  Пользовательского соглашения
                </RouterLink>
              </p>
              <button type="submit" class="modal-auth__submit">Войти</button>
            </form>
          </div>
        </div>
      </div>
    </Transition>
  </Teleport>
</template>

<style scoped lang="scss">
.modal-auth {
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

.modal-auth__overlay {
  position: absolute;
  inset: 0;
  background-color: rgba(0, 0, 0, 0.4);
  cursor: pointer;
}

.modal-auth__box {
  position: relative;
  z-index: 1;
  width: 100%;
  max-width: 440px;
  background-color: #f7f7f7;
  border-radius: 12px;
  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.12);
  overflow: hidden;
}

.modal-auth__header {
  @include flex-space;
  padding: 20px 24px;
  background-color: $color-white;
  border-bottom: 1px solid $color-light-gray;
  position: relative;
}

.modal-auth__title {
  margin: 0;
  font-size: $font-size-20;
  font-weight: 700;
  color: $color-dark;
  text-align: center;
  flex: 1;
}

.modal-auth__close {
  @include flex-center;
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  right: 24px;
  width: 40px;
  height: 40px;
  background: transparent;
  border: none;
  cursor: pointer;
  color: $color-dark;
}

.modal-auth__body {
  padding: 24px;
}

.modal-auth__hint {
  margin: 0 0 20px;
  font-size: $font-size-14;
  font-weight: 400;
  color: $color-dark;
  text-align: center;
  line-height: 1.4;
  display: flex;
  flex-direction: column;

  a {
    text-decoration: none;
    color: $color-yellow-light;
    font-size: 16px;
    font-weight: 600;
  }
}

.modal-auth__form {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.modal-auth__field {
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

.modal-auth__icon {
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

.modal-auth__input {
  flex: 1;
  width: 100%;
  padding: 14px 44px 14px 12px;
  font-size: $font-size-16;
  color: $color-dark;
  background: transparent;
  border: none;
  outline: none;

  &::placeholder {
    color: $color-light-gray-text;
  }
}

.modal-auth__eye {
  position: absolute;
  right: 12px;
  @include flex-center;
  width: 36px;
  height: 36px;
  background: transparent;
  border: none;
  cursor: pointer;
  color: $color-dark;
  border-radius: 6px;
  transition:
    color 0.2s,
    background-color 0.2s;

  &:hover {
    color: $color-yellow;
    background-color: $color-light-gray;
  }
}

.modal-auth__terms {
  margin: 0;
  font-size: $font-size-12;
  color: $color-dark;
  text-align: center;
  line-height: 1.4;
}

.modal-auth__link {
  color: $color-yellow-light;
  text-decoration: underline;
  transition: color 0.2s;

  &:hover {
    color: $color-yellow;
  }
}

.modal-auth__submit {
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
.modal-enter-active .modal-auth__overlay,
.modal-leave-active .modal-auth__overlay {
  transition: opacity 0.25s ease;
}

.modal-enter-from .modal-auth__overlay,
.modal-leave-to .modal-auth__overlay {
  opacity: 0;
}

.modal-enter-active .modal-auth__box,
.modal-leave-active .modal-auth__box {
  transition:
    opacity 0.25s ease,
    transform 0.25s ease;
}

.modal-enter-from .modal-auth__box,
.modal-leave-to .modal-auth__box {
  opacity: 0;
  transform: scale(0.96);
}
</style>
