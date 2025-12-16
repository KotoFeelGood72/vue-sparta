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
  <div class="overflow-x-auto overflow-y-auto rounded-lg border border-slate-200">
    <table class="min-w-[720px] border-collapse text-xs">
      <thead>
        <tr class="bg-slate-50 text-left font-semibold text-slate-700">
          <th class="border-b border-slate-200 px-2 py-1.5 w-14">
            Поз.
          </th>
          <th class="border-b border-slate-200 px-2 py-1.5 w-28">
            Номер
          </th>
          <th class="border-b border-slate-200 px-2 py-1.5">
            Название
          </th>
          <th class="border-b border-slate-200 px-2 py-1.5 w-40">
            Опции
          </th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="row in props.rows"
          :key="row.data_id ?? row.number ?? JSON.stringify(row)"
          :class="[
            'transition-colors',
            props.isSelectedItem(row.item) ? 'bg-cyan-50' : 'hover:bg-slate-50',
          ]"
        >
          <td class="border-b border-slate-200 px-2 py-1.5 align-top">
            <label class="inline-flex items-center gap-1">
              <input
                type="checkbox"
                class="h-3.5 w-3.5 rounded border-slate-300 text-teal-700 focus:ring-teal-600"
                :checked="props.isSelectedItem(row.item) ?? false"
                @change="props.toggleSelectedItem(row.item)"
              >
              <span>{{ row.item }}</span>
            </label>
          </td>
          <td class="border-b border-slate-200 px-2 py-1.5 align-top">
            {{ row.number }}
          </td>
          <td class="border-b border-slate-200 px-2 py-1.5 align-top">
            {{ row.name }}
          </td>
          <td class="border-b border-slate-200 px-2 py-1.5 align-top">
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


