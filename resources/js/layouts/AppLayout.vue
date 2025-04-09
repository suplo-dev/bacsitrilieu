<script setup lang="ts">
import AppLayout from '@/layouts/app/AppSidebarLayout.vue';
import type { BreadcrumbItemType } from '@/types';
import { Toaster } from '@/components/ui/sonner'
import { usePage } from '@inertiajs/vue3'
import { onMounted, watch } from 'vue'
import { toast } from 'vue-sonner'
interface Props {
    breadcrumbs?: BreadcrumbItemType[];
}

withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
});

const page = usePage()

const showFlashToast = () => {
    const flash = page.props.flash
    if (flash.success) toast.success(flash.success)
    if (flash.error) toast.error(flash.error)
}

onMounted(() => {
    showFlashToast()
})

watch(() => page.props.flash, () => {
    showFlashToast()
})
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <slot />
        <Toaster richColors/>
    </AppLayout>
</template>
