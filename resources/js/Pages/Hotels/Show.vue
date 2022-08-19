<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    hotel: Object,
})
</script>
<template>

    <Head :title="`Hotels/${hotel.name}`" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Hotels / <span class="text-gray-500">{{ hotel.name }}</span>
            </h2>
        </template>

        <div class="pt-8 prose max-w-none">
            <h1>{{ hotel.name }}</h1>

            <div>Chambres: {{ hotel.room_count }}</div>
            <div>Avenue: {{ hotel.adress.avenue }}</div>
            <div>Tel: {{ hotel.adress.tel }}</div>

            <div class="grid grid-cols-3">
                <div v-for="photo in hotel.photos" class="max-w-[16rem]">
                    <img :data-src="photo.src" class="object-cover w-full h-full overflow-hidden lazyload" />
                </div>
            </div>
        </div>

    </BreezeAuthenticatedLayout>
</template>