<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';

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

        <div class="py-8 prose max-w-none">
            <Link :href="route('documents.create', {role})" v-if="role">Ajouter un {{ role }}</Link>

            <div class="mt-4">
                {{ foreigners }}
            </div>
        </div>

    </AuthenticatedLayout>
</template>