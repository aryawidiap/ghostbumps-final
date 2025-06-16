<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];

defineProps(['user', 'logbook', 'nextExperience', 'visitedLocations', 'unvisitedLocation']);



const revisit = [
    { name: 'Ghostbumps Denpasar', description: 'Discover eda ngaden awak bisa depang anake ngadanin' },
    { name: 'Ghostbumps Surabaya', description: 'Discover eda ngaden awak bisa depang anake ngadanin' }
]

const newAdventures = [
    { name: 'Ghostbumps Jogja', description: 'Discover eda ngaden awak bisa depang anake ngadanin' },
    { name: 'Ghostbumps Bandung', description: 'Discover eda ngaden awak bisa depang anake ngadanin' },
    { name: 'Ghostbumps Jakarta', description: 'Discover eda ngaden awak bisa depang anake ngadanin' }
]
</script>
<!-- Create Dashboard -->
<template>

    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="min-h-screen bg-[#120b0b] text-white font-['Oswald'] p-6">
                <h1 class="text-3xl font-bold mb-6">Welcome Back, {{ user.name }}.</h1>

                <!-- Next Experience and Logbook -->
                <div class="grid md:grid-cols-2 gap-6 mb-10">
                    <!-- Next Experience -->
                    <div>
                        <h2 class="text-xl mb-2">Your next experience</h2>
                        <div :key="nextExperience.id" class="bg-gray-300 text-black p-4 rounded-lg flex justify-between items-center">
                            <div>
                                <p class="font-semibold text-lg">{{ nextExperience.location_name }}</p>
                                <p>{{ nextExperience.booking_date }} | {{ nextExperience.booking_hour }}.00 - {{
                                    nextExperience.booking_hour+1 }}.00</p>
                            </div>
                            <button
                                class="bg-red-600 text-white rounded-full px-4 py-1 hover:bg-red-800 transition">Manage</button>
                        </div>
                    </div>

                    <!-- Logbook -->
                    <div>
                        <h2 class="text-xl mb-2">Your logbook</h2>
                        <div v-for="booking in logbook" :key="booking.id"
                            class="bg-gray-300 text-black p-4 mb-2 rounded-lg flex justify-between items-center">
                            <div class="flex flex-col items-start gap-2">
                                <p class="font-semibold text-lg">{{ booking.location_name }}</p>
                                <p>{{ booking.booking_date }} | {{ booking.booking_hour }}.00 - {{
                                    booking.booking_hour+1 }}.00</p>
                                <div v-if="booking.status == 'confirmed'"
                                    class="text-sm text-white py-2 px-3 rounded-full bg-blue-600">{{ booking.status }}</div>
                                <div v-else-if="booking.status == 'cancelled'"
                                    class="text-sm text-white py-2 px-3 rounded-full bg-yellow-600">refund in process</div>
                                <div v-else-if="booking.status == 'refunded'"
                                    class="text-sm text-white py-2 px-3 rounded-full bg-gray-600">{{ booking.status }}</div>
                                <div v-else-if="booking.status == 'completed'"
                                    class="text-sm text-white py-2 px-3 rounded-full bg-green-600">{{ booking.status }}</div>
                            </div>
                            <button
                                class="bg-red-600 text-white rounded-full px-4 py-1 hover:bg-red-800 transition">Manage</button>
                        </div>
                    </div>
                </div>

                <!-- Revisit Section -->
                <h2 class="text-2xl mb-4">Revisit the experience</h2>
                <div class="grid md:grid-cols-2 gap-6 mb-10">
                    <div v-for="location in visitedLocations" :key="location.name"
                        class="bg-gray-300 text-black p-4 rounded-lg text-center">
                        <p class="font-semibold text-lg mb-2">{{ location.name }}</p>
                        <p class="mb-4">{{ location.description }}</p>
                        <button class="bg-red-600 text-white rounded-full px-4 py-1 hover:bg-red-800 transition">Book
                            again</button>
                    </div>
                </div>

                <!-- New Adventure Section -->
                <h2 class="text-2xl mb-4">New adventure awaits</h2>
                <div class="grid md:grid-cols-3 gap-6">
                    <div v-for="exp in newAdventures" :key="exp.name"
                        class="bg-gray-300 text-black p-4 rounded-lg text-center">
                        <p class="font-semibold text-lg mb-2">{{ exp.name }}</p>
                        <p class="mb-4">{{ exp.description }}</p>
                        <button class="bg-red-600 text-white rounded-full px-4 py-1 hover:bg-red-800 transition">Learn
                            more</button>
                    </div>
                </div>
            </div>
            <div
                class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
                <PlaceholderPattern />
            </div>
        </div>
    </AppLayout>
</template>
