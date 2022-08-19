<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    market: Object,
})
</script>
<template>

    <Head :title="`Marchés/${market.name}`" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Marchés / <span class="text-gray-500">{{ market.name }}</span>
            </h2>
        </template>

        <div class="pt-8 prose max-w-none">
            <h1>{{ market.name }}</h1>

            <div class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-5">
                <div v-for="photo in market.photos" class="max-w-[16rem] max-h-[16rem]">
                    <img :data-src="photo.src" class="object-cover w-full h-full overflow-hidden lazyload" />
                </div>
            </div>
        </div>

    </BreezeAuthenticatedLayout>
</template>