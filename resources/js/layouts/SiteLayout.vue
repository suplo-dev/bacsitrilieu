<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import Header from '@/layouts/Header.vue';
import Footer from '@/layouts/Footer.vue';
import BodyCategory2 from '@/layouts/BodyCategory2.vue';

</script>

<template>
    <Head title="Trang chủ">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>
    <main class="w-full">
        <slot name="header">
            <Header/>
        </slot>
        <slot></slot>
        <BodyCategory2/>
        <Footer/>
    </main>
</template>
<style scoped>
.cover {
    border-bottom-right-radius: 128px;
}

@media (min-width: 1024px) {
    .cover {
        border-bottom-right-radius: 256px;
    }
}
</style>
