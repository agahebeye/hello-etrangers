<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';

defineProps({
    foreigners: Array,
    role: String,
});


const headings = ref([{
    'key': 'userId',
    'value': 'ID'
}, {
    'key': 'firstName',
    'value': 'Nom'
}, {
    'key': 'lastName',
    'value': 'Prénom'
}, {
    'key': 'emailAddress',
    'value': 'Email'
}, {
    'key': 'gender',
    'value': 'Sexe'
}, {
    'key': 'citizenship',
    'value': 'Nationalité'
}
])
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

            <div class="container px-4 py-6 mx-auto">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex-1 pr-4">
                        <div class="relative md:w-1/3">
                            <input type="search"
                                class="w-full py-2 pl-10 pr-4 font-medium text-gray-600 rounded-lg shadow focus:outline-none focus:shadow-outline"
                                placeholder="Search...">
                            <div class="absolute top-0 left-0 inline-flex items-center p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                                    <circle cx="10" cy="10" r="7" />
                                    <line x1="21" y1="21" x2="15" y2="15" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="relative overflow-x-auto overflow-y-auto bg-white rounded-lg shadow">
                    <table class="relative w-full m-0 whitespace-no-wrap bg-white border-collapse table-auto table-striped">
                        <thead>
                            <tr class="text-left">
                                <template v-for="heading in headings">
                                    <th class="sticky top-0 px-6 py-2 text-xs font-bold tracking-wider text-gray-600 uppercase bg-gray-100 border-b border-gray-200"
                                        v-text="heading.value" x-ref="heading.key" :class="{ [heading.key]: true }"></th>
                                </template>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="foreigner in foreigners.data">
                                <tr>
                                    <td class="border-t border-gray-200 border-dashed userId">
                                        <span class="px-4 text-gray-700 ">{{ foreigner.id }}</span>
                                    </td>
                                    <td class="border-t border-gray-200 border-dashed first_name">
                                        <span class="px-4 text-gray-700 ">{{ foreigner.first_name }}</span>
                                    </td>
                                    <td class="border-t border-gray-200 border-dashed lastName">
                                        <span class="px-4 text-gray-700 ">{{ foreigner.last_name }}</span>
                                    </td>
                                    <td class="border-t border-gray-200 border-dashed emailAddress">
                                        <span class="px-4 text-gray-700">{{ foreigner.email }}</span>
                                    </td>
                                    <td class="border-t border-gray-200 border-dashed gender">
                                        <span class="px-4 text-gray-700">{{ foreigner.document.gender }}</span>
                                    </td>
                                    <td class="border-t border-gray-200 border-dashed phoneNumber">
                                        <span class="px-4 text-gray-700">{{ foreigner.document.citizenship }}</span>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>

                <div class="flex items-center justify-center mt-8 space-x-4 text-sm font-medium">
                    <div>
                        <span>De {{ foreigners.from}} </span>
                        <span> à {{ foreigners.to}} </span>
                        <span> sur {{ foreigners.total}}, </span>
                    </div>
                    <Link class="no-underline" :href="foreigners.prev_page_url" v-if="foreigners.prev_page_url">&laquo; Précédent </Link>
                    <Link class="no-underline" :href="foreigners.next_page_url" v-if="foreigners.next_page_url">Suivant &raquo; </Link>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>