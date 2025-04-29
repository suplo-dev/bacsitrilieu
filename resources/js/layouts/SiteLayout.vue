<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import Header from '@/layouts/Header.vue';
import Footer from '@/layouts/Footer.vue';

</script>

<template>
    <Head title="Trang chủ">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>
    <main class="w-full">
        <Header/>
        <slot/>
        <Footer/>
    </main>
</template>
<style scoped>
.cover {
    border-bottom-right-radius: 128px;
}

.bg-blue-teal-gradient {
    background: rgb(49, 130, 206);
    background: linear-gradient(90deg, rgba(49, 130, 206, 1) 0%, rgb(39, 97, 180) 100%);
}

@media (min-width: 1024px) {
    .cover {
        border-bottom-right-radius: 256px;
    }
}
</style>
