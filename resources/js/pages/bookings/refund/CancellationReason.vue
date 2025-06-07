<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import { router } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    { title: 'My Tickets', href: '/bookings' },
    { title: 'Cancel Ticket #1234908', href: '#' },
];

const reason = ref('');

function nextStep() {
    if (reason.value) {
        router.post('/bookings/cancel/1234908', { reason: reason.value });
    }
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500&family=Special+Elite&display=swap');
</style>
<template>
    <Head title="My Tickets / Cancel Ticket #1234908" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="bg-black text-white font-['Special_Elite'] w-full min-h-screen">
                <div class="w-full px-4 py-10">
                    <div class="text-3xl font-bold mb-2">Cancel Ticket #1234908</div>
                    <div class="text-xl font-light font-['Oswald'] text-gray-300 mb-6 text-center">
                        Please tell us why you want to cancel this booking
                    </div>
                    <div class="bg-red-900 rounded-3xl overflow-hidden mb-6 md:flex shadow-lg p-6">
                        <div class="w-full">
                            <textarea v-model="reason" placeholder="Type your reason here..." class="w-full h-32 p-4 bg-white text-black rounded-lg"></textarea>
                            <button @click="nextStep" :disabled="!reason" class="mt-4 bg-white text-red-800 px-4 py-2 rounded">Confirm Cancellation</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>