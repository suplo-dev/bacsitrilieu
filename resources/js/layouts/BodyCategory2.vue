<script setup lang="ts"></script>

<template>
    <section class="relative bg-white px-4 pb-32 sm:px-8 lg:px-16 xl:px-40 2xl:px-64">
        <div class="my-16 text-center text-2xl font-medium text-primary">{{ $page.props.categories.category_body_2.name }}</div>
        <div class="grid grid-cols-1 gap-8 text-center md:-mx-4 md:grid-cols-4">
            <a v-for="(category, index) in $page.props.categories.category_body_2.children" :key="`category_body_2_${index}`" :href="category.slug">
                <div class="rounded-lg bg-white p-8 text-center shadow-lg md:mx-4">
                    <div
                        class="mx-auto mb-4 flex h-24 w-24 items-center justify-center rounded-full"
                        :style="{ backgroundColor: category.background_color }"
                    >
                        <img :src="category.icon" alt="" />
                    </div>

                    <h4 class="text-xl font-bold">{{ category.name }}</h4>
                    <p class="mt-1 text-gray-700">{{ category.description }}</p>
                    <span class="mt-4 block text-blue-600 hover:underline">Xem thêm</span>
                </div>
            </a>
        </div>
    </section>
</template>
