<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, useForm, usePage } from '@inertiajs/inertia-vue3';
import { computed } from '@vue/reactivity';

const user = usePage().props.value.auth.user;
const isAdmin = computed( () => user?.role.name === 'Administrateur');

defineProps({
    users: Array
});
</script>

<template>

    <Head title="Documents/Commander" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Utilisateurs
            </h2>
        </template>

        <div class="py-12">
            {{ users }}
        </div>

    </BreezeAuthenticatedLayout>
</template>

<style scoped>
input:disabled {
    @apply bg-gray-100;
}

.input {
    @apply border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm;
}
</style>