<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import { router } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    { title: 'Dashboard', href: '/' },
    { title: 'All Locations', href: '#' },
];

const locations = ref([
    { id: 1, name: 'Ghostbumps Depasar', image: '/images/bowling.jpg', shortDescription: 'Awesome bowling experience' },
    { id: 2, name: 'Ghostbumps Surabaya', image: '/images/bowling.jpg', shortDescription: 'Another great spot' },
    { id: 2, name: 'Ghostbumps Yogyakarta', image: '/images/bowling.jpg', shortDescription: 'Another great spot' },
]);

function editLocation(id: number) {
    router.visit(`/locations/${id}/edit`);
}

function createLocation() {
    router.visit('/locations/create');
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500&family=Special+Elite&display=swap');
</style>

<template>
    <Head title="Dashboard / All Locations" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="bg-black text-white font-['Special_Elite'] w-full min-h-screen">
                <div class="w-full px-4 py-10">
                    <div class="text-3xl font-bold mb-2">All Locations</div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div v-for="location in locations" :key="location.id" class="bg-red-900 rounded-lg p-4 shadow-lg">
                            <img :src="location.image" alt="Location Image" class="w-full h-32 object-cover mb-2">
                            <h3 class="text-xl font-semibold">{{ location.name }}</h3>
                            <p class="text-gray-300">{{ location.shortDescription }}</p>
                            <button @click="editLocation(location.id)" class="mt-2 bg-white text-red-800 px-2 py-1 rounded">More</button>
                        </div>
                    </div>
                    <button @click="createLocation" class="mt-4 bg-red-800 text-white px-4 py-2 rounded">Create New Location</button>
                </div>
            </div>
        </div>
    </AppLayout>
</template>