<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
import NavLink from '@/Components/NavLink.vue';

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
            <NavLink class="text-lg no-underline" :href="route('documents.create', {role})" v-if="role">Commander un document pour un {{ role }}</NavLink>

            <div class="mt-4">
                {{ foreigners }}
            </div>
        </div>

    </AuthenticatedLayout>
</template>