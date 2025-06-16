<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { getImageSrc } from '@/service';
import { type BreadcrumbItem } from '@/types';
import { Head, router } from '@inertiajs/vue3';


const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];

defineProps(['bookings']);

function newBooking() {
    router.visit(route('customer.new.select-location'));
}

function dateOnlyFromUTC(date: Date){

}
</script>

<template>

    <Head title="All Booking" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <a class="flex flex-row justify-center p-5 bg-red-900 rounded-3xl overflow-hidden md:flex shadow-lg mb-6"
                :href="route('customer.new.select-location')">
                <h2 class="text-2xl font-bold font-['Special_Elite']">Book new ticket +</h2>
            </a>
            <div
                class="relative min-h-[100vh] flex-1 md:min-h-min">
                <h2 class="text-4xl font-bold font-['Special_Elite'] mb-5">All ticket</h2>
                <div v-if="!bookings">
                    You have not book any ticket. Book now!
                </div>
                <div v-for="booking in bookings" v-bind:key="booking.id"
                    class="bg-red-900 rounded-3xl mb-5 overflow-hidden md:flex shadow-lg">
                    <div class="md:w-1/2">
                        <!-- TODO: change the src to booking:photo_path -->
                        <img :src="getImageSrc(booking.photo_path)" alt="Ghostbumps Denpasar"
                            class="w-full h-full object-cover" />
                    </div>
                    <div class="md:w-1/2 p-8 space-y-4 font-['Oswald']">
                        <h2 class="text-2xl font-bold font-['Special_Elite']">{{ booking.location_name }}</h2>
                        <p class="text-sm">{{ booking.booking_date }}</p>
                        <p class="text-sm">{{ booking.booking_hour }}.00 - {{ booking.booking_hour+1 }}.00</p>
                        <p class="text-sm">{{ booking.number_of_persons }} person(s)</p>
                        <div v-if="booking.status == 'confirmed'" class="text-sm py-2 px-3 rounded-full bg-blue-600">{{ booking.status }}</div>
                        <div v-else-if="booking.status == 'cancelled'" class="text-sm py-2 px-3 rounded-full bg-yellow-600">refund in process</div>
                        <div v-else-if="booking.status == 'refunded'" class="text-sm py-2 px-3 rounded-full bg-gray-600">{{ booking.status }}</div>
                        <div v-else-if="booking.status == 'completed'" class="text-sm py-2 px-3 rounded-full bg-green-600">{{ booking.status }}</div>
                        <p class="text-sm leading-relaxed">
                            {{ booking.location_description }}
                        </p>
                        <a v-if="booking.status == 'confirmed'" :href="route('customer.bookings.show', booking)"
                            class="bg-white text-red-700 font-bold px-6 py-2 rounded-full hover:bg-gray-200 hover:text-red-900">
                            Modify
                        </a>
                        
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
