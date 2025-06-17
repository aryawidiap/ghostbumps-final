<script setup lang="ts">
import AppLayout from '@/layouts/admin/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, useForm } from '@inertiajs/vue3';
import { ref, defineProps } from 'vue';
import { router } from '@inertiajs/vue3';
import InputError from '@/components/InputError.vue';

const breadcrumbs: BreadcrumbItem[] = [
    { title: 'Ticket Bookings', href: '/bookings' },
    { title: 'Refund Requests', href: '/refund' },
    { title: 'Process Refund', href: '#' },
];

const props = defineProps([
    'booking',
]);

const fileInput = ref<HTMLInputElement | null>(null);

const form = useForm({
    receipt: new File([""], "receipt"),
});

const changePhoto = (e: any) => {
    form.receipt = e.target.files[0];
};

function submitRefund() {
    form.post(route('admin.bookings.refundStore', props.booking));
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
                    <div class="text-3xl font-bold mb-2">Process Refund: Ticket #{{ booking.id }}</div>
                    <div class="text-lg font-light font-['Oswald'] text-gray-300 mb-6 text-center">
                        Check the details and add receipt to complete the refund process.
                    </div>
                    <div class="bg-red-900 rounded-lg p-4 shadow-lg">
                        <div class="text-white">
                            <h3 class="text-xl font-semibold mb-2">Ticket Details</h3>
                            <div class="overflow-x-auto">
                                <table class="min-w-full table-auto">
                                    <tbody class="">
                                        <tr>
                                            <td class="font-bold px-4 py-2 text-white">Customer Name</td>
                                            <td class="px-4 py-2 text-white">{{ booking.customer_name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-bold px-4 py-2 text-white">Location</td>
                                            <td class="px-4 py-2 text-white">{{ booking.location_name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-bold px-4 py-2 text-white">Date</td>
                                            <td class="px-4 py-2 text-white">{{ booking.booking_date }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-bold px-4 py-2 text-white">Time</td>
                                            <td class="px-4 py-2 text-white">{{ booking.booking_hour }}.00 - {{
                                                booking.booking_hour+1 }}.00</td>
                                        </tr>
                                        <tr>
                                            <td class="font-bold px-4 py-2 text-white">Number of Person(s)</td>
                                            <td class="px-4 py-2 text-white">{{ booking.number_of_persons }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-bold px-4 py-2 text-white">Feedback</td>
                                            <td class="px-4 py-2 text-white">{{ booking.cancel_reason }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <form @submit.prevent="submitRefund" class="space-y-4">
                                <div class="mt-4">
                                    <label class="block text-gray-300">Refund Receipt</label>
                                    <input type="file" ref="fileInput"
                                        class="w-full p-2 bg-white text-black rounded mb-4" @input="changePhoto">
                                    <InputError class="mt-2" :message="form.errors.receipt" />
                                </div>
                                
                                <button type="submit"
                                    class="bg-yellow-500 text-black px-4 py-2 rounded hover:cursor-pointer">Refund</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
