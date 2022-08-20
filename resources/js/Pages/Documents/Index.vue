<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, useForm, usePage } from '@inertiajs/inertia-vue3';

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

        <div class="py-12">
            {{ documents }}
        </div>

    </AuthenticatedLayout>
</template>