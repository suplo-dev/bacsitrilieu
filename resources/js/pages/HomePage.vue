<script setup lang="ts">
import SiteLayout from '@/layouts/SiteLayout.vue';
</script>

<template>
    <SiteLayout>
        <!-- Hero -->
        <section
            class="cover bg-primary relative flex items-center overflow-hidden bg-blue-600 px-4 pb-48 pt-16 sm:px-8 lg:px-16 xl:px-40 2xl:px-64"
        >
<!--            <div class="absolute inset-0 z-0">-->
<!--                <img src="images/cover-bg.jpeg" alt="" class="h-full w-full object-cover opacity-20" />-->
<!--            </div>-->
            <div class="relative z-10 lg:w-3/4 xl:w-2/4">
                <h1 class="text-4xl font-bold leading-tight text-white md:text-5xl xl:text-5xl">Hành trình chữa lành bắt đầu từ sự lắng nghe.</h1>
                <p class="mt-4 text-xl text-blue-100 md:text-2xl">
                    Chúng tôi cung cấp các giải pháp trị liệu tâm lý chuyên sâu, cá nhân hóa theo nhu cầu – từ lo âu, trầm cảm đến định hướng cuộc
                    sống.
                </p>
                <a href="#" class="mt-8 inline-block rounded bg-teal-500 px-8 py-4 font-semibold text-white">Tìm hiểu thêm</a>
            </div>
        </section>
        <section class="relative bg-gray-100 px-4 py-16 sm:px-8 lg:px-16 xl:px-40 2xl:px-64">
            <div class="flex flex-col md:flex-row lg:-mx-8">
                <div class="w-full lg:w-1/2 lg:px-8">
                    <!--                    <h6 class="text-sm uppercase font-semibold tracking-widest">Our clinic</h6>-->
                    <h2 class="text-2xl font-bold leading-tight">Bác sĩ Trần Thị Cẩm Tiên</h2>
                    <p class="mt-4 text-lg">Chuyên gia Vật lý trị liệu & Phục hồi chức năng</p>
                    <div class="mt-2 leading-relaxed">
                        Với nền tảng chuyên môn được đào tạo bài bản tại Đài Loan, bác sĩ Trần Thị Cẩm Tiên đã có 2 năm làm việc tại bệnh viện tại
                        đây, tích lũy kinh nghiệm thực tế trong điều trị và phục hồi chức năng cho các trường hợp phức tạp. Chị chuyên sâu trong lĩnh
                        vực:
                    </div>
                    <ul class="my-2 ml-10 list-disc space-y-1">
                        <li>Phục hồi chức năng cho bệnh nhân bại não, chấn thương não</li>
                        <li>Trị liệu và hỗ trợ phát triển cho trẻ em chậm phát triển</li>
                        <li>Phục hồi vận động cho người mắc bệnh lý cơ xương khớp</li>
                    </ul>
                    <p>
                        Với triết lý trị liệu <strong>“Trị liệu hôm nay, phục hồi ngày mai”</strong>, bác sĩ Tiên luôn chú trọng lựa chọn các phương
                        pháp cá nhân hóa, phù hợp với tình trạng và khả năng hồi phục của từng bệnh nhân. Sự tận tâm, nhẹ nhàng và chuyên nghiệp là
                        điều giúp bác sĩ Tiên đồng hành lâu dài cùng người bệnh trên hành trình phục hồi – không chỉ thể chất mà cả tinh thần.
                    </p>
                </div>

                <div class="w-full space-y-8 mt-8 lg:mt-0 lg:w-1/2 lg:px-8">
                    <a
                        class="flex"
                        v-for="(category, index) in $page.props.categories.category_body_1.children"
                        :key="`category_body_1_${index}`"
                        :href="category.slug"
                    >
                        <div>
                            <div class="h-16 w-16 rounded-full bg-primary items-center flex justify-center">
                                <img :src="category.icon" alt="">
                            </div>
                        </div>
                        <div class="ml-8">
                            <h4 class="text-xl font-bold">{{ category.name }}</h4>
                            <p class="mt-2 leading-relaxed">{{ category.description }}</p>
                        </div>
                    </a>
                </div>
            </div>
        </section>
        <!-- Testimonials -->
        <!--        <section class="relative bg-white px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 py-32">-->
        <!--            <div class="flex flex-col md:flex-row lg:-mx-8">-->
        <!--                <div class="w-full lg:w-1/2 lg:px-8">-->
        <!--                    <h6 class="text-sm uppercase font-semibold tracking-widest">Patient testimonials</h6>-->
        <!--                    <h2 class="text-3xl leading-tight font-bold mt-4">Why choose the Mesothelioma Center?</h2>-->
        <!--                    <p class="mt-2 leading-relaxed">Aenean ut tellus tellus. Suspendisse potenti. Nullam tincidunt lacus-->
        <!--                        tellus,-->
        <!--                        sed aliquam est vehicula a. Pellentesque consectetur condimentum nulla, eleifend condimentum-->
        <!--                        purus vehicula-->
        <!--                        in. Donec convallis sollicitudin facilisis. Integer nisl ligula, accumsan non tincidunt ac,-->
        <!--                        imperdiet in-->
        <!--                        enim. Donec efficitur ullamcorper metus, eu venenatis nunc. Nam eget neque tempus, mollis sem a,-->
        <!--                        faucibus-->
        <!--                        mi.</p>-->
        <!--                </div>-->

        <!--                <div class="w-full lg:w-1/2 lg:px-8">-->
        <!--                    <div class="bg-gray-400 w-full h-72 rounded-lg"></div>-->

        <!--                    <p class="italic text-sm mt-2 text-right">Aenean ante nisi, gravida non mattis semper.</p>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </section>-->
    </SiteLayout>
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
