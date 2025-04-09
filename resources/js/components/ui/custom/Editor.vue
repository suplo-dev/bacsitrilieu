<script setup lang="ts">
import Editor from '@tinymce/tinymce-vue'
import { ref, watch, computed } from 'vue'
import type { HTMLAttributes } from 'vue'
import { cn } from '@/lib/utils' // nếu bạn đang dùng Tailwind helper

// Props
const props = defineProps<{
    modelValue?: string | number
    class?: HTMLAttributes['class']
}>()

const emit = defineEmits<{
    (e: 'update:modelValue', value: string): void
}>()

// Local binding
const data = ref(props.modelValue ?? '')

// Đồng bộ từ props sang local data
watch(() => props.modelValue, (newVal) => {
    if (newVal !== data.value) {
        data.value = newVal || ''
    }
})

// Emit khi thay đổi nội dung
watch(data, (newVal) => {
    emit('update:modelValue', newVal as string)
})

// Cấu hình TinyMCE
const editorInit = computed(() => ({
    height: 1000,
    menubar: true,
    plugins: [
        'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview', 'anchor',
        'searchreplace', 'visualblocks', 'code', 'fullscreen',
        'insertdatetime', 'media', 'table', 'code', 'help', 'wordcount'
    ],
    toolbar:
        'undo redo | formatselect | bold italic underline backcolor | ' +
        'alignleft aligncenter alignright alignjustify | ' +
        'bullist numlist outdent indent | removeformat | link image | code fullscreen',
    content_style:
        'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
}))
</script>

<template>
    <Editor
        :model-value="data"
        :init="editorInit"
        :class="cn('w-full', props.class)"
        api-key="ummv7wjg02y7lkx663axo3nhlixlxs805t2hagx37j82jumw"
        @update:model-value="(val) => data = val"
    />
</template>

<style scoped>
.tox-tinymce {
    border-radius: 6px;
    border: 1px solid #ddd;
    min-height: 400px;
}
</style>
