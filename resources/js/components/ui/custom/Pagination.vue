<script setup>
import {
    Pagination,
    PaginationList,
    PaginationListItem,
    PaginationFirst,
    PaginationLast,
    PaginationPrev,
    PaginationNext,
    PaginationEllipsis,
} from '@/components/ui/pagination'
import { Button } from '@/components/ui/button'
import { router } from '@inertiajs/vue3'

const props = defineProps({
    routeName: String,
    currentPage: Number,
    lastPage: Number,
    totalItems: Number,
    itemsPerPage: Number,
})
const goToPage = (page) => {
    if (page < 1 || page > props.lastPage) return // Nếu trang không hợp lệ
    router.get(route(props.routeName), { page }, { preserveScroll: true, preserveState: true })
}
</script>
<template>
    <div class="flex justify-between mx-2 mb-3">
        <div></div>
        <Pagination
            class=""
            v-slot="{ page }"
            :items-per-page="itemsPerPage"
            :total="totalItems"
            :sibling-count="2"
            show-edges
            :default-page="currentPage"
        >
            <PaginationList v-slot="{ items }" class="flex items-center gap-2">
                <PaginationFirst @click="goToPage(1)" />
                <PaginationPrev @click="goToPage(currentPage - 1)" />

                <template v-for="(item, index) in items" :key="index">
                    <PaginationListItem
                        v-if="item.type === 'page'"
                        :value="item.value"
                        as-child
                        @click="goToPage(item.value)"
                    >
                        <Button
                            class="w-10 h-10 p-0"
                            :variant="item.value === currentPage ? 'default' : 'outline'"
                        >
                            {{ item.value }}
                        </Button>
                    </PaginationListItem>
                    <PaginationEllipsis v-else :index="index" />
                </template>

                <PaginationNext @click="goToPage(currentPage + 1)" />
                <PaginationLast @click="goToPage(lastPage)" />
            </PaginationList>
        </Pagination>
    </div>
</template>
