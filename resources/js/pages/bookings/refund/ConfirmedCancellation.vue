<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    { title: 'My Tickets', href: '/bookings' },
    { title: 'Cancel Ticket #1234908', href: '#' },
];

defineProps([
    'booking',
]);

</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500&family=Special+Elite&display=swap');
</style>

<template>
    <Head title="My Tickets / Cancel Ticket #1234908" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="bg-black text-white font-['Special_Elite'] w-full min-h-screen">
                <div class="w-full px-4 py-10 flex flex-col items-center">
                    <div class="text-3xl font-bold mb-2">Cancel Ticket #{{ booking.id }}</div>
                    <div class="text-5xl mb-6 text-center">
                        <span class="text-green-500">✔</span>
                    </div>
                    <div class="text-xl font-light font-['Oswald'] text-gray-300 mb-6 text-center">
                        Your cancellation is confirmed.
                    </div>
                    <div class="bg-red-900 rounded-3xl overflow-hidden mb-6 md:flex shadow-lg p-6 text-center">
                        <div class="text-white">
                            Refund in Process
                            <div>Ticket {{ booking.id }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

