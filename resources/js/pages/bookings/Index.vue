<script setup lang="ts">
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

</script>

<template>
    <Head title="All Booking" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
                <a :href="route('customer.new.select-location')" class="h-100">
                    <div>Book new ticket +</div>
                </a>
            </div>
            <div class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
                <h2>All ticket</h2>
                <div v-for="booking in bookings" v-bind:key="booking.id" class="bg-red-900 rounded-3xl overflow-hidden md:flex shadow-lg">
                        <div class="md:w-1/2">
                            <!-- TODO: change the src to booking:photo_path -->
                            <img src="/img/table-tennis-1428052_1920.jpg" alt="Ghostbumps Denpasar" class="w-full h-full object-cover" />
                        </div>
                        <div class="md:w-1/2 p-8 space-y-4">
                            <h2 class="text-2xl font-bold font-['Special_Elite']">{{ booking.name }}</h2>
                            <p class="italic text-sm">{{ booking.address }}</p>
                            <p class="text-sm leading-relaxed">
                                {{ booking.description }}
                            </p>
                            <button
                                class="bg-white text-red-700 font-bold px-6 py-2 rounded-full hover:bg-gray-200 hover:text-red-900">
                                Get Ticket
                            </button>
                        </div>
                    </div>
            </div>
        </div>
    </AppLayout>
</template>
