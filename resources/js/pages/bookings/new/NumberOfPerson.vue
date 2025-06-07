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

const date = ref('');
const time = ref('');
const persons = ref(1);

onMounted(() => {
    date.value = localStorage.getItem('selectedDate') || 'Unknown';
    time.value = localStorage.getItem('selectedTime') || 'Unknown';
});

function nextStep() {
    localStorage.setItem('persons', persons.value.toString());
    router.visit('/bookings/new/confirm-details');
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

                    <!-- Location Card -->
                    <div class="bg-red-900 rounded-3xl overflow-hidden mb-6 md:flex shadow-lg">
                        <div class="md:w-1/2">
                            <img src="house.jpg" alt="Ghostbumps Denpasar" class="w-full h-full object-cover" />
                        </div>
                        <div class="md:w-1/2 p-8 space-y-4">
                            <h2 class="text-2xl font-bold font-['Special_Elite']">Ghostbumps Denpasar</h2>
                            <p class="italic text-sm">Jl. Seram No.123, Denpasar</p>
                            <p class="text-sm leading-relaxed">
                                Experience the thrill of a haunted house adventure in the heart of Bali. Choose your
                                time and number of persons below.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Booking Summary -->
            <div class="min-h-screen bg-red-800 flex flex-col items-center justify-center text-white rounded-xl p-6">
                <div class="bg-red-700 p-6 rounded-lg w-[90%] max-w-md">
                    <h2 class="text-2xl font-semibold mb-4">Location :</h2>
                    <p>Ghostbumps Denpasar</p>
                    <h2 class="text-2xl font-semibold mb-4">Date & Time:</h2>
                    <p>{{ date }} {{ time }}</p>
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
    </AppLayout>
</template>
