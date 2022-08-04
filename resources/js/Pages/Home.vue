<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    hotels: Array,
    universities: Array,
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
                <div class="flex flex-wrap gap-2 overflow-x-auto">
                    <div v-for="hotel in hotels">
                        <Link class="block h-40 text-center no-underline bg-white shadow-lg w-36" :href="`/hotels/${hotel.id}`">{{ hotel.name }}</Link>
                    </div>
                </div>
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
            </div>

            <!--cities-->
            <div>
                <h2>Cities</h2>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
