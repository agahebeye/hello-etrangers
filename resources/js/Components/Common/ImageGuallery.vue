<script setup>
import { Link } from '@inertiajs/inertia-vue3';

defineProps({
    data: Array
});
</script>

<template>
    <div class="flex flex-wrap mb-14">
        <Link :href="`/${model.model_link}/${model.id}`" v-for="model in data" class="block p-4 no-underline w-60" @click="null">
            <img v-if="model.photo" :data-src="model.photo.src" class="w-full h-56 my-0 rounded shadow-lg lazyload" />
            <h3 class="mt-2 mb-0 ml-2 leading-6 text-gray-700">{{ model.name }}</h3>
        </Link>
    </div>
</template>