<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { reactive } from 'vue';
import { router } from '@inertiajs/vue3';
// for fetching available time
// ref is also used to render VCalendar
import axios from "axios";
import { ref, onMounted } from 'vue'


const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'My Ticket',
        href: '/bookings',
    },
    {
        title: 'Ticket Booking',
        href: '/bookings',
    },
    {
        title: 'Select Date and Time',
        href: '#',
    },
]

const date = ref(new Date());
const time = ref(0);
const isDateSelected = ref(false);

const availableTimes = ref([]);
const getAvailableTime = () => {
    if (!isDateSelected.value) {
        isDateSelected.value = true;
    }
    console.log(date)
    console.log(date.value.getUTCDate())
    axios.get('/api/availableTime', { params: { date: date } })
        .then(
            (res) => {
                console.log(res.data)
                availableTimes.value = res.data
            })
        .catch(error => console.log(error))
}


const props = defineProps(['location']);

const form = reactive({
    first_name: null,
    last_name: null,
    email: null,
})

const locationId = ref(props.location.id);
const locationName = ref(props.location.name);


function submit() {
    router.post('/', form)
}

const selectedDate = ref(null)
const dates = Array.from({ length: 30 }, (_, i) => i + 1)

function selectDate(date) {
  selectedDate.value = date
}

const rules = ref({
  hours: 0,
  minutes: 0,
  seconds: 0,
  milliseconds: 0,
});

function nextStep() {
  if (selectedDate.value) {
    localStorage.setItem('selectedDate', date.value.toUTCString())
    localStorage.setItem('selectedTime', time.value.toString())
    localStorage.setItem('locationId', locationId.value)
    localStorage.setItem('locationName', locationName.value)
    router.visit('/customer/bookings/new/number-of-person')
  }
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500&family=Special+Elite&display=swap');
</style>
<template>

    <Head title="Ticket Booking / Select Date and Time" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="bg-black text-white font-['Special_Elite'] w-full min-h-screen">
                <!-- Main Content -->
                <div class="w-full px-4 py-10">
                    <div class="text-3xl font-bold mb-2">Ticket Booking</div>
                    <div class="text-xl font-light font-['Oswald'] text-gray-300 mb-6 text-center">
                        Please select the date and time.
                    </div>
                    <div class="bg-red-900 rounded-3xl overflow-hidden mb-6 md:flex shadow-lg">
                        <!-- TODO: center these -->
                        <VDatePicker v-model="date" :min-date="new Date()" :rules="rules" class="" @dayclick="getAvailableTime" />
                        <!-- fetch time data using Axios -->

                        <!-- Show if date is selected -->
                        <div>
                            <!-- Show if time is not selected yet -->
                            <h2>Select time</h2>
                            <!-- Show if time is selected -->
                            <h2 :class="{ hidden: isDateSelected }">Time: {bind to selected time}</h2>
                            <fieldset>
                                <ul>
                                    <li v-for="availableTime in availableTimes" :key="availableTime.time"
                                        :class="{ 'bg-white': !availableTime.isAvailable }">
                                        <input type="radio" :id="availableTime.time" name="time"
                                            :value="availableTime.time" v-model="time">
                                        <label :for="availableTime.time">{{ availableTime.time }}.00 - {{
                                            availableTime.time + 1 }}.00</label>
                                    </li>
                                </ul>
                            </fieldset>
                        </div>
                    </div>

                    <div>
                        <button type="submit">Submit</button>
                    </div>
                    <div class="min-h-screen bg-red-800 flex flex-col items-center justify-center text-white">
                        <div class="bg-yellow-100 text-red-800 rounded-lg p-6">
                            <h2 class="text-2xl font-semibold mb-4 text-center">Pick the date</h2>
                            <!-- Dummy calendar for example -->
                            <div class="grid grid-cols-7 gap-2">
                                <div v-for="date in dates" :key="date" @click="selectDate(date)"
                                    :class="{ 'bg-red-400 text-white': selectedDate === date, 'border border-red-400': true }"
                                    class="rounded-full p-2 text-center cursor-pointer">
                                    {{ date }}
                                </div>
                            </div>
                            <button @click="nextStep"
                                class="mt-4 bg-white text-red-800 px-4 py-2 rounded">Select</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
