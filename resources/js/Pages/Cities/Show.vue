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

            <div class="grid grid-cols-3">
                <div v-for="photo in city.photos" class="max-w-[16rem]">
                    <img :data-src="photo.src" class="object-cover w-full h-full overflow-hidden lazyload" />
                </div>
            </div>
        </div>

    </BreezeAuthenticatedLayout>
</template>