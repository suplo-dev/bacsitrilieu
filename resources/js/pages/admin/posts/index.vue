<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { Label } from '@/components/ui/label';
import { AlertDialog, Button, Combobox, DateRange, Input, Pagination } from '@/components/ui/custom';
import { router, usePage } from '@inertiajs/vue3';

import { Search, ExternalLink, Plus, Pencil, Trash } from 'lucide-vue-next';
import { ref } from 'vue'
import dayjs from '@/plugin/dayjs'
import {
    Table,
    TableBody,
    TableCell,
    TableHead,
    TableHeader,
    TableRow
} from '@/components/ui/table';
import TextLink from '@/components/TextLink.vue';
import { AlertDialogAction, AlertDialogCancel } from '@/components/ui/alert-dialog';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Trang chủ',
        href: route('dashboard')
    },
    {
        title: 'Quản lý bài viết',
        href: route('admin.posts.index')
    }
];
const props = defineProps({
    posts: Object,
    categories: Array,
    users: Array
});

const page = usePage()
const searchParams = ref({
    keyword: page.props.params?.keyword,
    category_id: page.props.params?.category_id,
    user_id: page.props.params?.user_id,
    date_range: {
        start: page.props.params?.date_range?.start,
        end: page.props.params?.date_range?.end,
    }
})
const searchPost = () => {
    router.get(route('admin.posts.index'), { ...searchParams.value }, { preserveScroll: true, preserveState: true, replace: true })
}

const resetSearchParams = () => {
    searchParams.value = {
        keyword: null,
        category_id: null,
        user_id: null,
        date_range: {
            start: null,
            end: null
        }
    }
}

const createPost = () => {
    router.get(route('admin.posts.create'))
}

const deleteValue = ref<number | null>(null);
const openDeleteDialog = (post: any) => {
    deleteValue.value = post;
};
const deletePost = () => {
    if (deleteValue.value) {
        router.delete(route('admin.posts.destroy', deleteValue.value.id), {
            preserveScroll: true,
            onFinish: () => deleteValue.value = null
        });
    }
};
</script>

<template>
    <Head title="Quản lí bài viết" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <h3 class="text-2xl">Quản lý bài viết</h3>
            <div class="relative grid auto-rows-min gap-4 md:grid-cols-5">
                <div class="space-y-2">
                    <Label for="keyword">Nhập từ khoá</Label>
                    <Input id="keyword" v-model="searchParams.keyword" type="text" placeholder="Nhập để tìm kiếm theo tiêu đề" class="pl-10"
                           :icon="Search"></Input>
                </div>
                <div class="space-y-2">
                    <Label for="category">Danh mục</Label>
                    <combobox id="category" v-model="searchParams.category_id" :options="categories" placeholder="-- Chọn danh mục --" />
                </div>
                <div class="space-y-2">
                    <Label for="user">Người đăng</Label>
                    <combobox id="user" v-model="searchParams.user_id" :options="users" placeholder="-- Chọn người đăng --" />
                </div>
                <div class="space-y-2">
                    <Label for="created_at">Ngày đăng</Label>
                    <date-range id="created_at" v-model="searchParams.date_range"/>
                </div>
                <div class="flex items-end">
                    <Button type="submit" @click="searchPost">
                        Tìm kiếm
                    </Button>
                    <Button class="ml-2" variant="secondary" @click="resetSearchParams">
                        Đặt lại
                    </Button>
                </div>

                <Button variant="green" class="w-2/3" @click="createPost    ">
                    <Plus class="size-4 text-white" />
                    Thêm bài viết
                </Button>
            </div>
            <div
                class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
                <Table class="mb-12">
                    <TableHeader>
                        <TableRow>
                            <TableHead>#</TableHead>
                            <TableHead>Tiêu đề</TableHead>
                            <TableHead>Danh mục</TableHead>
                            <TableHead>Tác giả</TableHead>
                            <TableHead>Ngày đăng</TableHead>
                            <TableHead>Hành động</TableHead>
                        </TableRow>
                    </TableHeader>
                    <TableBody>
                        <TableRow v-if="posts.total" v-for="(post, index) in posts.data">
                            <TableCell> {{ index + 1 }}</TableCell>
                            <TableCell class="flex"> {{ post.title }}
                                <TextLink :href="route('post.show', {slug: post.slug})" class="text-sm" :tabindex="5">
                                    <ExternalLink class="size-5 text-primary ml-2" />
                                </TextLink>
                            </TableCell>
                            <TableCell> {{ post.category.name }}</TableCell>
                            <TableCell> {{ post.user.name }}</TableCell>
                            <TableCell> {{ dayjs(post.created_at).format('HH:mm DD/MM/YYYY') }}</TableCell>
                            <TableCell class="space-x-2">
                                <Button @click="router.get(route('admin.posts.show', { post: post.id }))">
                                    <Pencil class="size-4"/>
                                </Button>
                                <Button variant="destructive" @click="openDeleteDialog(post)">
                                    <Trash class="size-4"/>
                                </Button>
                            </TableCell>
                        </TableRow>
                        <TableRow v-else>
                            <TableCell class="text-center" colspan="6">Không có dữ liệu.</TableCell>
                        </TableRow>
                    </TableBody>
                </Table>
                <Pagination
                    route-name="admin.posts.index"
                    :current-page="posts.current_page"
                    :last-page="posts.last_page"
                    :total-items="posts.total"
                    :items-per-page="posts.per_page"
                />
            </div>
        </div>
        <AlertDialog
            v-if="deleteValue"
            description="Bạn có chắc chắn muốn xoá bài viết này không? Hành động này không thể hoàn tác."
        >
            <template #title>
                Xoá bài viết <span class="text-primary"> {{ deleteValue.title }} </span> ?
            </template>
            <template #footer>
                <AlertDialogCancel @click="deleteValue = null">
                    Huỷ
                </AlertDialogCancel>
                <AlertDialogAction @click="deletePost" variant="destructive">
                    Xoá
                </AlertDialogAction>
            </template>
        </AlertDialog>
    </AppLayout>
</template>
