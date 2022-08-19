<script setup>
import {Inertia} from '@inertiajs/inertia';

defineProps({
    data: Array
});
</script>

<template>
    <div class="flex flex-wrap">
        <div v-for="model in data" class="border w-60" @click="null">
            <img v-if="model.photo" :data-src="model.photo.src" class="w-full h-56 my-0 lazyload" />
            <h3 class="m-0">{{ model.name }}</h3>
        </div>
    </div>
</template>

<!-- <div>Inertia.get(`/${model.model_link}/${model.id}`)</div> -->