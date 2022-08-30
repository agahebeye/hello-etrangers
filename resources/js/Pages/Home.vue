<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, usePage, Link } from '@inertiajs/inertia-vue3';
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
            <div id="hero" class="container flex flex-col items-center px-4 py-16 mx-auto space-y-20 text-center md:py-8 md:px-10 lg:px-0 xl:max-w-3xl">
                <h1 class="m-0 text-5xl font-bold leading-none sm:text-7xl md:text-8xl">Bienvenue à
                    <span class="text-purple-600">Bujumbura</span>
                </h1>

                <p class="px-8 text-xl md:text-xl">Vous êtes étudiant ou commerçant? et c'est votre première fois de venir au Burundi? Cette plateforme est faite pour vous! Elle vous sera d'une grande aide pour obtenir des documents nécessaires pour un séjour excellent et paisible</p>

                <div class="space-x-3">
                    <Link :href="`${route('home')}#explore`" class="space-x-2 no-underline primary-button">
                    <span>Explorer</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5L12 21m0 0l-7.5-7.5M12 21V3" />
                    </svg>
                    </Link>
                    <Link :href="route('documents.create')" class="no-underline secondary-button">commander</Link>
                </div>
            </div>

            <div id="explore" class="pt-8">
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
        </div>

    </AuthenticatedLayout>
</template>

<style scoped>
.primary-button {
    @apply inline-flex items-center px-16 py-4 font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900;
}

.secondary-button {
    @apply inline-flex items-center px-16 py-4 font-semibold tracking-widest text-gray-800 uppercase transition duration-150 ease-in-out border border-gray-800 bg-white hover:bg-gray-50 focus:outline-none focus:border-gray-900;
}
</style>
