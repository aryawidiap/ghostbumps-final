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

    <Head title="Make booking" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="bg-black text-white font-['Oswald'] w-full min-h-screen">
                <div class="w-full px-4 py-10">
                    <div class="text-6xl font-bold mb-2 font-['Special_Elite']">Hello, Admin!</div>

                    <!-- Next Experience and Logbook -->
                    <div class="grid md:grid-cols-2 gap-6 mb-10 font-['Oswald']">
                        <!-- Recent Bookings Table -->
                        <div>
                            <h2 class="text-2xl font-['Special_Elite'] mb-2">Recent Bookings</h2>
                            <div class="bg-gray-300 text-black p-4 rounded-lg flex justify-between items-center">
                                <div>
                                    <p class="font-semibold text-lg">nextExperience.name</p>
                                    <p>nextExperience.date | nextExperience.time</p>
                                </div>
                                <button
                                    class="bg-red-600 text-white rounded-full px-4 py-1 hover:bg-red-800 transition">
                                    Check in
                                </button>
                            </div>
                        </div>

                        <!-- Logbook -->
                        <div>
                            <div class="flex justify-between items-center mb-2">
                                <h2 class="text-2xl font-['Special_Elite']">Refund Requests</h2>
                                <button
                                    class="bg-red-600 text-white rounded-full px-4 py-1 hover:bg-red-800 transition">
                                    Show all
                                </button>
                            </div>
                            <div class="bg-gray-300 text-black p-4 rounded-lg flex justify-between items-center">
                                <div>
                                    <p class="font-semibold text-lg">log.name</p>
                                    <p>log.date | log.time</p>
                                </div>
                                <button
                                    class="bg-red-600 text-white rounded-full px-4 py-1 hover:bg-red-800 transition">
                                    Process
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- New Adventure Section -->
                    <h2 class="text-2xl mb-4 font-['Special_Elite']">All Bookings</h2>
                    <div class="flex flex-1 flex-col gap-6">
                        <div class="bg-red-900 rounded-3xl overflow-hidden md:flex shadow-lg mb-6 font-['Oswald']">
                            <table class="table-auto">
                                <thead>
                                    <tr>
                                        <th>Num. of Booking</th>
                                        <th>Location</th>
                                        <th>Booking Time</th>
                                        <th>Customer</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>The Sliding Mr. Bones (Next Stop, Pottersville)</td>
                                        <td>Malcolm Lockyer</td>
                                        <td>1961</td>
                                        <td>1961</td>
                                        <td>1961</td>
                                    </tr>
                                    <tr>
                                        <td>Witchy Woman</td>
                                        <td>The Eagles</td>
                                        <td>1972</td>
                                        <td>1972</td>
                                        <td>1972</td>
                                    </tr>
                                    <tr>
                                        <td>Shining Star</td>
                                        <td>Earth, Wind, and Fire</td>
                                        <td>1972</td>
                                        <td>1972</td>
                                        <td>1975</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="bg-gray-300 text-black p-4 rounded-lg text-center">
                            <p class="font-semibold text-lg mb-2">exp.name</p>
                            <p class="mb-4">exp.description</p>
                            <button
                                class="bg-red-600 text-white rounded-full px-4 py-1 hover:bg-red-800 transition">Learn
                                more</button>
                        </div>
                    </div>
                </div>
                <div
                    class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
                    <PlaceholderPattern />
                </div>
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
                                        Process
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
                                        Process
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
                                        Process
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
