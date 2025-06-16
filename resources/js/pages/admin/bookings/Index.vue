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

defineProps(['bookings', 'recentBookings', 'refundBookings']);
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500&family=Special+Elite&display=swap');
</style>
<template>

    <Head title="Make booking" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="h-10"></div>
            <div class="bg-black text-white font-['Oswald'] w-full min-h-screen">
                <div class="text-6xl font-bold mb-2 font-['Special_Elite']">Hello, Admin!</div>
                <!-- Put code here -->
                <!-- Main Flex Container -->
                <div class="flex flex-col gap-6 px-4 bg-black min-h-screen py-6 text-white font-['Oswald']">
                    <!-- Bookings & Refunds Section -->
                    <div class="flex flex-col lg:flex-row gap-6">
                        <!-- Recent Bookings -->
                        <div class="flex-1">
                            <h2 class="text-2xl font-['Special_Elite'] mb-2">Recent Bookings</h2>
                            <div class="space-y-3">
                                <div class="flex items-center bg-gray-300 rounded-lg p-4 text-black">
                                    <div class="w-12 h-12 bg-black rounded mr-4"></div>
                                    <div class="flex-1">
                                        <h3 class="font-bold">Ghostbumps Denpasar</h3>
                                        <p class="text-sm">8 April 2024 | 13.00 – 14.00</p>
                                    </div>
                                    <button
                                        class="bg-red-800 hover:bg-red-500 text-white px-3 py-1 rounded font-bold">Check</button>
                                </div>
                                <div class="flex items-center bg-gray-300 rounded-lg p-4 text-black">
                                    <div class="w-12 h-12 bg-black rounded mr-4"></div>
                                    <div class="flex-1">
                                        <h3 class="font-bold">Ghostbumps Jogja</h3>
                                        <p class="text-sm">8 April 2024 | 13.00 – 14.00</p>
                                    </div>
                                    <button
                                        class="bg-red-800 hover:bg-red-500 text-white px-3 py-1 rounded font-bold">Check</button>
                                </div>
                                <div class="flex items-center bg-gray-300 rounded-lg p-4 text-black">
                                    <div class="w-12 h-12 bg-black rounded mr-4"></div>
                                    <div class="flex-1">
                                        <h3 class="font-bold">Ghostbumps Surabaya</h3>
                                        <p class="text-sm">8 April 2024 | 13.00 – 14.00</p>
                                    </div>
                                    <button
                                        class="bg-red-800 hover:bg-red-500 text-white px-3 py-1 rounded font-bold">Check</button>
                                </div>
                            </div>
                        </div>

                        <!-- Waiting for Refund -->
                        <div class="flex-1">
                            <h2 class="text-2xl font-['Special_Elite'] mb-2">Refund Requests</h2>
                            <div class="space-y-3">
                                <div class="flex items-center bg-gray-300 rounded-lg p-4 text-black">
                                    <div class="w-12 h-12 bg-black rounded mr-4"></div>
                                    <div class="flex-1">
                                        <h3 class="font-bold">Ghostbumps Denpasar</h3>
                                        <p class="text-sm">8 April 2024 | 13.00 – 14.00</p>
                                    </div>
                                    <button
                                        class="bg-red-800 hover:bg-red-500 text-white px-3 py-1 rounded font-bold">Process</button>
                                </div>
                                <div class="flex items-center bg-gray-300 rounded-lg p-4 text-black">
                                    <div class="w-12 h-12 bg-black rounded mr-4"></div>
                                    <div class="flex-1">
                                        <h3 class="font-bold">Ghostbumps Jogja</h3>
                                        <p class="text-sm">8 April 2024 | 13.00 – 14.00</p>
                                    </div>
                                    <button
                                        class="bg-red-800 hover:bg-red-500 text-white px-3 py-1 rounded font-bold">Process</button>
                                </div>
                                <div class="flex items-center bg-gray-300 rounded-lg p-4 text-black">
                                    <div class="w-12 h-12 bg-black rounded mr-4"></div>
                                    <div class="flex-1">
                                        <h3 class="font-bold">Ghostbumps Surabaya</h3>
                                        <p class="text-sm">8 April 2024 | 13.00 – 14.00</p>
                                    </div>
                                    <button
                                        class="bg-red-800 hover:bg-red-500 text-white px-3 py-1 rounded font-bold">Process</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- All Booking Table -->
                    <div class="flex-1">
                        <h2 class="text-2xl font-['Special_Elite'] mb-2">All Bookings</h2>
                        <table class="w-full text-white table-auto border-separate border-spacing-0">
                            <thead>
                                <tr class="text-left bg-red-800 text-white">
                                    <th class="p-3 rounded-tl-lg">Ticket No</th>
                                    <th class="p-3">Location</th>
                                    <th class="p-3">Date & Time</th>
                                    <th class="p-3">Customer Name</th>
                                    <th class="p-3 rounded-tr-lg">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-t border-red-800 hover:bg-gray-800/50 transition">
                                    <td class="p-3">2002</td>
                                    <td class="p-3">Ghostbumps Denpasar</td>
                                    <td class="p-3">14 April 2024</td>
                                    <td class="p-3">Gendhis</td>
                                    <td class="p-3">
                                        <button
                                            class="bg-yellow-100 text-black px-3 py-1 rounded font-bold hover:bg-yellow-300 transition">
                                            Show
                                        </button>
                                    </td>
                                </tr>
                                <tr class="border-t border-red-800 hover:bg-gray-800/50 transition">
                                    <td class="p-3">1200</td>
                                    <td class="p-3">Ghostbumps Jogja</td>
                                    <td class="p-3">12 April 2024</td>
                                    <td class="p-3">Reinhart</td>
                                    <td class="p-3">
                                        <button
                                            class="bg-yellow-100 text-black px-3 py-1 rounded font-bold hover:bg-yellow-300 transition">
                                            Show
                                        </button>
                                    </td>
                                </tr>
                                <tr class="border-t border-red-800 hover:bg-gray-800/50 transition">
                                    <td class="p-3">1100</td>
                                    <td class="p-3">Ghostbumps Surabaya</td>
                                    <td class="p-3">10 April 2024</td>
                                    <td class="p-3">Arya</td>
                                    <td class="p-3">
                                        <button
                                            class="bg-yellow-100 text-black px-3 py-1 rounded font-bold hover:bg-yellow-300 transition">
                                            Show
                                        </button>
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
