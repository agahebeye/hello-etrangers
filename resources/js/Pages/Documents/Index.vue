<script setup>
import AdminLayout from '@/Layouts/Admin.vue';
import { Head, useForm, usePage } from '@inertiajs/inertia-vue3';

defineProps({
    documents: Array
});
</script>

<template>

    <Head title="Documents" />

    <AdminLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Documents
            </h2>
        </template>

        <div class="py-12">
            {{ documents }}
        </div>

    </AdminLayout>
</template>

<style scoped>
input:disabled {
    @apply bg-gray-100;
}

.input {
    @apply border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm;
}
</style>