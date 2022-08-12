<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    city: Object,
})
</script>
<template>

    <Head :title="`Villes/${city.name}`" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Villes / <span class="text-gray-500">{{ city.name }}</span>
            </h2>
        </template>

        <div class="prose max-w-none">
            <div class="mb-6 featured_image">
                <div class="w-full leading-[18rem] text-center bg-white h-72">Photo ici...</div>
            </div>

            <h1> {{ city.name }}</h1>
        </div>
        
    </BreezeAuthenticatedLayout>
</template>