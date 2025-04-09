<script setup lang="ts">
import type { HTMLAttributes } from 'vue';
import { cn } from '@/lib/utils';
import { useVModel } from '@vueuse/core';

// Định nghĩa các props
const props = defineProps<{
    defaultValue?: string | number;
    modelValue?: string | number;
    placeholder?: HTMLAttributes['placeholder'];
    class?: HTMLAttributes['class'];
    parentClass?: HTMLAttributes['class'];
    type?: HTMLAttributes['type'];
    icon?: any; // Prop icon, có thể truyền vào bất kỳ component icon nào
}>();

// Định nghĩa emits
const emits = defineEmits<{
    (e: 'update:modelValue', payload: string | number): void;
}>();

// Sử dụng v-model để liên kết giá trị
const modelValue = useVModel(props, 'modelValue', emits, {
    passive: true,
    defaultValue: props.defaultValue,
});
</script>

<template>
    <div :class="cn('relative w-full', parentClass)">
        <!-- Input Field -->
        <input
            v-model="modelValue"
            :placeholder="placeholder"
            :type="type"
            :class="cn('flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-foreground file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50', props.class)"
        />

        <!-- Icon (nếu có prop icon) -->
        <span v-if="props.icon" class="absolute start-0 inset-y-0 flex items-center justify-center px-2">
            <component :is="props.icon" class="size-4 text-muted-foreground" />
        </span>
    </div>
</template>

<style scoped>
/* Style tùy chỉnh nếu cần */
</style>
