<script setup lang="ts">
import AppLayout from '@/layouts/admin/AppLayout.vue';
import { getImageSrc } from '@/service';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';


const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];

defineProps(['bookings', 'recentBookings', 'refundBookings']);

function formatDate(dateString: string) {
    const date = new Date(dateString);
    const year = date.getFullYear();
    const month = date.toLocaleString('default', { month: 'long' });
    const day = String(date.getDate()).padStart(2, '0');

    return `${day} ${month} ${year}`;
}
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
                                <div v-for="recentBooking in recentBookings"
                                    class="flex items-center bg-gray-300 rounded-lg p-4 text-black">
                                    <div class="w-12 h-12 bg-black rounded mr-4">
                                        <img :src="getImageSrc(recentBooking.photo_path)" class="object-cover" alt="">
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="font-bold">{{ recentBooking.location_name }}</h3>
                                        <p class="text-sm">{{ formatDate(recentBooking.booking_date)}} | {{
                                            recentBooking.booking_hour }}.00 - {{
                                                recentBooking.booking_hour +1 }}.00</p>
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
                                <div v-for="refundBooking in refundBookings" class="flex items-center bg-gray-300 rounded-lg p-4 text-black">
                                    <div class="w-12 h-12 bg-black rounded mr-4">
                                        <img :src="getImageSrc(refundBooking.photo_path)" class="object-cover" alt="">
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="font-bold">{{ refundBooking.location_name }}</h3>
                                        <p class="text-sm">{{ formatDate(refundBooking.booking_date)}} | {{
                                            refundBooking.booking_hour }}.00 - {{
                                                refundBooking.booking_hour +1 }}.00</p>
                                    </div>
                                    <a :href="route('admin.bookings.refund', refundBooking)"
                                        class="bg-red-800 hover:bg-red-500 text-white px-3 py-1 rounded font-bold">Process</a>
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
                                <tr v-for="booking in bookings"
                                    class="border-t border-red-800 hover:bg-gray-800/50 transition">
                                    <td class="p-3">{{ booking.id }}</td>
                                    <td class="p-3">{{ booking.location_name }}</td>
                                    <td class="p-3">{{ booking.booking_date }}</td>
                                    <td class="p-3">{{ booking.customer_name }}</td>
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
