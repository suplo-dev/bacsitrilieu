<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, router, usePage } from '@inertiajs/vue3';
import { ref } from 'vue';
import { type BreadcrumbItem } from '@/types';
import { Label } from '@/components/ui/label';
import { AlertDialog, Button, Combobox, DateRange, Input, Pagination } from '@/components/ui/custom';
import { Pencil, Trash, Plus, Search, ExternalLink } from 'lucide-vue-next';
import {
    Table,
    TableBody,
    TableCell,
    TableHead,
    TableHeader,
    TableRow
} from '@/components/ui/table';
import { AlertDialogAction, AlertDialogCancel } from '@/components/ui/alert-dialog';
import dayjs from '@/plugin/dayjs';
import TextLink from '@/components/TextLink.vue';

const breadcrumbs: BreadcrumbItem[] = [
    { title: 'Trang chủ', href: route('dashboard') },
    { title: 'Quản lý danh mục', href: route('admin.categories.index') }
];

const props = defineProps({
    categories: Object
});

// const page = usePage()
// const searchParams = ref({
//     keyword: page.props.params?.keyword,
// })

const deleteValue = ref<any | null>(null);
const openDeleteDialog = (category: any) => {
    deleteValue.value = category;
};
const deleteCategory = () => {
    if (deleteValue.value) {
        router.delete(route('admin.categories.destroy', deleteValue.value.id), {
            preserveScroll: true,
            onFinish: () => deleteValue.value = null
        });
    }
};

const createCategory = () => {
    router.get(route('admin.categories.create'));
};
</script>

<template>
    <Head title="Quản lý danh mục" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <h3 class="text-2xl">Quản lý danh mục</h3>
            <div class="relative grid auto-rows-min gap-4 md:grid-cols-5">
<!--                <div class="space-y-2 col-span-2">-->
<!--                    <Label for="keyword">Nhập từ khoá</Label>-->
<!--                    <Input id="keyword" v-model="searchParams.keyword" type="text" placeholder="Nhập để tìm kiếm theo tên danh mục" class="pl-10"-->
<!--                           :icon="Search"></Input>-->
<!--                </div>-->
<!--                <div class="space-y-2">-->
<!--                    <Label for="category">Danh mục</Label>-->
<!--                    <combobox id="category" v-model="searchParams.category_id" :options="categories" placeholder="&#45;&#45; Chọn danh mục &#45;&#45;" />-->
<!--                </div>-->
<!--                <div class="flex items-end">-->
<!--                    <Button type="submit" @click="searchCategory">-->
<!--                        Tìm kiếm-->
<!--                    </Button>-->
<!--                    <Button class="ml-2" variant="secondary" @click="resetSearchParams">-->
<!--                        Đặt lại-->
<!--                    </Button>-->
<!--                </div>-->
                <Button class="col-start-1 w-2/3" @click="createCategory">
                    <Plus class="size-4 text-white" />
                    Thêm danh mục
                </Button>
            </div>
            <div
                class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
                <Table class="mb-12">
                    <TableHeader>
                        <TableRow>
                            <TableHead>#</TableHead>
                            <TableHead>Tên</TableHead>
                            <TableHead>Danh mục cha</TableHead>
                            <TableHead>Tổng số bài viết</TableHead>
                            <TableHead>Hành động</TableHead>
                        </TableRow>
                    </TableHeader>
                    <TableBody>
                        <TableRow v-if="categories.length" v-for="(category, index) in categories">
                            <TableCell> {{ index + 1 }}</TableCell>
                            <TableCell> {{ category.name }}</TableCell>
                            <TableCell> {{ category.parent?.name }}</TableCell>
                            <TableCell> {{ category.posts_count }}</TableCell>
                            <TableCell class="space-x-2">
                                <Button @click="router.get(route('admin.categories.show', { category: category.id }))">
                                    <Pencil class="size-4"/>
                                </Button>
                                <Button variant="destructive" @click="openDeleteDialog(category)">
                                    <Trash class="size-4"/>
                                </Button>
                            </TableCell>
                        </TableRow>
                        <TableRow v-else>
                            <TableCell class="text-center" colspan="6">Không có dữ liệu.</TableCell>
                        </TableRow>
                    </TableBody>
                </Table>
            </div>
        </div>

        <AlertDialog
            v-if="deleteValue"
            description="Bạn có chắc chắn muốn xoá danh mục này không? Hành động này không thể hoàn tác."
        >
            <template #title>
                Xoá danh mục <span class="text-primary">{{ deleteValue.name }}</span> ?
            </template>
            <template #footer>
                <AlertDialogCancel @click="deleteValue = null">Huỷ</AlertDialogCancel>
                <AlertDialogAction @click="deleteCategory" variant="destructive">Xoá</AlertDialogAction>
            </template>
        </AlertDialog>
    </AppLayout>
</template>
