<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { Head, router } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import PlaceholderPattern from '@/components/PlaceholderPattern.vue';
import { type BreadcrumbItem } from '@/types';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];

defineProps(['bookings']);

const location = ref('');
const date = ref('');
const time = ref('');
const persons = ref(1);

onMounted(() => {
    location.value = localStorage.getItem('locationName') || 'Unknown';
    date.value = localStorage.getItem('selectedDate') || 'Unknown';
    time.value = localStorage.getItem('selectedTime') || 'Unknown';
});

function nextStep() {
    localStorage.setItem('persons', persons.value.toString());
    router.visit('/customer/bookings/new/confirm-details');
}
</script>
<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500&family=Special+Elite&display=swap');
</style>
<template>

    <Head title="Ticket Booking / Number Of Person" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="bg-black text-white font-['Special_Elite'] w-full min-h-screen">
                <!-- Main Content -->
                <div class="w-full px-4 py-10">
                    <div class="text-3xl font-bold mb-2">Ticket Booking</div>
                    <div class="text-xl font-light font-['Oswald'] text-gray-300 mb-6 text-center">
                        Please select the location to be visited.
                    </div>

                    <!-- Booking Summary -->
                    <div class="min-h-screen bg-red-900 flex flex-col items-center justify-center text-white rounded-xl p-6">
                        <div class="bg-red-700 p-6 rounded-lg w-[90%] max-w-md">
                            <h2 class="font-semibold">Location</h2>
                            <p class="text-4xl">{{ location }}</p>
                            <h2 class="font-semibold mt-4">Date & Time</h2>
                            <p class="text-2xl font-['Oswald']">{{ date }}</p>
                            <p class="text-2xl font-['Oswald']"> {{ time }}.00 - {{ parseInt(time)+1 }}.00</p>
                            <div class="mt-4">
                                <label for="persons" class="block mb-2">Number of Person(s):</label>
                                <input id="persons" type="number" v-model="persons" min="1" max="6"
                                    class="appearance-none text-center text-red-800 font-bold w-20 h-12 rounded-md bg-white shadow-md" />

                            </div>
                            <button @click="nextStep"
                                class="mt-6 bg-white text-red-800 px-4 py-2 rounded hover:bg-red-100 w-full">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>
    </AppLayout>
</template>
