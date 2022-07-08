<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
</script>

<template>

    <Head title="Documents" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Accueil
            </h2>
        </template>


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex py-12">
            <div class="hidden sm:flex flex-col">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        Accueil
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>