<script setup>
import { Link } from '@inertiajs/inertia-vue3';

defineProps({
    data: Array
});
</script>

<template>
    <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4">
        <Link :href="`/${model.model_link}/${model.id}`" v-for="model in data" class="block p-4 no-underline w-80" @click="null">
            <img v-if="model.photo" :data-src="model.photo.src" class="w-full my-0 rounded shadow-lg h-72 lazyload" />
            <h3 class="mt-2 mb-0 ml-2 leading-6 text-gray-700">{{ model.name }}</h3>
        </Link>
    </div>
</template>