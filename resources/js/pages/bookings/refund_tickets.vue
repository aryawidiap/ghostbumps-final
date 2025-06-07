<template>
  <div class="min-h-screen bg-[#120b0b] text-white p-6 font-mono">
    <!-- Breadcrumb -->
    <p class="text-sm text-white mb-4">My Tickets / Cancel Ticket #{{ ticket.id }}</p>

    <!-- Title -->
    <h1 class="text-3xl font-bold mb-2">Cancel Ticket #{{ ticket.id }}</h1>
    <p class="text-lg mb-6">Do you want to cancel this ticket?</p>

    <!-- Ticket Card -->
    <div class="flex flex-col md:flex-row bg-red-800 rounded-2xl overflow-hidden mb-10">
      <img :src="ticket.image" alt="ticket" class="md:w-1/3 h-full object-cover" />
      <div class="p-6 flex flex-col justify-center">
        <h2 class="text-2xl font-bold mb-2">{{ ticket.name }}</h2>
        <span class="inline-block bg-cyan-500 text-white text-xs px-2 py-1 rounded-full mb-2 w-max">Confirmed</span>
        <p>Ticket #{{ ticket.id }}</p>
        <p>{{ ticket.date }}</p>
        <p>{{ ticket.time }}</p>
        <p>{{ ticket.persons }} person(s)</p>
      </div>
    </div>

    <!-- Refund Policy -->
    <div class="mb-10">
      <p class="text-center text-xl mb-4">Please agree to the refund policy before continuing.</p>
      <div class="bg-red-800 text-white p-6 rounded-2xl max-w-xl mx-auto">
        <h3 class="text-2xl font-bold text-center mb-4">Refund Policy</h3>
        <ul class="list-disc pl-5 mb-4 space-y-1 text-sm">
          <li>Cancellation can be made no later than 24 hours before the booking time.</li>
          <li>Refunds will be processed within 2×24 hours of the cancellation.</li>
        </ul>
        <div class="flex items-center space-x-2 mb-4">
          <input type="checkbox" id="agree" v-model="agreed" class="accent-red-600 w-4 h-4" />
          <label for="agree" class="text-sm">I have read and agreed to the refund policy</label>
        </div>
        <button
          :disabled="!agreed"
          class="w-full text-center bg-white text-red-800 font-bold py-2 rounded-full transition disabled:opacity-50"
        >
          Continue
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const agreed = ref(false)

const ticket = {
  id: '1234908',
  name: 'Ghostbumps Denpasar',
  date: '14 April 2024',
  time: '13.00 – 14.00',
  persons: 4,
  image: 'https://images.unsplash.com/photo-1563298723-dcfebaa392e3' // Sample image URL
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Courier+Prime&display=swap');

.font-mono {
  font-family: 'Courier Prime', Courier, monospace;
}
</style>
