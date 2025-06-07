<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { ref, defineProps } from 'vue';
import { router } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    { title: 'Ticket Bookings', href: '/bookings' },
    { title: 'Refund Requests', href: '/refund' },
    { title: 'Process Refund', href: '#' },
];

const props = defineProps<{
    ticketNo: string;
}>();

const ticketDetails = ref({
    customerName: 'Gendhis',
    location: 'Ghostbumps Depasar',
    date: '14 April 2024',
    time: '13:00 - 14:00',
    persons: '4 person(s)',
    feedback: 'Time not enough',
});

const fileInput = ref<HTMLInputElement | null>(null);

function submitRefund() {
    const formData = new FormData();
    if (fileInput.value?.files && fileInput.value.files[0]) {
        formData.append('receipt', fileInput.value.files[0]);
    }
    formData.append('ticketNo', props.ticketNo);
    router.post(`/refund/process/${props.ticketNo}`, formData, {
        forceFormData: true,
    });
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500&family=Special+Elite&display=swap');
</style>

<template>
    <Head title="Ticket Bookings / Refund Requests / Process Refund" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="bg-black text-white font-['Special_Elite'] w-full min-h-screen">
                <div class="w-full px-4 py-10">
                    <div class="text-3xl font-bold mb-2">Process Refund: Ticket #{{ ticketNo }}</div>
                    <div class="text-lg font-light font-['Oswald'] text-gray-300 mb-6 text-center">
                        Check the details and add receipt to complete the refund process.
                    </div>
                    <div class="bg-red-900 rounded-lg p-4 shadow-lg">
                        <div class="text-white">
                            <h3 class="text-xl font-semibold mb-2">Ticket Details</h3>
                            <p><span class="font-bold">Customer Name:</span> {{ ticketDetails.customerName }}</p>
                            <p><span class="font-bold">Location:</span> {{ ticketDetails.location }}</p>
                            <p><span class="font-bold">Date:</span> {{ ticketDetails.date }}</p>
                            <p><span class="font-bold">Time:</span> {{ ticketDetails.time }}</p>
                            <p><span class="font-bold">Number of Person(s):</span> {{ ticketDetails.persons }}</p>
                            <p><span class="font-bold">Feedback:</span> {{ ticketDetails.feedback }}</p>
                            <div class="mt-4">
                                <label class="block text-gray-300">Refund Receipt</label>
                                <input type="file" ref="fileInput" class="w-full p-2 bg-white text-black rounded mb-4">
                            </div>
                            <button @click="submitRefund" class="bg-yellow-500 text-black px-4 py-2 rounded">Refund</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
