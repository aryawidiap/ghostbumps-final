<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { ref, reactive } from 'vue';
import { router } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    { title: 'My Tickets', href: '/bookings' },
    { title: 'Cancel Ticket #1234908', href: '#' },
];

const agreePolicy = ref(false);

const props = defineProps([
    'booking',
]);

function nextStep() {
    if (agreePolicy.value) {
        router.visit(route('customer.bookings.cancel.reason', props.booking));
    }
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500&family=Special+Elite&display=swap');
</style>

<template>
    <Head :title="'My Tickets / Cancel Ticket #' +  props.booking.id" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="bg-black text-white font-['Special_Elite'] w-full min-h-screen">
                <div class="w-full px-4 py-10">
                    <div class="text-3xl font-bold mb-2">Cancel Ticket #{{ booking.id }}</div>
                    <div class="text-xl font-light font-['Oswald'] text-gray-300 mb-6 text-center">
                        Do you want to cancel this ticket?
                    </div>
                    <div class="bg-red-900 rounded-3xl overflow-hidden mb-6 md:flex shadow-lg p-6">
                        <div class="text-white">
                            <div class="mb-4">
                                <span class="font-bold">Event:</span> {{ booking.location_name }}
                            </div>
                            <div class="mb-4">
                                <span class="font-bold">Date:</span> {{ booking.booking_date }}
                            </div>
                            <div class="mb-4">
                                <span class="font-bold">Time:</span> {{ booking.booking_hour }}.00 - {{ booking.booking_hour + 1 }}.00
                            </div>
                        </div>
                    </div>
                    <div class="bg-red-800 p-6 rounded-lg">
                        <h3 class="text-xl font-semibold mb-4">Refund Policy</h3>
                        <ul class="list-disc pl-5 text-white">
                            <li>Cancellation can be made no later than 24 hours before the booking time.</li>
                            <li>Refunds will be processed within 2x24 hours of the cancellation.</li>
                        </ul>
                        <div class="mt-4">
                            <label class="flex items-center text-white">
                                <input type="checkbox" v-model="agreePolicy" class="mr-2">
                                I have read and agreed to the refund policy
                            </label>
                        </div>
                        <button @click="nextStep" :disabled="!agreePolicy" class="mt-4 bg-white text-red-800 px-4 py-2 rounded hover:cursor-pointer">Continue</button>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>