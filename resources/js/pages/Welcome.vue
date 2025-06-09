<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
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
            </nav>
        </header>

        <div
            class="duration-750 starting:opacity-0 flex w-full font-['Oswald'] items-center justify-center opacity-100 transition-opacity lg:grow">
            <div class="flex w-full max-w-[335px] flex-col-reverse overflow-hidden rounded-lg lg:max-w-4xl lg:flex-row">
                <div
                    class="flex-1 rounded-bl-lg rounded-br-lg bg-white p-6 pb-12 text-[13px] leading-[20px] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:bg-[#161615] dark:text-[#EDEDEC] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] lg:rounded-br-none lg:rounded-tl-lg lg:p-20">
                    <h1 class="mb-1 font-medium font-['Special Elite']">GHOSTBUMPS</h1>
                    <p class="mb-2 text-[#706f6c] dark:text-[#A1A09A]">
                        it is not just a creepy house.
                    </p>
                    <p class="mb-2 text-[#706f6c] dark:text-[#A1A09A]">
                        it is a story to tell.
                    </p>
                </div>
            </div>
        </div>
        <div
            class="duration-750 starting:opacity-0 flex w-full font-['Oswald'] items-center justify-center opacity-100 transition-opacity lg:grow">
            <div class="flex w-full max-w-[335px] flex-col-reverse overflow-hidden rounded-lg lg:max-w-4xl lg:flex-row">
                <div
                    class="flex-1 rounded-bl-lg rounded-br-lg bg-white p-6 pb-12 text-[13px] leading-[20px] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:bg-[#161615] dark:text-[#EDEDEC] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] lg:rounded-br-none lg:rounded-tl-lg lg:p-20">
                    <h2 class="mb-1 font-medium font-['Special Elite']">2025/02/25</h2>
                    <p class="mb-2 text-[#706f6c] dark:text-[#A1A09A]">
                        I found this abandoned house. <br />
                        It’s luring me in.
                    </p>
                </div>
            </div>
        </div>
        <div
            class="duration-750 starting:opacity-0 flex w-full font-['Oswald'] items-center justify-center opacity-100 transition-opacity lg:grow">
            <div class="flex w-full max-w-[335px] flex-col-reverse overflow-hidden rounded-lg lg:max-w-4xl lg:flex-row">
                <div
                    class="flex-1 rounded-bl-lg rounded-br-lg bg-white p-6 pb-12 text-[13px] leading-[20px] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:bg-[#161615] dark:text-[#EDEDEC] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] lg:rounded-br-none lg:rounded-tl-lg lg:p-20">
                    <p class="mb-2 text-[#706f6c] dark:text-[#A1A09A]">
                        Something was calling for me in the dark...
                    </p>
                </div>
            </div>
        </div>
        <div
            class="duration-750 starting:opacity-0 flex w-full font-['Oswald'] items-center justify-center opacity-100 transition-opacity lg:grow">
            <div class="flex w-full max-w-[335px] flex-col-reverse overflow-hidden rounded-lg lg:max-w-4xl lg:flex-row">
                <div
                    class="flex-1 rounded-bl-lg rounded-br-lg bg-white p-6 pb-12 text-[13px] leading-[20px] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:bg-[#161615] dark:text-[#EDEDEC] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] lg:rounded-br-none lg:rounded-tl-lg lg:p-20">
                    <p class="mb-2 text-[#706f6c] dark:text-[#A1A09A]">
                        I was running. But, my curiosity won.
                    </p>
                </div>
            </div>
        </div>
        <div
            class="duration-750 starting:opacity-0 flex w-full font-['Oswald'] items-center justify-center opacity-100 transition-opacity lg:grow">
            <div class="flex w-full max-w-[335px] flex-col-reverse overflow-hidden rounded-lg lg:max-w-4xl lg:flex-row">
                <div
                    class="flex-1 rounded-bl-lg rounded-br-lg bg-white p-6 pb-12 text-[13px] leading-[20px] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:bg-[#161615] dark:text-[#EDEDEC] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] lg:rounded-br-none lg:rounded-tl-lg lg:p-20">
                    <p class="mb-2 text-[#706f6c] dark:text-[#A1A09A]">
                        H E L P
                    </p>
                </div>
            </div>
        </div>
        <div
            class="duration-750 starting:opacity-0 flex w-full font-['Oswald'] items-center justify-center opacity-100 transition-opacity lg:grow">
            <div class="flex w-full max-w-[335px] flex-col-reverse overflow-hidden rounded-lg lg:max-w-4xl lg:flex-row">
                <div
                    class="flex-1 rounded-bl-lg rounded-br-lg bg-white p-6 pb-12 text-[13px] leading-[20px] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:bg-[#161615] dark:text-[#EDEDEC] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] lg:rounded-br-none lg:rounded-tl-lg lg:p-20">
                    <p class="mb-2 text-[#706f6c] dark:text-[#A1A09A]">
                        continue the story
                    </p>
                    <h2 class="mb-2 text-[#706f6c] dark:text-[#A1A09A]">
                        Known Spawn Locations
                    </h2>
                    <div>
                        <div>
                            <img src="" alt="">
                            <h3>GHOSTBUMPS Jogja</h3>
                        </div>
                        <div>
                            <img src="" alt="">
                            <h3>GHOSTBUMPS Surabaya</h3>
                        </div>
                        <div>
                            <img src="" alt="">
                            <h3>GHOSTBUMPS Denpasar</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="h-14.5 hidden lg:block"></div>
    </div>
</template>
