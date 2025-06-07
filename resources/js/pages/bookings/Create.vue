<script setup lang="ts">
import PlaceholderPattern from '@/components/PlaceholderPattern.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';


const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];

defineProps(['bookings']);
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

    <Head title="Make booking" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="bg-black text-white font-['Special_Elite'] w-full min-h-screen">
                <!-- Main Content -->
                <div class="w-full px-4 py-10">
                    <div class="text-sm font-['Oswald'] text-white mb-2">My Tickets / Ticket Booking / Select Location
                    </div>
                    <div class="text-3xl font-bold mb-2">Ticket Booking</div>
                    <div class="text-xl font-light font-['Oswald'] text-gray-300 mb-6 text-center">
                        Please select the location to be visited.
                    </div>

                    <!-- Experience Card -->
                    <div class="bg-red-900 rounded-3xl overflow-hidden md:flex shadow-lg">
                        <div class="md:w-1/2">
                            <img src="house.jpg" alt="Ghostbumps Denpasar" class="w-full h-full object-cover" />
                        </div>
                        <div class="md:w-1/2 p-8 space-y-4">
                            <h2 class="text-2xl font-bold font-['Special_Elite']">Ghostbumps Denpasar</h2>
                            <p class="italic text-sm">Jalan Gatot Subroto Timur, No. XXX, Denpasar, Bali</p>
                            <p class="text-sm leading-relaxed">
                                In Denpasar, Bali, an abandoned hotel stands in eerie silence, surrounded by ghostly
                                legends. Once meant to
                                be a luxurious retreat, the project was mysteriously abandoned, rumored to be cursed for
                                disturbing sacred
                                land. Visitors report shadowy figures, echoing footsteps, and whispers in empty halls.
                                Some claim to see a
                                ghostly woman in white wandering the corridors. Locals believe the spirits are restless,
                                forever trapped
                                within the ruins.
                            </p>
                            <button
                                class="bg-white text-red-700 font-bold px-6 py-2 rounded-full hover:bg-gray-200 hover:text-red-900">
                                Select
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
