<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';

const props = defineProps({
    university: Object,
})

</script>
<template>

    <Head :title="`Universités/${university.name}`" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Universités / <span class="text-gray-500">{{ university.name }}</span>
            </h2>
        </template>


        <div class="prose max-w-none">
            <div class="mb-6 featured_image">
                <img class="w-full lazyload h-96 md:h-[30rem]" :data-src="university.photo.src" />
            </div>

            <h1 class="m-0 mb-4"> {{ university.name }}</h1>

            <h2 class="mt-0">"{{ university.devise }}"</h2>

            <div>Siteweb: <a :href="university.website_url">{{ university.website_url }}</a></div>
            <div>Email: <a :href="`mailto: ${university.email}`">{{ university.email }}</a></div>
            <div>Tél: <a :href="`tel: ${university.adress.tel}`">{{ university.adress.tel }}</a></div>
            <div>Boîte postale: {{ university.adress.postal_code }}</div>

            <div>
                <h3>Facultés disponibles:</h3>
                <ul>
                    <li class="list-disc" v-for="faculty in university.faculties">
                        {{ faculty.name }}
                    </li>
                </ul>
            </div>
        </div>

    </BreezeAuthenticatedLayout>
</template>