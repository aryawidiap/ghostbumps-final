<script setup lang="ts">
import AppLayout from '@/layouts/admin/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import { onMounted, ref } from 'vue';

import {
    Chart as ChartJS,
    CategoryScale,
    LinearScale,
    BarElement,
    Title,
    Tooltip,
    Legend
} from 'chart.js';

ChartJS.register(CategoryScale, LinearScale, BarElement, Title, Tooltip, Legend);

const breadcrumbs = [{ title: 'Dashboard', href: '/dashboard' }];
const chartRef = ref<HTMLCanvasElement | null>(null);

onMounted(() => {
    if (chartRef.value) {
        new ChartJS(chartRef.value, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
                datasets: [
                    {
                        label: 'Bookings',
                        data: [30, 40, 35, 50, 45],
                        backgroundColor: 'rgba(255, 99, 132, 0.7)',
                    },
                    {
                        label: 'Refunds',
                        data: [5, 8, 4, 6, 7],
                        backgroundColor: 'rgba(54, 162, 235, 0.7)',
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            },
        });
    }
});
</script>

<template>

    <Head title="Dashboard" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="bg-black text-white min-h-screen font-['Oswald'] p-6">
            <h1 class="text-6xl font-bold font-['Special_Elite'] mb-8">Hello, Admin!</h1>

            <!-- Metrics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                <div class="bg-red-800 p-6 rounded-xl">
                    <h2 class="text-lg">Approved Payments</h2>
                    <p class="text-3xl font-bold">120</p>
                </div>
                <div class="bg-yellow-600 p-6 rounded-xl">
                    <h2 class="text-lg">Unpaid Bookings</h2>
                    <p class="text-3xl font-bold">35</p>
                </div>
                <div class="bg-green-700 p-6 rounded-xl">
                    <h2 class="text-lg">Load (%)</h2>
                    <p class="text-3xl font-bold">76%</p>
                </div>
                <div class="bg-blue-700 p-6 rounded-xl">
                    <h2 class="text-lg">Revenue</h2>
                    <p class="text-3xl font-bold">Rp 25.000.000</p>
                </div>
            </div>

            <!-- Upcoming Appointments & Conversion -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
                <div>
                    <h2 class="text-2xl font-['Special_Elite'] mb-3">Upcoming Appointments</h2>
                    <ul class="space-y-3">
                        <li class="bg-gray-300 text-black p-4 rounded-lg flex justify-between">
                            <span>12 June - Ghostbumps Bali</span>
                            <button class="bg-black text-white px-3 py-1 rounded">View</button>
                        </li>
                        <li class="bg-gray-300 text-black p-4 rounded-lg flex justify-between">
                            <span>14 June - Ghostbumps Jogja</span>
                            <button class="bg-black text-white px-3 py-1 rounded">View</button>
                        </li>
                    </ul>
                </div>

                <div>
                    <h2 class="text-2xl font-['Special_Elite'] mb-3">Interests / Conversions</h2>
                    <div class="bg-white text-black p-6 rounded-lg space-y-2">
                        <div class="flex justify-between">
                            <span>Site Visitors</span>
                            <span>5,200</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Booking Interest</span>
                            <span>2,100</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Completed Bookings</span>
                            <span>1,560</span>
                        </div>
                        <div class="border-t border-black mt-2 pt-2 flex justify-between font-bold">
                            <span>Conversion Rate</span>
                            <span>30%</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Diagram -->
            <div class="mb-10">
                <h2 class="text-2xl font-['Special_Elite'] mb-3">Bookings vs Refunds</h2>
                <div class="bg-white p-4 rounded-lg">
                    <canvas ref="chartRef" width="400" height="150"></canvas>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
