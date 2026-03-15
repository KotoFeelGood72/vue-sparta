<script setup lang="ts">
import { ref, watch, nextTick } from 'vue'
import SearchIcon from '@/components/icons/SearchIcon.vue'

const props = defineProps<{
  open: boolean
}>()

const emit = defineEmits<{
  close: []
}>()

const searchQuery = ref('')
const searchInput = ref<HTMLInputElement | null>(null)

const closeModal = () => {
  searchQuery.value = ''
  emit('close')
}

watch(
  () => props.open,
  async (newValue) => {
    if (newValue) {
      await nextTick()
      searchInput.value?.focus()
    }
  },
)
</script>

<template>
  <Teleport to="body">
    <Transition name="modal-search">
      <div
        v-show="open"
        class="modal-search"
        role="dialog"
        aria-modal="true"
        aria-labelledby="modal-search-title"
        :aria-hidden="!open"
      >
        <div class="modal-search__overlay" aria-hidden="true" @click="closeModal" />
        <div class="modal-search__box">
          <div class="modal-search__container">
            <div class="modal-search__input-wrapper">
              <span class="modal-search__icon">
                <SearchIcon />
              </span>
              <input
                ref="searchInput"
                v-model="searchQuery"
                type="text"
                class="modal-search__input"
                :class="{ 'modal-search__input--with-clear': searchQuery }"
                placeholder="Поиск"
                autocomplete="off"
                @keydown.esc="closeModal"
              />
              <button
                type="button"
                class="modal-search__close"
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
            </div>
          </div>
        </div>
      </div>
    </Transition>
  </Teleport>
</template>

<style scoped lang="scss">
.modal-search {
  position: fixed;
  inset: 0;
  z-index: 1100;
  display: flex;
  flex-direction: column;
  pointer-events: none;

  &[aria-hidden='false'],
  &.modal-search-enter-active,
  &.modal-search-leave-active {
    pointer-events: auto;
  }
}

.modal-search__overlay {
  position: absolute;
  inset: 0;
  background-color: rgba(0, 0, 0, 0.4);
  cursor: pointer;
}

.modal-search__box {
  position: relative;
  z-index: 1;
  width: 100%;
  background-color: $color-white;
}

.modal-search__container {
  max-width: 1187px;
  margin: 0 auto;
  padding: 11px 16px;
  width: 100%;
}

.modal-search__input-wrapper {
  position: relative;
  display: flex;
  align-items: center;
  width: 100%;
}

.modal-search__icon {
  position: absolute;
  left: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  color: $color-dark;
  pointer-events: none;
  z-index: 1;
  width: 20px;
  height: 20px;
}

.modal-search__input {
  width: 100%;
  padding: 10px 48px 10px 40px;
  font-size: 16px;
  color: $color-dark;
  background: transparent;
  border: none;
  border-bottom: 1px solid $color-light-gray;
  outline: none;

  &::placeholder {
    color: $color-light-gray-text;
  }

  &--with-clear {
    padding-right: 88px;
  }
}

.modal-search__clear {
  position: absolute;
  right: 48px;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 40px;
  height: 40px;
  background: transparent;
  border: none;
  cursor: pointer;
  color: $color-dark;
}

.modal-search__close {
  position: absolute;
  right: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 40px;
  height: 40px;
  background: transparent;
  border: none;
  cursor: pointer;
  color: $color-dark;
}

// Transition
.modal-search-enter-active .modal-search__overlay,
.modal-search-leave-active .modal-search__overlay {
  transition: opacity 0.25s ease;
}

.modal-search-enter-from .modal-search__overlay,
.modal-search-leave-to .modal-search__overlay {
  opacity: 0;
}

.modal-search-enter-active .modal-search__box,
.modal-search-leave-active .modal-search__box {
  transition:
    opacity 0.25s ease,
    transform 0.25s ease;
}

.modal-search-enter-from .modal-search__box,
.modal-search-leave-to .modal-search__box {
  opacity: 0;
  transform: translateY(-20px);
}
</style>
