<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, router } from '@inertiajs/vue3';


const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Location',
        href: '/location',
    },
];

defineProps(['locations']);

function getImageSrc(path: string) {
  // Normalize the path
  return '/' + path.replace(/^\/+|\/+$/g, '').replace(/\/{2,}/g, '/')
}

function bookLocation(location: any) {
    router.visit(route('customer.new.select-time', location));
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500&family=Special+Elite&display=swap');
</style>

<template>
    <Head title="All Locations" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="bg-black text-white font-['Special_Elite'] w-full min-h-screen">
                <!-- Main Content -->
                <div class="w-full px-4 py-10">
                    <div class="text-3xl font-bold mb-6">Location</div>

                    <!-- Location Card -->
                     <!-- TODO: adjust margin -->
                    <div v-for="location in locations" v-bind:key="location.id" class="bg-red-900 rounded-3xl overflow-hidden md:flex shadow-lg mb-6">
                        <div class="md:w-1/2">
                            <!-- TODO: change the src to location:photo_path -->
                            <img :src="getImageSrc(location.photo_path)" alt="Ghostbumps Denpasar" class="w-full h-full object-cover" />
                        </div>
                        <div class="md:w-1/2 p-8 space-y-4">
                            <h2 class="text-2xl font-bold font-['Special_Elite']">{{ location.name }}</h2>
                            <p class="italic text-sm font-['Oswald']">{{ location.address }}</p>
                            <p class="text-sm leading-relaxed font-['Oswald']">
                                {{ location.description }}
                            </p>
                            <button @click="bookLocation(location)"
                                class="bg-white text-red-700 font-bold px-6 py-2 rounded-full hover:bg-gray-200 hover:text-red-900">
                                Get Ticket
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
