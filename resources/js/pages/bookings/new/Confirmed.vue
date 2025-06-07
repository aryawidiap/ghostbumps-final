<script setup lang="ts">
import PlaceholderPattern from '@/components/PlaceholderPattern.vue'
import AppLayout from '@/layouts/AppLayout.vue'
import { type BreadcrumbItem } from '@/types'
import { Head, router } from '@inertiajs/vue3'
import { ref, onMounted } from 'vue'

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
]

defineProps(['bookings'])

const date = ref('')
const time = ref('')
const persons = ref(1)

onMounted(() => {
    date.value = localStorage.getItem('selectedDate') || 'Unknown'
    time.value = localStorage.getItem('selectedTime') || 'Unknown'
    persons.value = parseInt(localStorage.getItem('persons') || '1')
})

function nextStep() {
    localStorage.setItem('persons', persons.value.toString())
    router.visit('bookings.store')
}
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
                    <h2 class="text-2xl font-semibold mb-4">Ticket Details</h2>
                    <p><strong>Customer Name:</strong> Gendhis</p>
                    <p><strong>Location:</strong> Ghostbumps Denpasar</p>
                    <p><strong>Date:</strong> {{ date }}</p>
                    <p><strong>Time:</strong> {{ time }}</p>
                    <p><strong>Number of Person(s):</strong> {{ persons }} person(s)</p>
                    <button @click="nextStep"
                        class="mt-6 bg-white text-red-800 px-4 py-2 rounded hover:bg-red-100 w-full">
                        Confirm
                    </button>

                </div>
            </div>
        </div>
    </AppLayout>
</template>
