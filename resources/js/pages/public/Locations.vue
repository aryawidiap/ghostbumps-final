<script setup lang="ts">
import { getImageSrc } from '@/service';
import { Head, Link } from '@inertiajs/vue3';
import Navbar from './components/Navbar.vue';

defineProps(['locations']);

</script>

<template>

    <Head title="Welcome">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>
    <div
        class="flex min-h-screen flex-col items-center bg-[#FDFDFC] text-[#1b1b18] dark:bg-[#0a0a0a] lg:justify-center ">
        <Navbar />
        <div
            class="duration-750 starting:opacity-0 flex w-full items-center justify-center opacity-100 transition-opacity lg:grow">
            <main
                class="flex w-full max-w-[335px] flex-col-reverse overflow-hidden rounded-lg lg:max-w-4xl lg:flex-row">
                <div class="bg-black text-white font-['Special_Elite'] w-full min-h-screen">
                    <!-- Main Content -->
                    <div class="w-full px-4 py-10">
                        <div class="text-3xl font-bold mb-6">Locations</div>

                        <!-- Location Card -->
                        <div v-for="location in locations" v-bind:key="location.id"
                            class="bg-red-900 rounded-3xl overflow-hidden md:flex shadow-lg mb-6">
                            <div class="md:w-1/2">
                                <!-- TODO: change the src to location:photo_path -->
                                <img :src="getImageSrc(location.photo_path)" alt="Ghostbumps Denpasar"
                                    class="w-full h-full object-cover" />
                            </div>
                            <div class="md:w-1/2 p-8 space-y-4">
                                <h2 class="text-2xl font-bold font-['Special_Elite']">{{ location.name }}</h2>
                                <p class="italic text-sm">{{ location.address }}</p>
                                <p class="text-sm leading-relaxed">
                                    {{ location.description }}
                                </p>
                                <a :href="route('customer.new.select-location')"
                                    class="bg-white text-red-700 font-bold px-6 py-3 rounded-full hover:bg-gray-200 hover:text-red-900">
                                    Get Ticket
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div class="h-14.5 hidden lg:block"></div>
    </div>
</template>
