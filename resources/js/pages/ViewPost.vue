<script setup lang="ts">
import dayjs from '@/plugin/dayjs';
import SiteLayout from '@/layouts/SiteLayout.vue';

const props = defineProps({
    post: Object
});
</script>

<template>
    <SiteLayout>
        <section class="container relative px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 py-32 mt-24 mx-auto">
            <div class="text-2xl text-primary font-extrabold"> {{ post.title }}</div>
            <div class="text-s my-1 text-gray-400"> {{ dayjs(post.created_at).format('HH:mm DD/MM/YYYY') }} </div>
            <div v-html="post.body"></div>
        </section>
    </SiteLayout>
</template>

