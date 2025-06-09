<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { Head, Link } from '@inertiajs/vue3';

const showJumpscare = ref(false);
const jumpscareAudio = new Audio('/sounds/scream.mp3');

const triggerJumpscare = () => {
    showJumpscare.value = true;
    jumpscareAudio.play();
    setTimeout(() => {
        showJumpscare.value = false;
    }, 1500); // Hide after 1.5 seconds
};

onMounted(() => {
    setTimeout(triggerJumpscare, 8000); // Trigger automatically after 8s
});
</script>

<template>

    <Head title="Ghostbumps" />

    <main
        class="min-h-screen bg-black text-white font-['Special_Elite'] space-y-20 p-6 lg:p-12 relative overflow-hidden">
        <!-- Jumpscare Overlay -->
        <div v-if="showJumpscare"
            class="fixed inset-0 bg-black bg-opacity-90 z-50 flex items-center justify-center animate-jumpscare">
            <img src="/images/jumpscare.png" alt="Jumpscare" class="max-h-full max-w-full" />
        </div>

        <!-- Header -->
        <!-- Header -->
        <section class="min-h-[70vh] flex flex-col items-center justify-center text-center">
            <h1 class="text-3xl lg:text-5xl mb-2">GHOSTBUMPS</h1>
            <p class="text-sm">it is not just a creepy house.<br />it is a story to tell.</p>
        </section>

        <!-- Date & Intro -->
        <section class="min-h-[70vh] flex flex-col items-center justify-center text-center">
            <h2 class="text-xl">2025/02/25</h2>
            <p class="text-lg">I found this abandoned house.<br />It’s luring me in.</p>
        </section>

        <!-- Dark Voice -->
        <section class="min-h-[70vh] flex items-center justify-center text-center">
            <p class="text-lg italic">Something was calling for me in the dark...</p>
        </section>

        <!-- Jumpscare Trigger Text -->
        <section class="min-h-[70vh] flex items-center justify-center text-center">
            <p class="text-lg italic text-red-500 cursor-pointer" @click="triggerJumpscare">
                (click me... if you dare)
            </p>
        </section>

        <!-- Curiosity -->
        <section class="min-h-[70vh] flex items-center justify-center text-center">
            <p class="text-lg">I was running. But, my curiosity won.</p>
        </section>

        <!-- HELP -->
        <section class="min-h-[70vh] flex items-center justify-center text-center">
            <h1 class="text-5xl tracking-widest text-red-500">H E L P</h1>
        </section>

        <!-- Footer -->
        <section class="min-h-[70vh] flex flex-col items-center justify-center text-center space-y-4">
            <p>continue the story</p>
            <h2 class="text-lg underline">Known Spawn Locations</h2>
            <div class="grid grid-cols-1 gap-4 md:grid-cols-3 justify-items-center text-sm text-gray-400">
                <div>
                    <img src="" alt="" class="h-16 w-16 bg-gray-800 mb-1" />
                    <h3>GHOSTBUMPS Jogja</h3>
                </div>
                <div>
                    <img src="" alt="" class="h-16 w-16 bg-gray-800 mb-1" />
                    <h3>GHOSTBUMPS Surabaya</h3>
                </div>
                <div>
                    <img src="" alt="" class="h-16 w-16 bg-gray-800 mb-1" />
                    <h3>GHOSTBUMPS Denpasar</h3>
                </div>
            </div>
        </section>


        <!-- Optional Navigation -->
        <nav class="text-center mt-10">
            <Link :href="route('home')" class="mx-2 hover:underline">Home</Link>
            <Link :href="route('locations')" class="mx-2 hover:underline">Locations</Link>
            <Link :href="route('login')" class="mx-2 hover:underline">Buy Tickets</Link>
            <Link :href="route('register')" class="mx-2 hover:underline">Register</Link>
        </nav>
    </main>
</template>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Special+Elite&display=swap');

@keyframes jumpscare {
    0% {
        transform: scale(0.5);
        opacity: 0;
    }

    20% {
        transform: scale(1.3);
        opacity: 1;
    }

    50% {
        transform: scale(1);
        opacity: 0.9;
    }

    100% {
        transform: scale(1.2);
        opacity: 0;
    }
}

.animate-jumpscare {
    animation: jumpscare 1.5s ease-in-out forwards;
}
</style>
