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
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500&family=Special+Elite&display=swap');
</style>
<template>

    <Head title="Make booking" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <!-- Put code here -->
        </div>
    </AppLayout>
</template>
