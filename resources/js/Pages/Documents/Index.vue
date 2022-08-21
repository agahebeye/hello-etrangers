<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';

defineProps({
    documents: Array
});
</script>

<template>

    <Head title="Documents" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Documents
            </h2>
        </template>

        <div class="py-8">
            {{ documents }}
        </div>

    </AuthenticatedLayout>
</template>