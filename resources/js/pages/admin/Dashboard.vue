<script setup lang="ts">
import AppLayout from '@/layouts/admin/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import PlaceholderPattern from '@/components/PlaceholderPattern.vue';
import { formatDate, getImageSrc } from '@/service';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];

defineProps([
    'nextBooking',
    'bookings'
])
</script>
<!-- TODO: Create dashboard for admin -->
<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="h-10"></div>
            <div class="bg-black text-white font-['Oswald'] w-full min-h-screen">
                <div class="text-4xl font-bold mb-2 font-['Special_Elite']">Hello, Admin!</div>
                <!-- Put code here -->
                <!-- Main Flex Container -->
                <div class="flex flex-col gap-6 px-4 bg-black min-h-screen py-6 text-white font-['Oswald']">
                    <!-- Bookings & Refunds Section -->
                    <div class="flex flex-col lg:flex-row gap-6">
                        <!-- Recent Bookings -->
                        <div class="flex-1">
                            <h2 class="text-2xl font-['Special_Elite'] mb-2">Next Booking</h2>
                            <div v-if="nextBooking" class="space-y-3">
                                <div
                                    class="flex items-center bg-gray-300 rounded-lg p-4 text-black">
                                    <div class="w-12 h-12 bg-black rounded mr-4">
                                        <img :src="getImageSrc(nextBooking.photo_path)" class="object-cover" alt="">
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="font-bold">{{ nextBooking.location_name }}</h3>
                                        <p class="text-sm">{{ formatDate(nextBooking.booking_date)}} | {{
                                            nextBooking.booking_hour }}.00 - {{
                                                nextBooking.booking_hour +1 }}.00</p>
                                    </div>
                                    <button
                                        class="bg-red-800 hover:bg-red-500 text-white px-3 py-1 rounded font-bold">Check</button>
                                </div>
                            </div>
                            <div v-else>
                                No booking so far...
                            </div>
                        </div>

                        <!-- Waiting for Refund -->
                        <div class="flex-1">
                            <h2 class="text-2xl font-['Special_Elite'] mb-2">Booking stats</h2>
                            <div class="flex flex-wrap space-y-3">
                                
                                <div class="w-[250px]">
                                    <h3>Today's booking</h3>
                                    <div class="text-3xl">3</div>
                                </div>
                                <div class="w-[250px]">
                                    <h3>This week booking</h3>
                                    <div class="text-3xl">3</div>
                                </div>
                                <div class="w-[250px]">
                                    <h3>Today's Expected income</h3>
                                    <div class="text-3xl">Rp30000</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
