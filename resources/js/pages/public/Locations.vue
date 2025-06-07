<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';

defineProps(['locations']);

</script>

<template>

    <Head title="Welcome">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>
    <div
        class="flex min-h-screen flex-col items-center bg-[#FDFDFC] p-6 text-[#1b1b18] dark:bg-[#0a0a0a] lg:justify-center lg:p-8">
        <header class="not-has-[nav]:hidden mb-6 w-full max-w-[335px] text-sm lg:max-w-4xl">
            <nav class="flex items-center justify-end gap-4 bg-black text-white font-['Special_Elite'] text-2xl">
                <div>
                    <img src="img/ghostbumps_large.png" alt="">
                </div>
                <div>
                    <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                        class="inline-block rounded-sm border border-[#19140035] px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]">
                    Dashboard
                    </Link>
                    <template v-else>
                        <Link :href="route('home')"
                            class="inline-block rounded-sm border border-transparent px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#19140035] dark:text-[#EDEDEC] dark:hover:border-[#3E3E3A]">
                        Home
                        </Link>
                        <Link :href="route('locations')"
                            class="inline-block rounded-sm border border-transparent px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#19140035] dark:text-[#EDEDEC] dark:hover:border-[#3E3E3A]">
                        Locations
                        </Link>
                        <Link :href="route('login')"
                            class="inline-block rounded-sm border border-transparent px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#19140035] dark:text-[#EDEDEC] dark:hover:border-[#3E3E3A]">
                        Buy Tickets
                        </Link>
                        <Link :href="route('login')"
                            class="inline-block rounded-sm border border-transparent px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#19140035] dark:text-[#EDEDEC] dark:hover:border-[#3E3E3A]">
                        Log in
                        </Link>
                        <Link :href="route('register')"
                            class="inline-block rounded-sm border border-[#19140035] px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]">
                        Register
                        </Link>
                    </template>
                </div>
            </nav>
        </header>
        <div
            class="duration-750 starting:opacity-0 flex w-full items-center justify-center opacity-100 transition-opacity lg:grow">
            <main
                class="flex w-full max-w-[335px] flex-col-reverse overflow-hidden rounded-lg lg:max-w-4xl lg:flex-row">
                <div class="bg-black text-white font-['Special_Elite'] w-full min-h-screen">
                    <!-- Main Content -->
                    <div class="w-full px-4 py-10">
                        <div class="text-3xl font-bold mb-6">Locations</div>

                        <!-- Location Card -->
                        <div v-for="location in locations" v-bind:key="location.id"
                            class="bg-red-900 rounded-3xl overflow-hidden md:flex shadow-lg mb-6">
                            <div class="md:w-1/2">
                                <!-- TODO: change the src to location:photo_path -->
                                <img src="/img/table-tennis-1428052_1920.jpg" alt="Ghostbumps Denpasar"
                                    class="w-full h-full object-cover" />
                            </div>
                            <div class="md:w-1/2 p-8 space-y-4">
                                <h2 class="text-2xl font-bold font-['Special_Elite']">{{ location.name }}</h2>
                                <p class="italic text-sm">{{ location.address }}</p>
                                <p class="text-sm leading-relaxed">
                                    {{ location.description }}
                                </p>
                                <button
                                    class="bg-white text-red-700 font-bold px-6 py-2 rounded-full hover:bg-gray-200 hover:text-red-900">
                                    Get Ticket
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div class="h-14.5 hidden lg:block"></div>
    </div>
</template>
