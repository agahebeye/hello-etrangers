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
            <div>Tél: <a :href="`tel: ${hotel.adress.tel}`">{{ hotel.adress.tel }}</a></div>


            <div class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-5">
                <div v-for="photo in hotel.photos" class="max-w-[16rem] max-h-[16rem]">
                    <img :data-src="photo.src" class="object-cover w-full h-full overflow-hidden lazyload" />
                </div>
            </div>
        </div>

    </BreezeAuthenticatedLayout>
</template>