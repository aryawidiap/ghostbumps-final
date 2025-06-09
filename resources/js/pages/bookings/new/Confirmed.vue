<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue'
import { type BreadcrumbItem } from '@/types'
import { Head } from '@inertiajs/vue3'
import { ref, onMounted } from 'vue'

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
]

defineProps(['confirmedTicket', 'customerName']);

const date = ref('')
const time = ref('')
const persons = ref(1)

onMounted(() => {
    date.value = localStorage.getItem('selectedDate') || 'Unknown'
    time.value = localStorage.getItem('selectedTime') || 'Unknown'
    persons.value = parseInt(localStorage.getItem('persons') || '1')
})

</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500&family=Special+Elite&display=swap');
</style>
<template>

    <Head title="Ticket booking / Ticket Confirmed" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="min-h-screen bg-red-800 flex flex-col items-center justify-center text-white">
                <div class="bg-red-700 p-6 rounded-lg w-[90%] max-w-md">
                    <h2 class="text-4xl font-semibold mb-4">Ticket booking successful! See your ticket details below.</h2>
                    <h2 class="text-2xl font-semibold mb-4">Ticket Details</h2>
                    <p><strong>Customer Name:</strong> {{ customerName }}</p>
                    <p><strong>Location:</strong> Ghostbumps Denpasar</p>
                    <p><strong>Date:</strong> {{ confirmedTicket.booking_date }}</p>
                    <p><strong>Time:</strong> {{ confirmedTicket.booking_hour }}.00 - {{ confirmedTicket.booking_hour+1 }}.00</p>
                    <p><strong>Number of Person(s):</strong> {{ confirmedTicket.number_of_persons }} person(s)</p>
                    <a :href="route('dashboard')">
                        <button
                            class="mt-6 bg-white text-red-800 px-4 py-2 rounded hover:bg-red-100 w-full">
                            Back to Dashboard
                        </button>
                    </a>
                    

                </div>
            </div>
        </div>
    </AppLayout>
</template>
