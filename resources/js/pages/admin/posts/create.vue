<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, useForm, router, usePage } from '@inertiajs/vue3';
import { ref, computed } from 'vue';
import { Label } from '@/components/ui/label';
import { Button, Combobox, Input, Editor } from '@/components/ui/custom';
import { NotebookPen, Trash, X } from 'lucide-vue-next';
import type { BreadcrumbItem } from '@/types';
import { toast } from 'vue-sonner';

const breadcrumbs: BreadcrumbItem[] = [
    { title: 'Trang chủ', href: route('dashboard') },
    { title: 'Quản lý bài viết', href: route('admin.posts.index') },
    { title: 'Thêm bài viết', href: route('admin.posts.create') }
];

const props = defineProps({
    categories: Array,
    users: Array
});

const DEFAULT_IMAGE = usePage().props.ziggy.url + '/storage/thumbnails/default.jpg';

const form = useForm({
    category_id: null,
    thumbnail: null,
    title: '',
    slug: '',
    body: '',
    fake_view: 0,
});

const newThumbnailPreview = ref<string | null>(null);
const currentThumbnail = computed(() => {
    return newThumbnailPreview.value || DEFAULT_IMAGE;
});

const handleFileChange = (e: Event) => {
    const target = e.target as HTMLInputElement;
    const file = target.files?.[0] ?? null;
    form.thumbnail = file;

    if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            newThumbnailPreview.value = e.target?.result as string;
        };
        reader.readAsDataURL(file);
    }
};

const slugify = (str: string) => str
    .normalize('NFD')
    .replace(/\u0300-\u036f/g, '')
    .toLowerCase()
    .trim()
    .replace(/[^a-z0-9\s-]/g, '')
    .replace(/\s+/g, '-')
    .replace(/-+/g, '-');

const handleTitleChange = (e: Event) => {
    form.slug = slugify(e.target.value);
};

const createPost = () => {
    form.post(route('admin.posts.store'), {
        preserveScroll: true,
        forceFormData: true,
    });
};

const back = () => {
    router.get(route('admin.posts.index'));
};
</script>

<template>
    <Head title="Thêm bài viết" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex flex-1 flex-col gap-4 rounded-xl p-4">
            <h3 class="text-2xl">Thêm bài viết</h3>

            <div class="grid gap-4 md:grid-cols-6">
                <Label class="content-center">Danh mục</Label>
                <div class="col-span-5">
                    <Combobox
                        v-model="form.category_id"
                        :options="categories"
                        placeholder="-- Chọn danh mục --"
                    />
                    <p v-if="form.errors.category_id" class="text-sm mt-2 text-red-500">
                        {{ form.errors.category_id }}
                    </p>
                </div>

                <Label class="content-center">Ảnh bìa</Label>
                <div class="col-span-5 relative">
                    <input
                        type="file"
                        name="thumbnail"
                        accept="image/*"
                        @change="handleFileChange"
                    />
                    <div class="relative w-64 mt-2">
                        <img :src="currentThumbnail" alt="Thumbnail preview" class="rounded-md shadow w-full h-auto" />
                    </div>
                </div>

                <Label class="content-center">Tiêu đề</Label>
                <div class="col-span-5">
                    <Input
                        v-model="form.title"
                        type="text"
                        placeholder="Nhập tiêu đề bài viết"
                        @input="handleTitleChange"
                    />
                    <p v-if="form.errors.title" class="text-sm mt-2 text-red-500">
                        {{ form.errors.title }}
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

                <Label class="content-center">Fake view</Label>
                <div class="col-span-5">
                    <Input
                        v-model="form.fake_view"
                        type="text"
                        placeholder="Nhập fake view"
                    />
                    <p v-if="form.errors.fake_view" class="text-sm mt-2 text-red-500">
                        {{ form.errors.fake_view }}
                    </p>
                </div>

                <Label class="content-center">Nội dung</Label>
                <div class="col-span-5">
                    <Editor v-model="form.body" />
                </div>

                <div class="col-start-5 col-span-2 space-x-2 ms-auto">
                    <Button @click="createPost" :disabled="form.processing">
                        <NotebookPen class="size-4 text-white" />
                        Đăng bài
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

<style scoped>
.relative img {
    object-fit: cover;
    max-height: 200px;
}
</style>
