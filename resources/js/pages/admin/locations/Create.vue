<script setup lang="ts">
import AppLayout from '@/layouts/admin/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, useForm } from '@inertiajs/vue3';
import { ref, reactive } from 'vue';
import { router } from '@inertiajs/vue3';
import InputError from '@/components/InputError.vue';

const breadcrumbs: BreadcrumbItem[] = [
    { title: 'Dashboard', href: '/' },
    { title: 'Location', href: '#' },
    { title: 'Create New', href: '#' },
];

// Set initial values in the reactive object
const form = useForm({
    photo: '',
    name: '',
    address: '',
    description: '',
    short_description: '',
});

// Explicitly type the ref for an input element
const fileInput = ref<HTMLInputElement | null>(null);

const changePhoto = (e: any) => {
    form.photo = e.target.files[0];
};

function submitForm() {
    form.post(route('admin.locations.store'));
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500&family=Special+Elite&display=swap');
</style>

<template>
    <Head title="Dashboard / Create New Location" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="bg-black text-white font-['Special_Elite'] w-full min-h-screen">
                <div class="w-full px-4 py-10">
                    <div class="text-3xl font-bold mb-2">Create New Location</div>
                    <div class="flex flex-1 justify-center-safe">
                        <div class="bg-red-900 rounded-lg p-4 shadow-lg font-['Oswald'] w-2xl">
                            <form @submit.prevent="submitForm" class="space-y-4">
                                <div>
                                    <label class="block mb-2">Location Image</label>
                                    <input type="file" ref="fileInput" class="w-full p-2 bg-white text-black rounded" @input="changePhoto">
                                    <InputError class="mt-2" :message="form.errors.photo" />
                                </div>
                                <div>
                                    <label class="block mb-2">Name</label>
                                    <input type="text" v-model="form.name"
                                        class="w-full p-2 bg-white text-black rounded">
                                    <InputError class="mt-2" :message="form.errors.name" />
                                </div>
                                <div>
                                    <label class="block mb-2">Address</label>
                                    <input type="text" v-model="form.address"
                                        class="w-full p-2 bg-white text-black rounded">
                                    <InputError class="mt-2" :message="form.errors.address" />
                                </div>
                                <div>
                                    <label class="block mb-2">Description</label>
                                    <textarea v-model="form.description"
                                        class="w-full p-2 bg-white text-black rounded"></textarea>
                                    <InputError class="mt-2" :message="form.errors.description" />
                                </div>
                                <div>
                                    <label class="block mb-2">Short Description</label>
                                    <input type="text" v-model="form.short_description"
                                        class="w-full p-2 bg-white text-black rounded">
                                    <InputError class="mt-2" :message="form.errors.short_description" />
                                </div>
                                <button type="submit"
                                    class="mt-4 bg-white text-red-800 px-4 py-2 rounded">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
