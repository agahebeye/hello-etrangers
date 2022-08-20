<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';

defineProps({
    foreigners: Array
});
</script>

<template>

    <Head title="Documents" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Foreigners
            </h2>
        </template>

        <div class="py-12">
            {{ foreigners }}
        </div>

    </AuthenticatedLayout>
</template>