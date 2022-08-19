<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Inertia } from '@inertiajs/inertia';
import { Head, Link } from '@inertiajs/inertia-vue3';
import ImageGuallery from '@/Components/Common/ImageGuallery.vue';

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

                <ImageGuallery :data="hotels" />
            </div>

            <!--universities-->
            <div>
                <h2>Universities</h2>

               <ImageGuallery :data="universities" />
            </div>

            <!--markets-->
            <div>
                <h2>Markets</h2>

                <ImageGuallery :data="markets" />
            </div>

            <!--cities-->
            <div>
                <h2>Villes</h2>

                <ImageGuallery :data="cities" />
            </div>
        </div>

    </BreezeAuthenticatedLayout>
</template>
