<script setup lang="ts">
import {
    AlertDialog,
    AlertDialogAction,
    AlertDialogCancel,
    AlertDialogContent,
    AlertDialogDescription,
    AlertDialogFooter,
    AlertDialogHeader,
    AlertDialogTitle
} from '@/components/ui/alert-dialog'

defineProps<{
    title?: string
    description?: string
    confirmText?: string
    cancelText?: string
}>()

const emit = defineEmits(['confirm', 'cancel'])
</script>

<template>
    <AlertDialog :default-open="true">
        <AlertDialogContent>
            <AlertDialogHeader>
                <AlertDialogTitle>
                    <slot name="title">
                        {{ title }}
                    </slot>
                </AlertDialogTitle>
                <AlertDialogDescription>
                    {{ description }}
                </AlertDialogDescription>
            </AlertDialogHeader>
            <AlertDialogFooter>
                <slot name="footer">
                    <AlertDialogCancel @click="emit('cancel')">
                        {{ cancelText ?? 'Huỷ' }}
                    </AlertDialogCancel>
                    <AlertDialogAction @click="emit('confirm')">
                        {{ confirmText ?? 'Xác nhận' }}
                    </AlertDialogAction>
                </slot>
            </AlertDialogFooter>
        </AlertDialogContent>
    </AlertDialog>
</template>
