<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    { title: 'Dashboard', href: '/' },
    { title: 'Create New Location', href: '#' },
];

function nextStep() {
    router.visit('/locations/create/form');
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500&family=Special+Elite&display=swap');
</style>

<template>
    <Head title="Dashboard / Create New Location" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="bg-black text-white font-['Special_Elite'] w-full min-h-screen">
                <div class="w-full px-4 py-10">
                    <div class="text-3xl font-bold mb-2">Create New Location</div>
                    <div class="bg-red-900 rounded-lg p-4 shadow-lg text-center">
                        <p class="text-gray-300">Please fill out the form to create a new location.</p>
                        <button @click="nextStep" class="mt-4 bg-white text-red-800 px-4 py-2 rounded">Create</button>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

