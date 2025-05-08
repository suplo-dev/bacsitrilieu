<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, useForm, router } from '@inertiajs/vue3';
import { ref } from 'vue';
import { Label } from '@/components/ui/label';
import { Button, Combobox, Input } from '@/components/ui/custom';
import { NotebookPen, Trash, PaintBucket } from 'lucide-vue-next';
import type { BreadcrumbItem } from '@/types';
import { Textarea } from '@/components/ui/textarea';
import { ChromePicker } from 'vue-color';

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
    parent_id: null,
    description: '',
    background_color: '#ffffff',
    icon: '',
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
const showColorPicker = ref(false);

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

                <Label class="content-center">Mô tả ngắn gọn</Label>
                <div class="col-span-5">
                    <Textarea
                        v-model="form.description"
                        placeholder="Mô tả ngắn gọn về danh mục"
                    />
                    <p v-if="form.errors.description" class="text-sm mt-2 text-red-500">
                        {{ form.errors.description }}
                    </p>
                </div>
                <Label class="content-center">Icon</Label>
                <div class="col-span-5">
                    <Textarea
                        v-model="form.icon"
                    />
                    <p v-if="form.errors.icon" class="text-sm mt-2 text-red-500">
                        {{ form.errors.icon }}
                    </p>
                </div>

                <Label class="content-center">Màu nền</Label>
                <div class="col-span-5 flex space-x-3">
                    <Input
                        v-model="form.background_color"
                        placeholder="VD: #FFFFFF"
                    />
                    <Button @click="showColorPicker = !showColorPicker">
                        <PaintBucket class="w-4 h-4" />
                        Pick color
                    </Button>
                </div>
                <label class="mt-5">Preview</label>
                <div class="col-start-2 col-span-5">
                    <p v-if="form.errors.background_color" class="text-sm mt-2 text-red-500">
                        {{ form.errors.background_color }}
                    </p>
                    <div class="flex justify-between">
                        <div class="rounded-full w-24 h-24 flex justify-center items-center" :style="{backgroundColor: form.background_color}">
                            <img :src="form.icon" alt="">
                        </div>
                        <ChromePicker style="width: 50%" v-if="showColorPicker" v-model="form.background_color" class="mx-auto"
                                      :formats="[]" />
                    </div>

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
