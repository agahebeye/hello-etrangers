<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';

defineProps({
    foreigners: Array,
    role: String,
});
</script>

<template>

    <Head title="Documents" />

    <AuthenticatedLayout>
        <template #header>
            <h2 v-if="role" class="text-xl font-semibold leading-tight text-gray-800">
            {{ role }}s
            </h2>

            <h2 v-else class="text-xl font-semibold leading-tight text-gray-800">
                Tous les étrangers
            </h2>
        </template>

        <div class="py-12">
            {{ foreigners }}
        </div>

    </AuthenticatedLayout>
</template>