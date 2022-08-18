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

        <div class="pt-8 prose max-w-none">
            <h1>{{ city.name }}</h1>

            <div>Population: {{ city.population }}</div>
            <div>superficies: {{ city.superficies }} km<sup>2</sup></div>

            <div class="mt-16 columns-2 md:columns-3 lg:columns-4">
                <img loading="lazy" class="lazyload w-full max-w-[400px] max-h-[250px]" v-for="photo in city.photos" :data-src="photo.src" />
            </div>
        </div>

    </BreezeAuthenticatedLayout>
</template>