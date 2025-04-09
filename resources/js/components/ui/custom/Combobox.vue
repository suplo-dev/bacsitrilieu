<script setup lang="ts">
import { ref, watch } from 'vue';
import { cn } from '@/lib/utils';
import {
    Combobox,
    ComboboxAnchor,
    ComboboxEmpty,
    ComboboxGroup,
    ComboboxInput,
    ComboboxItem,
    ComboboxItemIndicator,
    ComboboxList,
    ComboboxTrigger
} from '@/components/ui/combobox';
import { Check, ChevronsUpDown } from 'lucide-vue-next';

const props = defineProps({
    options: {
        type: Array,
        required: true
    },
    label: {
        type: String,
        default: 'name'
    },
    value: {
        type: String,
        default: 'id'
    },
    placeholder: {
        type: String,
        default: '-- Chọn 1 lựa chọn --'
    },
    modelValue: {
        type: [String, Number],
        default: ''
    }
});

// Emit để truyền giá trị đã chọn từ component con ra ngoài
const emit = defineEmits(['update:modelValue']);

// State cho giá trị đã chọn
const selectedValue = ref<any>(props.modelValue + ''); // Khởi tạo giá trị từ modelValue

// Watcher để cập nhật khi `modelValue` thay đổi từ parent
watch(() => props.modelValue, (newValue) => {
    // Tìm đối tượng trong options tương ứng với category_id (hoặc value của bạn)
    const selectedOption = props.options.find(option => option[props.value] == newValue);
    selectedValue.value = selectedOption ? selectedOption[props.value] + '' : null; // Cập nhật đối tượng đầy đủ
});

// Hàm cập nhật giá trị đã chọn và emit giá trị lên parent
const updateSelectedValue = (item: any) => {
    selectedValue.value = item[props.value] + ''; // Cập nhật giá trị ID
    emit('update:modelValue', item[props.value]); // Emit ra ngoài với ID
};
const displayValue = (val: any) => {
    const selectedOption = props.options.find(option => option[props.value] == (val?.[props.value] ?? selectedValue.value));
    return selectedOption ? selectedOption[props.label] + '' : null; // Cập nhật đối tượng đầy đủ
};
</script>

<template>
    <Combobox v-bind="{ by: props.label }">
        <ComboboxAnchor class="w-full">
            <div class="relative w-full items-center">
                <ComboboxInput
                    class="h-10"
                    :display-value="displayValue"
                    :placeholder="placeholder"
                    v-model="selectedValue"
                />
                <ComboboxTrigger class="absolute end-0 inset-y-0 flex items-center justify-center px-3">
                    <ChevronsUpDown class="size-4 text-muted-foreground" />
                </ComboboxTrigger>
            </div>
        </ComboboxAnchor>

        <ComboboxList>
            <ComboboxEmpty>
                Không tìm thấy kết quả.
            </ComboboxEmpty>

            <ComboboxGroup>
                <ComboboxItem
                    v-for="item in props.options"
                    :key="item[props.value]"
                    :value="item"
                    @select="updateSelectedValue(item)"
                >
                    {{ item[props.label] }} <!-- Hiển thị label cho mỗi item -->
                    <ComboboxItemIndicator>
                        <Check :class="cn('ml-auto h-4 w-4')" />
                    </ComboboxItemIndicator>
                </ComboboxItem>
            </ComboboxGroup>
        </ComboboxList>
    </Combobox>
</template>

<style scoped>
/* Style tùy chỉnh cho component */
</style>
