<script setup lang="ts">
import {
    NavigationMenu,
    NavigationMenuContent,
    NavigationMenuItem,
    NavigationMenuLink,
    NavigationMenuList,
    NavigationMenuTrigger,
    navigationMenuTriggerStyle,
} from '@/components/ui/navigation-menu';
</script>

<template>
    <header class="absolute left-0 top-0 z-50 w-full px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64">
        <div class="hidden items-center justify-between border-b border-white/25 py-2 py-3 text-sm text-white lg:flex">
            <ul class="flex">
                <li class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12,2C7.589,2,4,5.589,4,9.995C3.971,16.44,11.696,21.784,12,22c0,0,8.029-5.56,8-12C20,5.589,16.411,2,12,2z M12,14 c-2.21,0-4-1.79-4-4s1.79-4,4-4s4,1.79,4,4S14.21,14,12,14z"
                        />
                    </svg>
                    <span class="ml-2">19/10 ấp 4 Xã Phú Xuân, huyện Nhà Bè, TP. HCM</span>
                </li>
                <li class="ml-6 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M14.594,13.994l-1.66,1.66c-0.577-0.109-1.734-0.471-2.926-1.66c-1.193-1.193-1.553-2.354-1.661-2.926l1.661-1.66 l0.701-0.701L5.295,3.293L4.594,3.994l-1,1C3.42,5.168,3.316,5.398,3.303,5.643c-0.015,0.25-0.302,6.172,4.291,10.766 C11.6,20.414,16.618,20.707,18,20.707c0.202,0,0.326-0.006,0.358-0.008c0.245-0.014,0.476-0.117,0.649-0.291l1-1l0.697-0.697 l-5.414-5.414L14.594,13.994z"
                        />
                    </svg>
                    <span class="ml-2">0902 749 781</span>
                </li>
            </ul>
            <ul class="flex space-x-6">
                <li>
                    <a href="#">
                        <svg class="h-6 w-6" fill="currentColor">
                            <path d="M20,3H4C3.447,3,3,3.448,3,4v16..." />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <svg class="h-6 w-6" fill="currentColor">
                            <path d="M19.633,7.997c0.013,0.175,..." />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <svg class="h-6 w-6" fill="currentColor">
                            <path d="M20.947,8.305c-0.011-0.757,..." />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <svg class="h-6 w-6" fill="currentColor">
                            <path d="M21.593,7.203c-0.23-0.858,..." />
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
        <div class="flex items-start justify-between py-6">
            <a :href="route('home')" class="text-2xl font-bold text-white">
                Bác sĩ trị liệu
                <!--                    <img src="/storage/static/logo.png" style="width: 100%; height: auto; object-fit: cover;">-->
            </a>
            <nav class="hidden md:block">
                <NavigationMenu>
                    <NavigationMenuList>
                        <NavigationMenuItem v-for="(category, index) in $page.props.categories.category_header.children" :key="`category_header${index}`">
                            <template v-if="category.children.length">
                                <NavigationMenuTrigger>{{ category.name }}</NavigationMenuTrigger>
                                <NavigationMenuContent>
                                    <ul class="grid w-[300px] grid-cols-1 gap-3 p-4">
                                        <li v-for="(subCategory, indexSub) in category.children" :key="`category_header${index}_${indexSub}`">
                                            <NavigationMenuLink as-child>
                                                <a
                                                    :href="subCategory.slug"
                                                    class="block select-none space-y-1 rounded-md bg-transparent p-3 leading-none no-underline outline-none transition-colors hover:bg-accent hover:text-accent-foreground focus:bg-accent focus:text-accent-foreground"
                                                >
                                                    <div class="text-sm font-medium leading-none">
                                                        {{ subCategory.name }}
                                                    </div>
                                                    <p class="line-clamp-2 text-sm leading-snug text-muted-foreground">
                                                        {{ subCategory.description }}
                                                    </p>
                                                </a>
                                            </NavigationMenuLink>
                                        </li>
                                    </ul>
                                </NavigationMenuContent>
                            </template>
                            <template v-else>
                                <NavigationMenuLink :href="category.slug" :class="navigationMenuTriggerStyle()">
                                    {{ category.name }}
                                </NavigationMenuLink>
                            </template>
                        </NavigationMenuItem>
                    </NavigationMenuList>
                </NavigationMenu>
            </nav>
        </div>
    </header>
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
