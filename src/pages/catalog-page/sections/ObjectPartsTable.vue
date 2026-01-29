<script setup lang="ts">
// eslint-disable-next-line @typescript-eslint/no-explicit-any
type AnyFn = (value: any) => void | boolean

interface PartRow {
  data_id?: string | number
  number?: string
  name?: string
  item?: string | number
  options?: string[]
}

const props = defineProps<{
  rows?: PartRow[] | null
  isSelectedItem: AnyFn
  toggleSelectedItem: AnyFn
}>()
</script>

<template>
  <div class="object-parts-table">
    <table class="object-parts-table__table">
      <thead>
        <tr class="object-parts-table__header-row">
          <th class="object-parts-table__header-cell object-parts-table__header-cell--position">
            Поз.
          </th>
          <th class="object-parts-table__header-cell object-parts-table__header-cell--number">
            Номер
          </th>
          <th class="object-parts-table__header-cell object-parts-table__header-cell--name">
            Название
          </th>
          <th class="object-parts-table__header-cell object-parts-table__header-cell--options">
            Опции
          </th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="row in props.rows"
          :key="row.data_id ?? row.number ?? JSON.stringify(row)"
          class="object-parts-table__row"
          :class="{
            'object-parts-table__row--selected': props.isSelectedItem(row.item),
          }"
        >
          <td class="object-parts-table__cell">
            <label class="object-parts-table__checkbox-label">
              <input
                type="checkbox"
                class="object-parts-table__checkbox"
                :checked="props.isSelectedItem(row.item) ?? false"
                @change="props.toggleSelectedItem(row.item)"
              >
              <span>{{ row.item }}</span>
            </label>
          </td>
          <td class="object-parts-table__cell">
            {{ row.number }}
          </td>
          <td class="object-parts-table__cell">
            {{ row.name }}
          </td>
          <td class="object-parts-table__cell">
            <span
              v-for="(opt, idx) in row.options"
              :key="idx"
            >
              {{ opt }}
              <span v-if="idx < (row.options?.length || 0) - 1">; </span>
            </span>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<style scoped lang="scss">
@import '@/styles/variables';

.object-parts-table {
  overflow-x: auto;
  overflow-y: auto;
  border-radius: 8px;
  border: 1px solid #e2e8f0;

  &__table {
    min-width: 720px;
    border-collapse: collapse;
    font-size: 12px;
  }

  &__header-row {
    background-color: #f8fafc;
    text-align: left;
    font-weight: 600;
    color: #334155;
  }

  &__header-cell {
    border-bottom: 1px solid #e2e8f0;
    padding: 6px 8px;

    &--position {
      width: 56px;
    }

    &--number {
      width: 112px;
    }

    &--options {
      width: 160px;
    }
  }

  &__row {
    transition: background-color 0.2s;

    &:hover {
      background-color: #f8fafc;
    }

    &--selected {
      background-color: #ecfeff;
    }
  }

  &__cell {
    border-bottom: 1px solid #e2e8f0;
    padding: 6px 8px;
    vertical-align: top;
  }

  &__checkbox-label {
    display: inline-flex;
    align-items: center;
    gap: 4px;
  }

  &__checkbox {
    height: 14px;
    width: 14px;
    border-radius: 4px;
    border: 1px solid #cbd5e1;
    color: #0f766e;
    cursor: pointer;

    &:focus {
      outline: 2px solid #0f766e;
      outline-offset: 2px;
    }
  }
}
</style>


