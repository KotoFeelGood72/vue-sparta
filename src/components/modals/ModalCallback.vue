<script setup lang="ts">
import { ref } from 'vue';
import ProfileIcon from '@/components/icons/ProfileIcon.vue';
import FooterPhoneIcon from '@/components/icons/FooterPhoneIcon.vue';
import { useNotify } from '@/composables/useNotify';
import { validateCallback } from '@/utils/validation';

defineProps<{
  open: boolean;
}>();

const emit = defineEmits<{
  close: [];
}>();

const { notify } = useNotify();
const name = ref('');
const phone = ref('');
const errors = ref({ name: false, phone: false });

const closeModal = () => emit('close');

const handleSubmit = () => {
  const result = validateCallback(name.value, phone.value);
  errors.value = result.errors;
  if (!result.valid) {
    notify({ type: 'error', text: result.message });
    return;
  }
  // TODO: callback API
  closeModal();
};
</script>

<template>
  <Teleport to="body">
    <Transition name="modal">
      <div
        v-show="open"
        class="modal-callback"
        role="dialog"
        aria-modal="true"
        aria-labelledby="modal-callback-title"
        :aria-hidden="!open"
      >
        <div
          class="modal-callback__overlay"
          aria-hidden="true"
          @click="closeModal"
        />
        <div class="modal-callback__box">
          <header class="modal-callback__header">
            <h2 id="modal-callback-title" class="modal-callback__title">
              ЗАКАЗАТЬ ЗВОНОК
            </h2>
            <button
              type="button"
              class="modal-callback__close"
              aria-label="Закрыть"
              @click="closeModal"
            >
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M18 6L6 18M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </button>
          </header>
          <div class="modal-callback__body">
            <p class="modal-callback__hint">
              Оставьте номер телефона, и мы перезвоним вам в ближайшее время
            </p>
            <form class="modal-callback__form" @submit.prevent="handleSubmit">
              <div class="modal-callback__field" :class="{ 'modal-callback__field--error': errors.name }">
                <span class="modal-callback__icon modal-callback__icon--accent">
                  <ProfileIcon />
                </span>
                <input
                  v-model="name"
                  type="text"
                  class="modal-callback__input"
                  placeholder="Ваше имя"
                  autocomplete="name"
                  @input="errors.name = false"
                />
              </div>
              <div class="modal-callback__field" :class="{ 'modal-callback__field--error': errors.phone }">
                <span class="modal-callback__icon modal-callback__icon--accent">
                  <FooterPhoneIcon />
                </span>
                <input
                  v-model="phone"
                  type="tel"
                  class="modal-callback__input"
                  placeholder="Телефон"
                  autocomplete="tel"
                  @input="errors.phone = false"
                />
              </div>
              <button type="submit" class="modal-callback__submit">
                Заказать звонок
              </button>
            </form>
          </div>
        </div>
      </div>
    </Transition>
  </Teleport>
</template>

<style scoped lang="scss">
.modal-callback {
  position: fixed;
  inset: 0;
  z-index: 1100;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 20px;
  pointer-events: none;

  &[aria-hidden="false"],
  &.modal-enter-active,
  &.modal-leave-active {
    pointer-events: auto;
  }
}

.modal-callback__overlay {
  position: absolute;
  inset: 0;
  background-color: rgba(0, 0, 0, 0.4);
  cursor: pointer;
}

.modal-callback__box {
  position: relative;
  z-index: 1;
  width: 100%;
  max-width: 440px;
  background-color: #f7f7f7;
  border-radius: 12px;
  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.12);
  overflow: hidden;
}

.modal-callback__header {
  @include flex-space;
  padding: 20px 24px;
  background-color: $color-white;
  border-bottom: 1px solid $color-light-gray;
}

.modal-callback__title {
  margin: 0;
  font-size: $font-size-20;
  font-weight: 700;
  color: $color-dark;
  text-align: center;
  flex: 1;
}

.modal-callback__close {
  @include flex-center;
  position: absolute;
  top: 20px;
  right: 24px;
  width: 40px;
  height: 40px;
  background: transparent;
  border: none;
  cursor: pointer;
  color: $color-dark;
  transition: color 0.2s, background-color 0.2s;
  border-radius: 8px;

  &:hover {
    color: $color-yellow;
    background-color: $color-light-gray;
  }
}

.modal-callback__body {
  padding: 24px;
}

.modal-callback__hint {
  margin: 0 0 20px;
  font-size: $font-size-14;
  font-weight: 400;
  color: $color-dark;
  text-align: center;
  line-height: 1.4;
}

.modal-callback__form {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.modal-callback__field {
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

.modal-callback__icon {
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

.modal-callback__input {
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

.modal-callback__submit {
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
  transition: opacity 0.2s, background-color 0.2s;

  &:hover {
    opacity: 0.95;
    background-color: $color-yellow;
  }
}

// Transition
.modal-enter-active .modal-callback__overlay,
.modal-leave-active .modal-callback__overlay {
  transition: opacity 0.25s ease;
}

.modal-enter-from .modal-callback__overlay,
.modal-leave-to .modal-callback__overlay {
  opacity: 0;
}

.modal-enter-active .modal-callback__box,
.modal-leave-active .modal-callback__box {
  transition: opacity 0.25s ease, transform 0.25s ease;
}

.modal-enter-from .modal-callback__box,
.modal-leave-to .modal-callback__box {
  opacity: 0;
  transform: scale(0.96);
}
</style>
