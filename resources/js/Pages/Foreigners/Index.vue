<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import { computed, ref } from 'vue';

const props = defineProps({
    foreigners: Object,
    role: String,
});

function printDocument() {
    window.print();
}

const citizenships = computed(() => ['Congolaise', 'Tanzanienne', 'Kenyanne', 'Ugandaise', 'Rwandaise', 'Sudanaise']);

function setCitizenshipQuery(citizenship) {
    const role = props.role ?? '';

    const query = {
        role, citizenship
    }

    return `
    ${route('foreigners.index', query)}
    `
}

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

            <div class="flex items-center justify-between pt-2 print:hidden">
                <!-- <Link :href="`/documents/${document.id}/edit`" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray">Modifier ce document</Link> -->
                <button class="flex space-x-2 text-sm font-semibold" @click="printDocument">
                    <span>Imprimer ce tableau</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                    </svg>
                </button>
            </div>

            <div class="container py-6 mx-auto">
                <div class="flex items-center justify-between mb-4 print:hidden">
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

                    <Dropdown align="right" width="48">
                        <template #trigger>
                            <span class="inline-flex rounded-md">
                                <button type="button" class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out border border-transparent rounded-md hover:text-gray-700 focus:outline-none">
                                    Classer par nationalité:
                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </span>
                        </template>

                        <template #content>
                            <div class="flex flex-col">
                                <DropdownLink v-for="citizenship in [...new Set(citizenships)]" class="no-underline" :href="setCitizenshipQuery(citizenship)">
                                    {{ citizenship }}
                                </DropdownLink>
                            </div>
                        </template>
                    </Dropdown>
                </div>

                <div class="relative overflow-x-auto overflow-y-auto bg-white rounded-lg shadow">
                    <table class="relative w-full m-0 whitespace-no-wrap bg-white border-collapse table-auto table-striped">
                        <thead>
                            <tr class="text-left">
                                <template v-for="heading in headings">
                                    <th class="sticky top-0 px-6 py-2 text-xs font-bold tracking-wider text-gray-600 uppercase bg-gray-100 border-b border-gray-200"
                                        v-text="heading.value" x-ref="heading.key" :class="{ [heading.key]: true }"></th>
                                </template>
                                <th class="sticky top-0 px-6 py-2 text-xs font-bold tracking-wider text-gray-600 uppercase bg-gray-100 border-b border-gray-200" v-if="!role">Role</th>
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
                                    <td v-if="!role" class="border-t border-gray-200 border-dashed phoneNumber">
                                        <span class="px-4 text-gray-700">{{ foreigner.role.name }}</span>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>

                <div class="flex items-center justify-center mt-8 space-x-4 text-sm font-medium">
                    <div>
                        <span>De {{ foreigners.from }} </span>
                        <span> à {{ foreigners.to }} </span>
                        <span> sur {{ foreigners.total }}, </span>
                    </div>
                    <Link class="no-underline" :href="foreigners.prev_page_url" v-if="foreigners.prev_page_url">&laquo; Précédent </Link>
                    <Link class="no-underline" :href="foreigners.next_page_url" v-if="foreigners.next_page_url">Suivant &raquo; </Link>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>