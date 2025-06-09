<script setup lang="ts">
import PlaceholderPattern from '@/components/PlaceholderPattern.vue'
import AppLayout from '@/layouts/AppLayout.vue'
import { type BreadcrumbItem } from '@/types'
import { Head, useForm } from '@inertiajs/vue3'
import { ref, onMounted } from 'vue'

// Props: receives user data from the Laravel controller
const props = defineProps<{
    user: {
        name: string
    }
}>()

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
]

// Refs to store localStorage values
const date = ref('')
const time = ref(0)
const number_of_persons = ref(1)
const location_id = ref(-1)
const location_name = ref('')

// Setup localStorage values
onMounted(() => {
    date.value = localStorage.getItem('selectedDate') || 'Unknown'
    time.value = parseInt(localStorage.getItem('selectedTime') || '0')
    number_of_persons.value = parseInt(localStorage.getItem('persons') || '1')
    location_id.value = parseInt(localStorage.getItem('locationId') || '-1') 
    location_name.value = localStorage.getItem('locationName') || ''
})

// Inertia form
const form = useForm({
    name: props.user.name,
    date: '',
    time: 0,
    number_of_persons: 1,
    location_id: -1,
    location_name: '',
})

function submitBooking() {
    form.date = date.value
    form.time = time.value
    form.number_of_persons = number_of_persons.value
    form.location_id = location_id.value

    form.post(route('customer.new.booking.store'), {
        onSuccess: () => {
            console.log('Booking submitted successfully')
        },
        onError: (errors) => {
            console.error('Validation errors:', errors)
        },
    })
}
</script>


<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500&family=Special+Elite&display=swap');
</style>
<template>
    <Head title="Make booking" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="min-h-screen bg-red-800 flex flex-col items-center justify-center text-white">
                <div class="bg-red-700 p-6 rounded-lg w-[90%] max-w-md">
                    <h2 class="text-2xl font-semibold mb-4">Ticket Details</h2>
                    <p><strong>Customer Name:</strong> {{ props.user.name }}</p>
                    <p><strong>Location:</strong> {{ location_name }}</p>
                    <p><strong>Date:</strong> {{ date }}</p>
                    <p><strong>Time:</strong> {{ time }}.00 - {{ time + 1 }}.00</p>
                    <p><strong>Number of Person(s):</strong> {{ number_of_persons }} person(s)</p>

                    <button
                        class="mt-6 bg-white text-red-800 px-4 py-2 rounded hover:bg-red-100 w-full"
                        @click="submitBooking"
                    >
                        Confirm
                    </button>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

