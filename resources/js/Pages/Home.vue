<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, usePage } from '@inertiajs/inertia-vue3';
import ImageGuallery from '@/Components/Common/ImageGuallery.vue';

import {computed} from 'vue';

const userRole = usePage().props.value.auth?.user?.role;

const isStudent = computed(() => typeof userRole === 'undefined' && userRole === 'Etudiant') 
const isTrader = computed(() => typeof userRole === 'undefined' && userRole === 'Commerçant') 


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
            <!--hotels-->
            <div v-if="!isStudent" id="hotels">
                <h2 class="my-5 text-4xl text-gray-800">Hotels</h2>

                <ImageGuallery :data="hotels" />
            </div>

            <!--universities-->
            <div v-if="!isTrader" id="universities">
                <h2 class="my-5 text-4xl text-gray-800">Universities</h2>

               <ImageGuallery :data="universities" />
            </div>

            <!--markets-->
            <div v-if="!isStudent" id="markets">
                <h2 class="my-5 text-4xl text-gray-800">Markets</h2>

                <ImageGuallery :data="markets" />
            </div>

            <!--cities-->
            <div>
                <h2 class="my-5 text-4xl text-gray-800">Villes</h2>

                <ImageGuallery :data="cities" />
            </div>
        </div>

    </AuthenticatedLayout>
</template>
