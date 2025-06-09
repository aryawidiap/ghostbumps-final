<script setup lang="ts">
import AppLayout from '@/layouts/admin/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';


const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];

defineProps(['bookings']);
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500&family=Special+Elite&display=swap');
</style>
<template>

    <Head title="Booking | Refund Requests" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <!-- Put code here -->
            <div class="flex flex-col lg:flex-row gap-6 px-4">
                <!-- Recent Bookings -->
                <div class="flex-1">
                    <h2 class="text-2xl font-['Oswald'] mb-2">Recent Bookings</h2>
                    <div class="bg-gray-800 rounded-lg shadow-lg overflow-x-auto">
                        <table class="w-full text-white table-auto border-separate border-spacing-0">
                            <thead>
                                <tr class="text-left">
                                    <th class="p-3 bg-gray-700 rounded-tl-lg">Location</th>
                                    <th class="p-3">Date & Time</th>
                                    <th class="p-3 rounded-tr-lg">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="hover:bg-gray-700/50 transition">
                                    <td class="p-3 font-semibold">Ghostbumps Denpasar</td>
                                    <td class="p-3">8 April 2024 | 13.00 – 14.00</td>
                                    <td class="p-3">
                                        <button
                                            class="bg-red-600 hover:bg-red-500 text-white px-3 py-1 rounded font-semibold">Check</button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-700/50 transition">
                                    <td class="p-3 font-semibold">Ghostbumps Jogja</td>
                                    <td class="p-3">8 April 2024 | 13.00 – 14.00</td>
                                    <td class="p-3">
                                        <button
                                            class="bg-red-600 hover:bg-red-500 text-white px-3 py-1 rounded font-semibold">Check</button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-700/50 transition">
                                    <td class="p-3 font-semibold">Ghostbumps Surabaya</td>
                                    <td class="p-3">8 April 2024 | 13.00 – 14.00</td>
                                    <td class="p-3">
                                        <button
                                            class="bg-red-600 hover:bg-red-500 text-white px-3 py-1 rounded font-semibold">Check</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Waiting for Refund -->
                <div class="flex-1">
                    <h2 class="text-2xl font-['Oswald'] mb-2">Waiting for Refund</h2>
                    <div class="bg-gray-800 rounded-lg shadow-lg overflow-x-auto">
                        <table class="w-full text-white table-auto border-separate border-spacing-0">
                            <thead>
                                <tr class="text-left">
                                    <th class="p-3 bg-gray-700 rounded-tl-lg">Location</th>
                                    <th class="p-3">Date & Time</th>
                                    <th class="p-3 rounded-tr-lg">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="hover:bg-gray-700/50 transition">
                                    <td class="p-3 font-semibold">Ghostbumps Denpasar</td>
                                    <td class="p-3">8 April 2024 | 13.00 – 14.00</td>
                                    <td class="p-3">
                                        <button
                                            class="bg-red-600 hover:bg-red-500 text-white px-3 py-1 rounded font-semibold">Process</button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-700/50 transition">
                                    <td class="p-3 font-semibold">Ghostbumps Jogja</td>
                                    <td class="p-3">8 April 2024 | 13.00 – 14.00</td>
                                    <td class="p-3">
                                        <button
                                            class="bg-red-600 hover:bg-red-500 text-white px-3 py-1 rounded font-semibold">Process</button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-700/50 transition">
                                    <td class="p-3 font-semibold">Ghostbumps Surabaya</td>
                                    <td class="p-3">8 April 2024 | 13.00 – 14.00</td>
                                    <td class="p-3">
                                        <button
                                            class="bg-red-600 hover:bg-red-500 text-white px-3 py-1 rounded font-semibold">Process</button>
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
