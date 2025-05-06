<script setup lang="ts">
import { Combobox, ComboboxAnchor, ComboboxEmpty, ComboboxGroup, ComboboxInput, ComboboxItem, ComboboxList } from '@/components/ui/combobox'
import { TagsInput, TagsInputInput, TagsInputItem, TagsInputItemDelete, TagsInputItemText } from '@/components/ui/tags-input'
import { useFilter } from 'reka-ui'
import { computed, ref } from 'vue'

const props = defineProps({
    options: Array,
    placeholder: String,
    label: {
        type: String,
        default: 'name'
    },
    value: {
        type: String,
        default: 'id'
    },
});

const modelValue = ref<string[]>([])
const open = ref(false)
const searchTerm = ref('')

const { contains } = useFilter({ sensitivity: 'base' })
const filteredOptions = computed(() => {
    const leftOptions = props.options.filter(i => !modelValue.value.includes(i[props.label]))
    return searchTerm.value ? leftOptions.filter(option => contains(option[props.label], searchTerm.value)) : leftOptions
})
</script>

<template>
    <Combobox v-model="modelValue" v-model:open="open" :ignore-filter="true">
        <ComboboxAnchor as-child>
            <TagsInput v-model="modelValue" class="px-2 gap-2 w-full">
                <div class="flex gap-2 flex-wrap items-center">
                    <TagsInputItem v-for="item in modelValue" :key="item" :value="item">
                        <TagsInputItemText />
                        <TagsInputItemDelete />
                    </TagsInputItem>
                </div>

                <ComboboxInput v-model="searchTerm" as-child>
                    <TagsInputInput :placeholder="placeholder" class="min-w-[200px] w-full p-0 border-none focus-visible:ring-0 h-auto" @keydown.enter.prevent />
                </ComboboxInput>
            </TagsInput>

            <ComboboxList class="w-[--reka-popper-anchor-width]">
                <ComboboxEmpty />
                <ComboboxGroup>
                    <ComboboxItem
                        v-for="option in filteredOptions" :key="option[value]" :value="option[label]"
                        @select.prevent="(ev) => {

              if (typeof ev.detail.value === 'string') {
                searchTerm = ''
                modelValue.push(ev.detail.value)
              }

              if (filteredOptions.length === 0) {
                open = false
              }
            }"
                    >
                        {{ option[label] }}
                    </ComboboxItem>
                </ComboboxGroup>
            </ComboboxList>
        </ComboboxAnchor>
    </Combobox>
</template>
