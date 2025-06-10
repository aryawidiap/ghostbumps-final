<script setup lang="ts">
// import { getImageSrc } from '@/app';
import AppLayout from '@/layouts/AppLayout.vue';
import { getImageSrc } from '@/service';
import { type BreadcrumbItem } from '@/types';
import { Head, useForm } from '@inertiajs/vue3';


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
        title: 'Select Location',
        href: '#',
    },
];

defineProps(['locations']);

const form = useForm({
    location_id: null,
});

import { ref } from 'vue'

const showDropdown = ref(false)

const toggleDropdown = () => {
    showDropdown.value = !showDropdown.value
}

</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500&family=Special+Elite&display=swap');
</style>

<template>

    <Head title="Ticket Booking / Select Location " />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="bg-black text-white font-['Special_Elite'] w-full min-h-screen">
                <!-- Main Content -->
                <div class="w-full px-4 py-10">
                    <div class="text-3xl font-bold mb-2">Ticket Booking</div>
                    <div class="text-xl font-light font-['Oswald'] text-gray-300 mb-6 text-center">
                        Please select the location to be visited.
                    </div>

                    <!-- Location cards -->

                    <div v-for="location in locations" v-bind:key="location.id"
                        class="bg-red-900 rounded-3xl overflow-hidden mb-6 md:flex shadow-lg">
                        <div class="md:w-1/2">
                            <img :src="getImageSrc(location.photo_path)" :alt="location.name" class="w-full h-full object-cover" />
                        </div>
                        <div class="md:w-1/2 p-8 space-y-4">
                            <h2 class="text-2xl font-bold font-['Special_Elite']">{{ location.name }}</h2>
                            <p class="italic text-sm">{{ location.address }}</p>
                            <p class="text-sm leading-relaxed">
                                {{ location.description }}
                            </p>
                            <!-- TODO: form smhw still post -->

                            <a :href="route('customer.new.select-time', location)">
                                <button
                                type="submit"
                                    class="bg-white text-red-700 font-bold px-6 py-2 rounded-full hover:bg-gray-200 hover:text-red-900">
                                    Select
                                </button>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </AppLayout>
</template>
