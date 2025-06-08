<script setup lang="ts">
import AppLayout from '@/layouts/admin/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import { router } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    { title: 'Dashboard', href: '/' },
    { title: 'Location', href: '#' },
];

// const locations = ref([
//     { id: 1, name: 'Ghostbumps Denpasar', image: '/images/bowling.jpg', shortDescription: 'Awesome bowling experience' },
//     { id: 2, name: 'Ghostbumps Surabaya', image: '/images/bowling.jpg', shortDescription: 'Another great spot' },
//     { id: 2, name: 'Ghostbumps Yogyakarta', image: '/images/bowling.jpg', shortDescription: 'Another great spot' },
// ]);

defineProps(['locations']);

function showLocation(location: any) {
    router.visit(route('admin.locations.show', location));
}

function createLocation() {
    router.visit(route('admin.locations.create'));
}

function truncate(data, num) {
    const reqdString = data.split(" ").slice(0, num).join(" ");
    return reqdString;
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
                    <button @click="createLocation" class="mb-4 bg-red-800 text-white px-4 py-2 rounded">+ Create New
                        Location</button>

                    <div class="flex flex-1 flex-col gap-4">
                        <div v-for="location in locations" v-bind:key="location.id"
                            class="bg-red-900 rounded-3xl overflow-hidden md:flex shadow-lg mb-6 font-['Oswald']">
                            <div class="md:w-1/2">
                                <!-- TODO: change the src to location:photo_path -->
                                <img src="/img/table-tennis-1428052_1920.jpg" alt="Ghostbumps Denpasar"
                                    class="w-full h-full object-cover" />
                            </div>
                            <div class="md:w-1/2 p-8">
                                <p class="text-base text-yellow-100">Location Name</p>
                                <h2 class="text-4xl font-bold font-['Special_Elite'] mt-2">{{ location.name }}</h2>

                                <p class="text-base text-yellow-100 mt-4">Location Address</p>
                                <p class="text-lg font-light">{{ location.address }}</p>

                                <p class="text-base text-yellow-100 mt-4">Description</p>
                                <p class="text-lg font-light leading-relaxed">
                                    {{ truncate(location.description, 30) }} ...
                                </p>

                                <p class="text-base text-yellow-100 mt-4">Short Description</p>
                                <p class="text-lg font-light leading-relaxed">
                                    {{ location.short_description }}
                                </p>
                                <button @click="showLocation(location)"
                                    class="mt-4 bg-white text-red-800 px-2 py-1 rounded">More</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>