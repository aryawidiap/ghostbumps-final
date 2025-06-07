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
const time = ref('')
const persons = ref(1)
const location_id = ref('')
const location_name = ref('')

// Setup localStorage values
onMounted(() => {
    date.value = localStorage.getItem('selectedDate') || 'Unknown'
    time.value = localStorage.getItem('selectedTime') || 'Unknown'
    persons.value = parseInt(localStorage.getItem('persons') || '1')
    location_id.value = localStorage.getItem('location_id') || ''
    location_name.value = localStorage.getItem('location_name') || ''
})

// Inertia form
const form = useForm({
    name: props.user.name,
    date: '',
    time: '',
    persons: 1,
    location_id: '',
    location_name: '',
})

function submitBooking() {
    form.date = date.value
    form.time = time.value
    form.persons = persons.value
    form.location_id = location_id.value
    form.location_name = location_name.value

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
                    <p><strong>Time:</strong> {{ time }}</p>
                    <p><strong>Number of Person(s):</strong> {{ persons }} person(s)</p>

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

