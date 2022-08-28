<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, usePage } from '@inertiajs/inertia-vue3';
import ImageGuallery from '@/Components/Common/ImageGuallery.vue';

import { computed } from 'vue';

const userRole = usePage().props.value.auth?.user?.role;

const isStudent = computed(() => typeof userRole !== 'undefined' && userRole.name === 'Etudiant')
const isTrader = computed(() => typeof userRole !== 'undefined' && userRole.name === 'Commerçant')


defineProps({
    hotels: Array,
    universities: Array,
    markets: Array,
    cities: Array,
})
</script>

<template>

    <Head title="Accueil" />

    <AuthenticatedLayout>
        <template #header>
            <h1 class="text-xl font-semibold leading-tight text-gray-800">
                Accueil
            </h1>
        </template>


        <div class="pt-8 prose max-w-none">
            <div id="hero" class="container flex flex-col items-center px-4 py-16 mx-auto text-center space-y-14 md:py-8 md:px-10 lg:px-24 xl:max-w-3xl">
                <h1 class="m-0 text-4xl font-bold leading-none sm:text-7xl">Quisquam necessita vel
                    <span class="text-purple-600">laborum doloribus</span>delectus
                </h1>
                <p class="px-8 text-lg">Cupiditate minima voluptate temporibus quia? Architecto beatae esse ab amet vero eaque explicabo!</p>
                <div class="flex flex-wrap justify-center">
                    <button class="px-8 py-3 m-2 text-lg font-semibold bg-purple-600 rounded text-gray-50">Explorer</button>
                    <button class="px-8 py-3 m-2 text-lg text-gray-900 border border-gray-300 rounded">commander</button>
                </div>
            </div>

            <!--universities-->
            <div v-if="!isTrader" id="universities">
                <h2 class="my-5 text-4xl text-gray-800">Universities</h2>

                <ImageGuallery :data="universities" />
            </div>

            <!--markets-->
            <div v-if="!isStudent" id="markets">
                <h2 class="my-5 text-4xl text-gray-800">Marchés</h2>

                <ImageGuallery :data="markets" />
            </div>

            <!--hotels-->
            <div v-if="!isStudent" id="hotels">
                <h2 class="my-5 text-4xl text-gray-800">Hotels</h2>

                <ImageGuallery :data="hotels" />
            </div>

            <!--cities-->
            <div>
                <h2 class="my-5 text-4xl text-gray-800">Villes</h2>

                <ImageGuallery :data="cities" />
            </div>
        </div>

    </AuthenticatedLayout>
</template>
