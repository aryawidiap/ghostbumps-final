<script setup lang="ts">
import { ref } from 'vue'
import { router } from '@inertiajs/vue3'
import { Head } from '@inertiajs/vue3'

import PlaceholderPattern from '@/components/PlaceholderPattern.vue'
import AppLayout from '@/layouts/AppLayout.vue'
import { type BreadcrumbItem } from '@/types'

// Define breadcrumb items
const breadcrumbs: BreadcrumbItem[] = [
  {
    title: 'Dashboard',
    href: '/dashboard',
  },
]

// Props (adjust type if needed)
defineProps<{ bookings: any }>()

// Dropdown state
const showDropdown = ref(false)
const toggleDropdown = () => {
  showDropdown.value = !showDropdown.value
}

// Confirm navigation
const handleConfirm = () => {
  router.visit('/ticket/success')
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500&family=Special+Elite&display=swap');
</style>
<template>

  <Head title="Ticket Booking / Confirm Details" />

  <AppLayout :breadcrumbs="breadcrumbs">
    <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
      <div class="bg-black text-white font-['Special_Elite'] w-full min-h-screen">
        <!-- Main Content -->
        <div class="w-full px-4 py-10">
          <div class="text-sm font-['Oswald'] text-white mb-2">
            My Tickets / Ticket Booking / Select Location
          </div>
          <div class="text-3xl font-bold mb-2">Ticket Booking</div>
          <div class="text-xl font-light font-['Oswald'] text-gray-300 mb-6 text-center">
            Please confirm the details of your booking.
          </div>

          <!-- Experience Card -->
          <div class="bg-red-900 rounded-3xl overflow-hidden md:flex shadow-lg">
            <!-- Ticket Card -->
            <div class="rounded-3xl p-8 w-full max-w-2xl text-white">
              <h2 class="text-3xl mb-6 text-center">Ticket Details</h2>
              <div class="grid grid-cols-2 gap-y-3 text-lg">
                <p>Customer Name</p>
                <p class="text-right">Gendhis</p>

                <p>Location</p>
                <p class="text-right">Ghostbumps Denpasar</p>

                <p>Date</p>
                <p class="text-right">14 April 2024</p>

                <p>Time</p>
                <p class="text-right">13.00 – 14.00</p>

                <p>Number of Person(s)</p>
                <p class="text-right">4 person(s)</p>
                
              </div>
              <!-- Confirm Button -->
              <div class="mt-8 flex justify-center">
                <button @click="handleConfirm"
                  class="bg-white text-red-800 font-semibold px-6 py-3 rounded-full hover:bg-gray-100 transition">
                  Confirm
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
