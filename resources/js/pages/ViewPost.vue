<script setup lang="ts">
import SiteLayout from '@/layouts/SiteLayout.vue';
import dayjs from '@/plugin/dayjs';
import { Calendar, Eye } from 'lucide-vue-next';

const props = defineProps({
    post: Object,
});
</script>

<template>
    <SiteLayout>
        <section class="relative mx-auto px-4 py-8 sm:px-8 lg:px-16 xl:px-40 2xl:px-64">
            <div class="text-2xl font-extrabold text-primary">{{ post.title }}</div>
            <div class="my-1 flex items-center justify-between text-sm text-gray-400">
                <div class="flex items-center">
                    <Calendar class="mr-2 h-4 w-4" />
                    {{ dayjs(post.created_at).format('HH:mm DD/MM/YYYY') }}
                    <Eye class="ml-5 mr-2 h-4 w-4" />
                    {{ post.total_view }} lượt xem
                </div>
                <div class="italic">Tác giả: Bác sĩ trị liệu</div>
            </div>
            <div v-html="post.body" class="my-5"></div>
            <div class="my-1 flex items-center text-sm text-gray-400">
                <Calendar class="mr-2 h-4 w-4" />
                Cập nhật lần cuối
                {{ dayjs(post.updated_at).format('HH:mm DD/MM/YYYY') }}
            </div>
        </section>
        <hr />
        <section class="relative my-16 bg-white px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64">
            <div class="mb-16 text-center text-2xl font-extrabold uppercase text-primary">Bài viết liên quan</div>
            <div class="spacing w-full space-y-8">
                <a class="flex" v-for="(relatedPost, index) in post.related_posts" :key="`related_post_${index}`" :href="relatedPost.slug">
                    <div>
                        <img :src="$img(relatedPost.thumbnail_url)" alt="" class="w-48" />
                    </div>
                    <div class="ml-8">
                        <h4 class="text-xl font-bold">{{ relatedPost.title }}</h4>
                        <div class="my-3 flex items-center text-sm text-gray-400">
                            <Calendar class="mr-2 h-4 w-4" />
                            {{ dayjs(relatedPost.created_at).format('HH:mm DD/MM/YYYY') }}
                        </div>
                        <div class="my-3 flex items-center text-sm text-gray-400">
                            <Eye class="mr-2 h-4 w-4" />
                            {{ relatedPost.total_view }} lượt xem
                        </div>
                        <!--                        <div v-html="relatedPost.body"></div>-->
                    </div>
                </a>
            </div>
        </section>
        <hr />
    </SiteLayout>
</template>
