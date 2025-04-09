<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
    posts: Object
});
</script>

<template>
    <Head title="Trang chủ">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>
    <main class="w-full">
        <!-- Header -->
        <header class="absolute top-0 left-0 w-full z-50 px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64">
            <div
                class="hidden lg:flex justify-between items-center py-2 border-b text-sm py-3 text-white border-white/25">
                <ul class="flex">
                    <li class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12,2C7.589,2,4,5.589,4,9.995C3.971,16.44,11.696,21.784,12,22c0,0,8.029-5.56,8-12C20,5.589,16.411,2,12,2z M12,14 c-2.21,0-4-1.79-4-4s1.79-4,4-4s4,1.79,4,4S14.21,14,12,14z" />
                        </svg>
                        <span class="ml-2">1985 Kerry Way, Whittier, CA, USA</span>
                    </li>
                    <li class="ml-6 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M14.594,13.994l-1.66,1.66c-0.577-0.109-1.734-0.471-2.926-1.66c-1.193-1.193-1.553-2.354-1.661-2.926l1.661-1.66 l0.701-0.701L5.295,3.293L4.594,3.994l-1,1C3.42,5.168,3.316,5.398,3.303,5.643c-0.015,0.25-0.302,6.172,4.291,10.766 C11.6,20.414,16.618,20.707,18,20.707c0.202,0,0.326-0.006,0.358-0.008c0.245-0.014,0.476-0.117,0.649-0.291l1-1l0.697-0.697 l-5.414-5.414L14.594,13.994z" />
                        </svg>
                        <span class="ml-2">+1 562-789-1935</span>
                    </li>
                </ul>
                <ul class="flex space-x-6">
                    <li><a href="#">
                        <svg class="w-6 h-6" fill="currentColor">
                            <path d="M20,3H4C3.447,3,3,3.448,3,4v16..." />
                        </svg>
                    </a></li>
                    <li><a href="#">
                        <svg class="w-6 h-6" fill="currentColor">
                            <path d="M19.633,7.997c0.013,0.175,..." />
                        </svg>
                    </a></li>
                    <li><a href="#">
                        <svg class="w-6 h-6" fill="currentColor">
                            <path d="M20.947,8.305c-0.011-0.757,..." />
                        </svg>
                    </a></li>
                    <li><a href="#">
                        <svg class="w-6 h-6" fill="currentColor">
                            <path d="M21.593,7.203c-0.23-0.858,..." />
                        </svg>
                    </a></li>
                </ul>
            </div>
            <div class="flex items-center justify-between py-6">
                <a href="/dentalpro/" class="text-white font-bold text-2xl">Bác sĩ trị liệu</a>
                <nav class="hidden md:block">
                    <ul class="flex space-x-4 text-white font-semibold">
                        <li><a href="#">Tin tức</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <!-- Hero -->
        <section
            class="cover bg-blue-teal-gradient relative bg-blue-600 px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 overflow-hidden py-48 flex items-center">
            <div class="absolute inset-0 z-0">
                <img src="images/cover-bg.jpeg" alt="" class="w-full h-full object-cover opacity-20" />
            </div>
            <div class="relative z-10 lg:w-3/4 xl:w-2/4">
                <h1 class="text-white text-4xl md:text-5xl xl:text-5xl font-bold leading-tight">Hành trình chữa lành bắt
                    đầu từ sự lắng nghe.</h1>
                <p class="text-blue-100 text-xl md:text-2xl mt-4">Chúng tôi cung cấp các giải pháp trị liệu tâm lý
                    chuyên sâu, cá nhân hóa theo nhu cầu – từ lo âu, trầm cảm đến định hướng cuộc sống.</p>
                <a href="#" class="mt-8 inline-block px-8 py-4 bg-teal-500 text-white rounded font-semibold">Tìm hiểu
                    thêm</a>
            </div>
        </section>

        <!-- About -->
        <section class="relative bg-gray-100 px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 py-32">
            <div class="flex flex-col md:flex-row lg:-mx-8">
                <div class="w-full lg:w-1/2 lg:px-8">
                    <!--                    <h6 class="text-sm uppercase font-semibold tracking-widest">Our clinic</h6>-->
                    <h2 class="text-2xl leading-tight font-bold mt-4">Bác sĩ trị liệu – Người đồng hành của bạn</h2>
                    <p class="text-lg mt-4">Tận tâm – Hiểu biết – Luôn ở đây vì bạn.</p>
                    <p class="mt-2 leading-relaxed">Kết hợp giữa chuyên môn vững vàng và sự thấu cảm sâu sắc trong từng
                        phiên trị liệu. Mang đến không gian an toàn để bạn lắng nghe chính mình và tìm lại cân bằng</p>
                </div>

                <div class="w-full lg:w-1/2 lg:px-8">
                    <div class="flex">
                        <div>
                            <div class="w-16 h-16 bg-blue-600 rounded-full"></div>
                        </div>
                        <div class="ml-8">
                            <h4 class="text-xl font-bold">Triết lý trị liệu: Lắng nghe không phán xét – Đồng hành và
                                chữa lành</h4>
                            <p class="mt-2 leading-relaxed">Trị liệu là sự đồng hành – nơi bạn không đơn độc trên hành
                                trình vượt qua khủng hoảng, tổn thương hay lo âu. Chúng tôi đi cùng bạn, từng bước một,
                                với lòng tin và sự kiên nhẫn.</p>
                        </div>
                    </div>

                    <div class="flex mt-8">
                        <div>
                            <div class="w-16 h-16 bg-blue-600 rounded-full"></div>
                        </div>
                        <div class="ml-8">
                            <h4 class="text-xl font-bold">Cam kết: Bảo mật – Chuyên môn – Nhân văn</h4>
                            <p class="mt-2 leading-relaxed">Mọi thông tin cá nhân và nội dung buổi trị liệu đều được giữ
                                kín. Bạn có thể yên tâm chia sẻ trong một môi trường an toàn và riêng tư..</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col md:flex-row mt-24 text-center md:-mx-4">
                <div class="bg-white rounded-lg shadow-lg p-8 md:mx-4 text-center">
                    <div class="w-24 h-24 bg-green-200 flex items-center justify-center rounded-full mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-10 h-10 text-gray-600"
                             viewBox="0 0 24 24"
                             fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round">
                            <circle cx="12" cy="5" r="1" />
                            <path d="m9 20 3-6 3 6" />
                            <path d="m6 8 6 2 6-2" />
                            <path d="M12 10v4" />
                        </svg>
                    </div>

                    <h4 class="text-xl font-bold">Thân thể</h4>
                    <p class="mt-1 text-gray-700">Let us show you how our experience.</p>
                    <a href="#" class="block mt-4 text-blue-600 hover:underline">Read More</a>
                </div>

                <div class="bg-white rounded-lg shadow-lg p-8 md:mx-4 text-center">
                    <div class="w-24 h-24 bg-pink-200 flex items-center justify-center rounded-full mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="w-10 h-10 text-gray-600">
                            <path
                                d="M12 5a3 3 0 1 0-5.997.125 4 4 0 0 0-2.526 5.77 4 4 0 0 0 .556 6.588A4 4 0 1 0 12 18Z" />
                            <path
                                d="M12 5a3 3 0 1 1 5.997.125 4 4 0 0 1 2.526 5.77 4 4 0 0 1-.556 6.588A4 4 0 1 1 12 18Z" />
                            <path d="M15 13a4.5 4.5 0 0 1-3-4 4.5 4.5 0 0 1-3 4" />
                            <path d="M17.599 6.5a3 3 0 0 0 .399-1.375" />
                            <path d="M6.003 5.125A3 3 0 0 0 6.401 6.5" />
                            <path d="M3.477 10.896a4 4 0 0 1 .585-.396" />
                            <path d="M19.938 10.5a4 4 0 0 1 .585.396" />
                            <path d="M6 18a4 4 0 0 1-1.967-.516" />
                            <path d="M19.967 17.484A4 4 0 0 1 18 18" />
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold">Tâm lý & hành vi</h4>
                    <p class="mt-1">Let us show you how our experience.</p>
                    <a href="#" class="block mt-4">Read More</a>
                </div>

                <div class="bg-white rounded-lg shadow-lg p-8 md:mx-4 text-center">
                    <div class="w-24 h-24 bg-yellow-200 flex items-center justify-center rounded-full mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="w-10 h-10 text-gray-600">
                            <path
                                d="M8.8 20v-4.1l1.9.2a2.3 2.3 0 0 0 2.164-2.1V8.3A5.37 5.37 0 0 0 2 8.25c0 2.8.656 3.054 1 4.55a5.77 5.77 0 0 1 .029 2.758L2 20" />
                            <path d="M19.8 17.8a7.5 7.5 0 0 0 .003-10.603" />
                            <path d="M17 15a3.5 3.5 0 0 0-.025-4.975" />
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold">Giao tiếp & nhận thức</h4>
                    <p class="mt-1">Let us show you how our experience.</p>
                    <a href="#" class="block mt-4">Read More</a>
                </div>

                <div class="bg-white rounded-lg shadow-lg p-8 md:mx-4 text-center">
                    <div class="w-24 h-24 bg-blue-200 flex items-center justify-center rounded-full mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="w-10 h-10 text-gray-600">
                            <circle cx="13.5" cy="6.5" r=".5" fill="currentColor" />
                            <circle cx="17.5" cy="10.5" r=".5" fill="currentColor" />
                            <circle cx="8.5" cy="7.5" r=".5" fill="currentColor" />
                            <circle cx="6.5" cy="12.5" r=".5" fill="currentColor" />
                            <path
                                d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10c.926 0 1.648-.746 1.648-1.688 0-.437-.18-.835-.437-1.125-.29-.289-.438-.652-.438-1.125a1.64 1.64 0 0 1 1.668-1.668h1.996c3.051 0 5.555-2.503 5.555-5.554C21.965 6.012 17.461 2 12 2z" />
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold">Sáng tạo & hỗ trợ </h4>
                    <p class="mt-1">Let us show you how our experience.</p>
                    <a href="#" class="block mt-4">Read More</a>
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

        <!-- Footer -->
        <footer class="relative bg-blue-teal-gradient text-white px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 py-24">
            <div class="flex flex-col md:flex-row">
                <div class="w-full lg:w-2/6 lg:mx-4 lg:pr-8">
                    <h3 class="font-bold text-2xl">DentalPro</h3>
                    <p class="text-gray-400">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
                        nonumy.</p>
                </div>

                <div class="w-full lg:w-1/6 mt-8 lg:mt-0 lg:mx-4">
                    <h5 class="uppercase tracking-wider font-semibold">Treatments</h5>
                    <ul class="mt-4">
                        <li class="mt-2"><a href="#" title="" class="opacity-75 hover:opacity-100">General Dentistry</a>
                        </li>
                        <li class="mt-2"><a href="#" title="" class="opacity-75 hover:opacity-100">Cosmetic
                            Dentistry</a></li>
                        <li class="mt-2"><a href="#" title="" class="opacity-75 hover:opacity-100">Oral Health</a></li>
                    </ul>
                </div>

                <div class="w-full lg:w-2/6 mt-8 lg:mt-0 lg:mx-4 lg:pr-8">
                    <h5 class="uppercase tracking-wider font-semibold">Contact Details</h5>
                    <ul class="mt-4">
                        <li>
                            <a href="#" title="" class="block flex items-center opacity-75 hover:opacity-100">
                <span>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                       class="fill-current">
                    <path
                        d="M12,2C7.589,2,4,5.589,4,9.995C3.971,16.44,11.696,21.784,12,22c0,0,8.029-5.56,8-12C20,5.589,16.411,2,12,2z M12,14 c-2.21,0-4-1.79-4-4s1.79-4,4-4s4,1.79,4,4S14.21,14,12,14z" />
                  </svg>
                </span>
                                <span class="ml-3">
                  1985 Kerry Way, Whittier, CA, USA
                </span>
                            </a>
                        </li>
                        <li class="mt-4">
                            <a href="#" title="" class="block flex items-center opacity-75 hover:opacity-100">
                <span>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                       class="fill-current">
                    <path
                        d="M12,2C6.486,2,2,6.486,2,12s4.486,10,10,10c5.514,0,10-4.486,10-10S17.514,2,12,2z M12,20c-4.411,0-8-3.589-8-8 s3.589-8,8-8s8,3.589,8,8S16.411,20,12,20z" />
                    <path d="M13 7L11 7 11 13 17 13 17 11 13 11z" /></svg>
                </span>
                                <span class="ml-3">
                  Mon - Fri: 9:00 - 19:00<br>
                  Closed on Weekends
                </span>
                            </a>
                        </li>
                        <li class="mt-4">
                            <a href="#" title="" class="block flex items-center opacity-75 hover:opacity-100">
                <span>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                       class="fill-current">
                    <path
                        d="M14.594,13.994l-1.66,1.66c-0.577-0.109-1.734-0.471-2.926-1.66c-1.193-1.193-1.553-2.354-1.661-2.926l1.661-1.66 l0.701-0.701L5.295,3.293L4.594,3.994l-1,1C3.42,5.168,3.316,5.398,3.303,5.643c-0.015,0.25-0.302,6.172,4.291,10.766 C11.6,20.414,16.618,20.707,18,20.707c0.202,0,0.326-0.006,0.358-0.008c0.245-0.014,0.476-0.117,0.649-0.291l1-1l0.697-0.697 l-5.414-5.414L14.594,13.994z" />
                  </svg>
                </span>
                                <span class="ml-3">
                  +1 562-789-1935
                </span>
                            </a>
                        </li>
                        <li class="mt-4">
                            <a href="#" title="" class="block flex items-center opacity-75 hover:opacity-100">
                <span>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                       class="fill-current">
                    <path
                        d="M20,4H4C2.896,4,2,4.896,2,6v12c0,1.104,0.896,2,2,2h16c1.104,0,2-0.896,2-2V6C22,4.896,21.104,4,20,4z M20,8.7l-8,5.334 L4,8.7V6.297l8,5.333l8-5.333V8.7z" />
                  </svg>
                </span>
                                <span class="ml-3">
                  dentalpro@example.com
                </span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="w-full lg:w-1/6 mt-8 lg:mt-0 lg:mx-4">
                    <h5 class="uppercase tracking-wider font-semibold">We're Social</h5>
                    <ul class="mt-4 flex">
                        <li>
                            <a href="#" target="_blank" title="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     class="fill-current">
                                    <path
                                        d="M20,3H4C3.447,3,3,3.448,3,4v16c0,0.552,0.447,1,1,1h8.615v-6.96h-2.338v-2.725h2.338v-2c0-2.325,1.42-3.592,3.5-3.592	c0.699-0.002,1.399,0.034,2.095,0.107v2.42h-1.435c-1.128,0-1.348,0.538-1.348,1.325v1.735h2.697l-0.35,2.725h-2.348V21H20	c0.553,0,1-0.448,1-1V4C21,3.448,20.553,3,20,3z" />
                                </svg>
                            </a>
                        </li>

                        <li class="ml-6">
                            <a href="#" target="_blank" title="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     class="fill-current">
                                    <path
                                        d="M19.633,7.997c0.013,0.175,0.013,0.349,0.013,0.523c0,5.325-4.053,11.461-11.46,11.461c-2.282,0-4.402-0.661-6.186-1.809	c0.324,0.037,0.636,0.05,0.973,0.05c1.883,0,3.616-0.636,5.001-1.721c-1.771-0.037-3.255-1.197-3.767-2.793	c0.249,0.037,0.499,0.062,0.761,0.062c0.361,0,0.724-0.05,1.061-0.137c-1.847-0.374-3.23-1.995-3.23-3.953v-0.05	c0.537,0.299,1.16,0.486,1.82,0.511C3.534,9.419,2.823,8.184,2.823,6.787c0-0.748,0.199-1.434,0.548-2.032	c1.983,2.443,4.964,4.04,8.306,4.215c-0.062-0.3-0.1-0.611-0.1-0.923c0-2.22,1.796-4.028,4.028-4.028	c1.16,0,2.207,0.486,2.943,1.272c0.91-0.175,1.782-0.512,2.556-0.973c-0.299,0.935-0.936,1.721-1.771,2.22	c0.811-0.088,1.597-0.312,2.319-0.624C21.104,6.712,20.419,7.423,19.633,7.997z" />
                                </svg>
                            </a>
                        </li>

                        <li class="ml-6">
                            <a href="#" target="_blank" title="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     class="fill-current">
                                    <path
                                        d="M20.947,8.305c-0.011-0.757-0.151-1.508-0.419-2.216c-0.469-1.209-1.424-2.165-2.633-2.633 c-0.699-0.263-1.438-0.404-2.186-0.42C14.747,2.993,14.442,2.981,12,2.981s-2.755,0-3.71,0.055 c-0.747,0.016-1.486,0.157-2.185,0.42C4.896,3.924,3.94,4.88,3.472,6.089C3.209,6.788,3.067,7.527,3.053,8.274 c-0.043,0.963-0.056,1.268-0.056,3.71s0,2.754,0.056,3.71c0.015,0.748,0.156,1.486,0.419,2.187 c0.469,1.208,1.424,2.164,2.634,2.632c0.696,0.272,1.435,0.426,2.185,0.45c0.963,0.043,1.268,0.056,3.71,0.056s2.755,0,3.71-0.056 c0.747-0.015,1.486-0.156,2.186-0.419c1.209-0.469,2.164-1.425,2.633-2.633c0.263-0.7,0.404-1.438,0.419-2.187 c0.043-0.962,0.056-1.267,0.056-3.71C21.003,9.572,21.003,9.262,20.947,8.305z M11.994,16.602c-2.554,0-4.623-2.069-4.623-4.623 s2.069-4.623,4.623-4.623c2.552,0,4.623,2.069,4.623,4.623S14.546,16.602,11.994,16.602z M16.801,8.263 c-0.597,0-1.078-0.482-1.078-1.078s0.481-1.078,1.078-1.078c0.595,0,1.077,0.482,1.077,1.078S17.396,8.263,16.801,8.263z" />
                                    <circle cx="11.994" cy="11.979" r="3.003" />
                                </svg>
                            </a>
                        </li>

                        <li class="ml-6">
                            <a href="#" target="_blank" title="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     class="fill-current">
                                    <path
                                        d="M21.593,7.203c-0.23-0.858-0.905-1.535-1.762-1.766C18.265,5.007,12,5,12,5S5.736,4.993,4.169,5.404	c-0.84,0.229-1.534,0.921-1.766,1.778c-0.413,1.566-0.417,4.814-0.417,4.814s-0.004,3.264,0.406,4.814	c0.23,0.857,0.905,1.534,1.763,1.765c1.582,0.43,7.83,0.437,7.83,0.437s6.265,0.007,7.831-0.403c0.856-0.23,1.534-0.906,1.767-1.763	C21.997,15.281,22,12.034,22,12.034S22.02,8.769,21.593,7.203z M9.996,15.005l0.005-6l5.207,3.005L9.996,15.005z" />
                                </svg>
                            </a>
                        </li>
                    </ul>

                    <p class="text-sm text-gray-400 mt-12">© 2018 ProDentists. <br class="hidden lg:block">All Rights
                        Reserved.
                    </p>
                </div>
            </div>
        </footer>
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

