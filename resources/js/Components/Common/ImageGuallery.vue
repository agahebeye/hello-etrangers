<script setup>
import {Inertia} from '@inertiajs/inertia';

defineProps({
    data: Array
});
</script>

<template>
    <div class="m-0 bg-white">
        <div v-for="model in data" class="flex flex-col items-stretch border cursor-pointer w-60 h-60" @click="Inertia.get(`/universities/${model.id}`)">
            <img v-if="model.photo_url" :data-src="model.photo_url" class="object-cover w-full h-full lazyload" />
            <img v-if="model.featured_photo" :data-src="model.featured_photo?.src" class="object-cover w-full h-full lazyload" />
            <h3 class="p-2 text-sm bg-white top-6">{{ model.name }}</h3>
        </div>
    </div>
</template>