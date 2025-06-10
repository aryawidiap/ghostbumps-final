<script setup lang="ts">
import AppLayout from '@/layouts/admin/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import InputError from '@/components/InputError.vue';

const breadcrumbs: BreadcrumbItem[] = [
    { title: 'Dashboard', href: '/' },
    { title: 'Bookings', href: '#' },
    { title: 'Create New', href: '#' },
];

const form = useForm({
    location: '',
    date: '',
    time: '',
    NumberOfPerson: '',
    name: '',
    ticket_number: '',
    email: '',
    phone: '',
    notes: '', 
});

function submitForm() {
    form.post(route('admin.bookings.store'));
}
</script>

<template>
    <Head title="Dashboard / Create New Booking" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4 mt-10">
            <div class="bg-black text-white font-['Special_Elite'] w-full min-h-screen">
                <div class="w-full px-4 py-10">
                    <div class="text-3xl font-bold mb-4">Create New Booking</div>
                    <div class="flex justify-center">
                        <div class="bg-red-900 rounded-lg p-4 shadow-lg font-['Oswald'] w-full max-w-2xl">
                            <form @submit.prevent="submitForm" class="space-y-4">
                                <div>
                                    <label for="location" class="block mb-2">Location</label>
                                    <input id="location" type="text" v-model="form.location"
                                        class="w-full p-2 bg-white text-black rounded" />
                                    <InputError class="mt-2" :message="form.errors.location" />
                                </div>

                                <div>
                                    <label for="date" class="block mb-2">Date</label>
                                    <input id="date" type="date" v-model="form.date"
                                        class="w-full p-2 bg-white text-black rounded" />
                                    <InputError class="mt-2" :message="form.errors.date" />
                                </div>

                                <div>
                                    <label for="time" class="block mb-2">Time</label>
                                    <input id="time" type="time" v-model="form.time"
                                        class="w-full p-2 bg-white text-black rounded" />
                                    <InputError class="mt-2" :message="form.errors.time" />
                                </div>

                                <div>
                                    <label for="name" class="block mb-2">Name</label>
                                    <input id="name" type="text" v-model="form.name"
                                        class="w-full p-2 bg-white text-black rounded" />
                                    <InputError class="mt-2" :message="form.errors.name" />
                                </div>

                                <div>
                                    <label for="ticket_number" class="block mb-2">Ticket Number</label>
                                    <input id="ticket_number" type="text" v-model="form.ticket_number"
                                        class="w-full p-2 bg-white text-black rounded" />
                                    <InputError class="mt-2" :message="form.errors.ticket_number" />
                                </div>

                                <div>
                                    <label for="email" class="block mb-2">Email</label>
                                    <input id="email" type="email" v-model="form.email"
                                        class="w-full p-2 bg-white text-black rounded" />
                                    <InputError class="mt-2" :message="form.errors.email" />
                                </div>

                                <div>
                                    <label for="phone" class="block mb-2">Phone</label>
                                    <input id="phone" type="tel" v-model="form.phone"
                                        class="w-full p-2 bg-white text-black rounded" />
                                    <InputError class="mt-2" :message="form.errors.phone" />
                                </div>

                                <div>
                                    <label for="notes" class="block mb-2">Notes</label>
                                    <textarea id="notes" v-model="form.notes"
                                        class="w-full p-2 bg-white text-black rounded"></textarea>
                                    <InputError class="mt-2" :message="form.errors.notes" />
                                </div>

                                <button type="submit"
                                    class="mt-4 bg-white text-red-800 px-4 py-2 rounded hover:bg-gray-200 transition">
                                    Submit Booking
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
