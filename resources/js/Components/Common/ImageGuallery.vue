<script setup>
defineProps({
    data: Array
});
</script>

<template>
    <div class="flex flex-wrap">
        <div v-for="university in data" class="relative cursor-pointer w-60 h-60" @click="Inertia.get(`/universities/${university.id}`)">
            <img v-if="university.photo_url" :data-src="university.photo_url" class="object-cover w-full h-full overflow-hidden lazyload" />
            <h3 class="absolute p-2 text-sm bg-white top-6">{{ university.name }}</h3>
        </div>
    </div>
</template>