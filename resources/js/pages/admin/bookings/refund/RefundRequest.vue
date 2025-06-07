<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import { router } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    { title: 'Ticket Bookings', href: '/bookings' },
    { title: 'Refund Requests', href: '#' },
];

const refundRequests = ref([
    { ticketNo: '2002', location: 'Ghostbumps Depasar', dateTime: '14 April 2024', customerName: 'Gendhis' },
    { ticketNo: '1200', location: 'Ghostbumps Jogja', dateTime: '12 April 2024', customerName: 'Reinhart' },
    { ticketNo: '1100', location: 'Ghostbumps Surabaya', dateTime: '10 April 2024', customerName: 'Arya' },
]);

function processRefund(ticketNo: string) {
    router.visit(`/refund/process/${ticketNo}`);
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500&family=Special+Elite&display=swap');
</style>

<template>
    <Head title="Ticket Bookings / Refund Requests" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="bg-black text-white font-['Special_Elite'] w-full min-h-screen">
                <div class="w-full px-4 py-10">
                    <div class="text-3xl font-bold mb-2">Refund Requests</div>
                    <div class="bg-red-900 rounded-lg p-4 shadow-lg">
                        <table class="w-full text-white">
                            <thead>
                                <tr>
                                    <th class="p-2">Ticket No</th>
                                    <th class="p-2">Location</th>
                                    <th class="p-2">Date & Time</th>
                                    <th class="p-2">Customer Name</th>
                                    <th class="p-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="request in refundRequests" :key="request.ticketNo" class="border-t border-red-800">
                                    <td class="p-2">{{ request.ticketNo }}</td>
                                    <td class="p-2">{{ request.location }}</td>
                                    <td class="p-2">{{ request.dateTime }}</td>
                                    <td class="p-2">{{ request.customerName }}</td>
                                    <td class="p-2">
                                        <button @click="processRefund(request.ticketNo)" class="bg-yellow-500 text-black px-2 py-1 rounded">Process</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

