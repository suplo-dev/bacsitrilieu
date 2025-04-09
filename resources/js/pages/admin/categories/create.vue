<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, useForm, router } from '@inertiajs/vue3';
import { ref } from 'vue';
import { Label } from '@/components/ui/label';
import { Button, Combobox, Input } from '@/components/ui/custom';
import { NotebookPen, Trash } from 'lucide-vue-next';
import type { BreadcrumbItem } from '@/types';

const breadcrumbs: BreadcrumbItem[] = [
    { title: 'Trang chủ', href: route('dashboard') },
    { title: 'Quản lý danh mục', href: route('admin.categories.index') },
    { title: 'Thêm danh mục', href: route('admin.categories.create') }
];

const props = defineProps({
    allCategories: Array
});

const form = useForm({
    name: '',
    slug: '',
    parent_id: null
});

const slugify = (str: string) => str
    .normalize('NFD')
    .replace(/[\u0300-\u036f]/g, '')
    .toLowerCase()
    .trim()
    .replace(/[^a-z0-9\s-]/g, '')
    .replace(/\s+/g, '-')
    .replace(/-+/g, '-');

const handleNameChange = (e: Event) => {
    form.name = (e.target as HTMLInputElement).value;
    form.slug = slugify(form.name);
};

const createCategory = () => {
    form.post(route('admin.categories.store'), {
        preserveScroll: true
    });
};

const back = () => {
    router.get(route('admin.categories.index'));
};
</script>

<template>
    <Head title="Thêm danh mục" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex flex-1 flex-col gap-4 rounded-xl p-4">
            <h3 class="text-2xl">Thêm danh mục</h3>

            <div class="grid gap-4 md:grid-cols-6">
                <Label class="content-center">Tên danh mục</Label>
                <div class="col-span-5">
                    <Input
                        v-model="form.name"
                        type="text"
                        placeholder="Nhập tên danh mục"
                        @input="handleNameChange"
                    />
                    <p v-if="form.errors.name" class="text-sm mt-2 text-red-500">
                        {{ form.errors.name }}
                    </p>
                </div>

                <Label class="content-center">Slug</Label>
                <div class="col-span-5">
                    <Input
                        v-model="form.slug"
                        type="text"
                        placeholder="Nhập slug"
                    />
                    <p v-if="form.errors.slug" class="text-sm mt-2 text-red-500">
                        {{ form.errors.slug }}
                    </p>
                </div>

                <Label class="content-center">Danh mục cha</Label>
                <div class="col-span-5">
                    <Combobox
                        v-model="form.parent_id"
                        :options="allCategories"
                        placeholder="-- Không có --"
                    />
                    <p v-if="form.errors.parent_id" class="text-sm mt-2 text-red-500">
                        {{ form.errors.parent_id }}
                    </p>
                </div>

                <div class="col-start-5 col-span-2 space-x-2 ms-auto">
                    <Button @click="createCategory" :disabled="form.processing">
                        <NotebookPen class="size-4 text-white" />
                        Tạo mới
                    </Button>
                    <Button variant="destructive" @click="back">
                        <Trash class="size-4 text-white" />
                        Huỷ bỏ
                    </Button>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
