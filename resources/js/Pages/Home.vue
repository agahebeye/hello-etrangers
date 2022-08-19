<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import {Inertia} from '@inertiajs/inertia';
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    hotels: Array,
    universities: Array,
    markets: Array,
    cities: Array,
})
</script>

<template>

    <Head title="Accueil" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Accueil
            </h2>
        </template>


        <div class="prose max-w-none">
            <!--hotels-->
            <div>
                <h2>Hotels</h2>

                <div class="flex flex-wrap">
                    <div v-for="hotel in hotels" class="relative cursor-pointer w-60" @click="Inertia.get(`/hotels/${hotel.id}`)">
                        <img v-if="hotel.featured_photo" :data-src="hotel.featured_photo.src" class="object-cover w-full h-full overflow-hidden lazyload" />
                        <h3 class="absolute p-2 text-sm bg-white top-6">{{ hotel.name }}</h3>
                    </div>
                </div>
                <!-- <div class="flex flex-wrap gap-2 overflow-x-auto">
                    <div v-for="hotel in hotels">
                    {{ hotel }}
                        <Link class="block h-40 text-center no-underline bg-white shadow-lg w-36" :href="`/hotels/${hotel.id}`">{{ hotel.name }}</Link>
                    </div>
                </div> -->
            </div>

            <!--universities-->
            <div>
                <h2>Universities</h2>
                <div class="flex flex-wrap gap-2 overflow-x-auto">
                    <div v-for="university in universities">
                        <Link class="block h-40 text-center no-underline bg-white shadow-lg w-36" :href="`/universities/${university.id}`">{{ university.name }}</Link>
                    </div>
                </div>
            </div>

            <!--markets-->
            <div>
                <h2>Markets</h2>
                <div class="flex flex-wrap gap-2 overflow-x-auto">
                    <div v-for="market in markets">
                        <Link class="block h-40 text-center no-underline bg-white shadow-lg w-36" :href="`/markets/${market.id}`">{{ market.name }}</Link>
                    </div>
                </div>
            </div>

            <!--cities-->
            <div>
                <h2>Villes</h2>

                <div class="flex flex-wrap">
                    <div v-for="city in cities" class="relative cursor-pointer w-60" @click="Inertia.get(`/cities/${city.id}`)">
                        <img :data-src="city.featured_photo.src" class="object-cover w-full h-full overflow-hidden lazyload" />
                        <h3 class="absolute p-2 text-sm bg-white top-6">{{ city.name }}</h3>
                    </div>
                </div>
            </div>
        </div>

    </BreezeAuthenticatedLayout>
</template>
