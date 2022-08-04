<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';

</script>

<template>

    <Head title="Accueil" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Accueil
            </h2>
        </template>


        <div>
            <!--hotels-->
            <div>
                <h2>Hotels</h2>
            </div>

            <!--universities-->
            <div>
                <h2>Universities</h2>
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
