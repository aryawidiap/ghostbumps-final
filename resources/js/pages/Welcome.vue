<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { Head, Link } from '@inertiajs/vue3';
import Navbar from './public/components/Navbar.vue';

const showJumpscare = ref(false);
const jumpscareAudio = new Audio('/sounds/scream.mp3');

defineProps(['topLocations']);

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

function getImageSrc(path: string) {
    // Normalize the path
    return '/' + path.replace(/^\/+|\/+$/g, '').replace(/\/{2,}/g, '/')
}

</script>

<template>

    <Head title="Welcome" />

    <div class="flex min-h-screen flex-col items-center dark:bg-[#0a0a0a] lg:justify-center">
        <Navbar />

        <main
            class="min-h-screen w-full  text-white font-['Special_Elite'] space-y-20 py-6 lg:py-12 relative overflow-hidden">
            <!-- Jumpscare Overlay -->
            <div v-if="showJumpscare"
                class="fixed inset-0  bg-opacity-90 z-50 flex items-center justify-center animate-jumpscare">
                <img src="/images/smile_image.png" alt="Jumpscare" class="max-h-full max-w-full" />
            </div>

            <!-- Header -->
            <!-- Header -->
            <section class="min-h-[70vh] flex flex-col items-center justify-center text-center">
                <h1 class="text-6xl lg:text-6xl mb-2">GHOSTBUMPS</h1>
                <p class="text-lg font-[Oswald]">it is not just a creepy house.<br />it is a story to tell.</p>
            </section>

            <!-- Date & Intro -->
            <section class="min-h-[70vh] flex flex-col items-center justify-center text-center">
                <h2 class="text-5xl">2025/02/25</h2>
                <p class="text-5xl">I found this abandoned house.<br />It’s luring me in.</p>
            </section>

            <!-- Dark Voice -->
            <section class="min-h-[70vh] flex items-center justify-center text-center">
                <p class="text-5xl italic">Something was calling for me in the dark...</p>

            </section>

            <!-- Jumpscare Trigger Text -->
            <section class="min-h-[70vh] flex items-center justify-center text-center">
                <div class="flex items-center justify-center">
                    <img :src="getImageSrc('images/smile_image.png')"
                        class="max-h-[110vh] object-contain opacity-0 hover:opacity-100 delay-200" alt="">
                </div>
                <!-- <p class="text-lg italic text-red-500 cursor-pointer" @click="triggerJumpscare">
                    (click me... if you dare)
                </p> -->
            </section>

            <!-- Curiosity -->
            <section class="min-h-[70vh] flex items-center justify-center text-center">
                <p class="text-5xl">I was running. But, my curiosity won.</p>
            </section>

            <!-- HELP -->
            <section
                class="min-h-[70vh] w-svw flex items-center justify-center text-center text-white hover:text-red-600 transition delay-100 duration-[1s] ease-in">
                <div class="flex items-center justify-center">
                    <img :src="getImageSrc('images/help_image.png')"
                        class="opacity-70 hover:opacity-100 delay-150 duration-[0.1s] ease-in" alt="">
                </div>
                <h2 class="absolute text-9xl tracking-widest ">
                    H E L P</h2>
            </section>

            <!-- Footer -->
            <section class="min-h-[70vh] flex flex-col items-center justify-center text-center space-y-4">
                <p class="text-lg">continue the story</p>
                <h2 class="text-5xl">Known Spawn Locations</h2>
                <div class="grid grid-cols-1 gap-4 md:grid-cols-3 justify-items-center text-lg text-gray-400">
                    <div v-for="location in topLocations" v-bind:key="location.id">
                        <img :src="getImageSrc(location.photo_path)" alt="" class="h-16 w-16 bg-gray-800 mb-1" />
                        <h3>{{ location.name }}</h3>
                        <p>{{ location.short_description }}</p>
                    </div>
                </div>
            </section>
        </main>
        <div class="h-14.5 hidden lg:block"></div>
    </div>


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
