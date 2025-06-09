<script setup lang="ts">
import AppLayout from '@/layouts/admin/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { ref, reactive } from 'vue';
import { router } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    { title: 'Dashboard', href: '/dashboard' },
    { title: 'Location', href: '/admin/locations' },
    { title: 'Edit', href: '#' },
];

const props = defineProps(['location']);

// Set initial values in the reactive object
const form = reactive({
    name: props.location.name,
    address: props.location.address,
    description: props.location.description,
    shortDescription: props.location.short_description,
});

const oldName = props.location.name;

// Explicitly type the ref for an input element
const fileInput = ref<HTMLInputElement | null>(null);

function submitForm() {
    const formData = new FormData();
    formData.append('name', form.name);
    formData.append('address', form.address);
    formData.append('description', form.description);
    formData.append('shortDescription', form.shortDescription);
    if (fileInput.value?.files && fileInput.value.files[0]) {
        formData.append('image', fileInput.value.files[0]);
    }
    router.post('/locations', formData, {
        forceFormData: true,
    });
}

function getImageSrc(path: string) {
  // Normalize the path
  return '/' + path.replace(/^\/+|\/+$/g, '').replace(/\/{2,}/g, '/')
}

</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500&family=Special+Elite&display=swap');
</style>

<template>

    <Head title="Dashboard / Edit Location" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="bg-black text-white font-['Special_Elite'] w-full min-h-screen">
                <div class="w-full px-4 py-10">
                    <div class="text-3xl font-bold mb-2">Edit Location #{{ location.id }} <span
                            class="text-gray-400">({{ oldName }})</span></div>
                    <div class="flex flex-1 justify-center-safe">
                        <div class="bg-red-900 rounded-lg p-4 shadow-lg font-['Oswald'] w-2xl">
                            <form @submit.prevent="submitForm" class="space-y-4">
                                <div>
                                    <label class="block mb-2">Location Image</label>
                                    <img :src="getImageSrc(location.photo_path)" alt="Location Image"
                                        class="w-full h-32 object-cover mb-2">
                                    <input type="file" ref="fileInput" class="w-full p-2 bg-white text-black rounded">
                                </div>
                                <div>
                                    <label class="block mb-2">Name</label>
                                    <input type="text" v-model="form.name"
                                        class="w-full p-2 bg-white text-black rounded">
                                </div>
                                <div>
                                    <label class="block mb-2">Address</label>
                                    <input type="text" v-model="form.address"
                                        class="w-full p-2 bg-white text-black rounded">
                                </div>
                                <div>
                                    <label class="block mb-2">Description</label>
                                    <textarea v-model="form.description"
                                        class="w-full p-2 bg-white text-black rounded"></textarea>
                                </div>
                                <div>
                                    <label class="block mb-2">Short Description</label>
                                    <input type="text" v-model="form.shortDescription"
                                        class="w-full p-2 bg-white text-black rounded">
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
