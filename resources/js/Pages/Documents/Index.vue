<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import { ref, watch } from 'vue';
import { Inertia } from '@inertiajs/inertia';

import pickBy from 'lodash/pickBy';

const props = defineProps({
    documents: Object,
    filters: Object,
});

const headings = ref([{
    'key': 'userId',
    'value': 'ID'
}, {
    'key': 'owner',
    'value': 'Propietaire'
}, {
    'key': 'adress',
    'value': 'Adresse'
},
{
    'key': 'visaStatus',
    'value': 'Status de visa'
}, {
    'key': 'visa_kind',
    'value': 'Nature de visa'
}, {
    'key': 'actions',
    'value': 'Actions'
},
])

const filters = ref(props.filters);

watch(filters, (value) => {
    Inertia.get(route('documents.index'), pickBy(filters.value), { preserveState: true })
}, { deep: true })

function printDocument() {
    window.print();
}
</script>

<template>

    <Head title="Documents" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between print:hidden">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Documents
                </h2>

                <Dropdown align="right" width="48">
                    <template #trigger>
                        <span class="inline-flex rounded-md">
                            <button type="button" class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none">
                                Commander un document pour
                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </span>
                    </template>

                    <template #content>
                        <div class="flex flex-col">
                            <DropdownLink :href="route('documents.create', { role: 'Etudiant' })">
                                un étudiant
                            </DropdownLink>

                            <DropdownLink :href="route('documents.create', { role: 'Commerçant' })">
                                un Commerçant
                            </DropdownLink>
                        </div>
                    </template>
                </Dropdown>

            </div>
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
                                v-model="filters.search"
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

                            <button class="absolute right-0 inline-flex items-center p-2 cursor-pointer top-1" v-if="filters.search" @click="filters.search = ''">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <Dropdown align="right" width="48">
                        <template #trigger>
                            <span class="inline-flex rounded-md">
                                <button type="button" class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out border border-transparent rounded-md hover:text-gray-700 focus:outline-none">
                                    Classer par:
                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </span>
                        </template>

                        <template #content>
                            <div class="flex flex-col">
                                <DropdownLink class="no-underline" as="button" @click.prevent="filters.status = 'pending'">
                                    Non validé
                                </DropdownLink>

                                <DropdownLink class="no-underline" as="button" @click.prevent="filters.status = 'validated'">
                                    Validé
                                </DropdownLink>

                                <DropdownLink class="no-underline" as="button" @click.prevent="filters.status = 'rejected'">
                                    Annulé
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
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="document in documents.data">
                                <tr>
                                    <td class="border-t border-gray-200 border-dashed userId">
                                        <span class="px-4 text-gray-700 ">{{ document.id }}</span>
                                    </td>
                                    <td class="border-t border-gray-200 border-dashed owner">
                                        <span class="px-4 text-gray-700 ">{{ document.user.fullname }}</span>
                                    </td>
                                    <td class="border-t border-gray-200 border-dashed adress">
                                        <span class="px-4 text-gray-700 ">{{ document.user?.adress?.avenue ?? 'somewhere' }}</span>
                                    </td>
                                    <td class="border-t border-gray-200 border-dashed visa_status">
                                        <span v-if="!document.validated_at && !document.rejected_at" class="px-4 py-1 ml-4 text-xs text-yellow-600 bg-yellow-200 rounded-full">Non Validé</span>
                                        <span v-if="document.rejected_at" class="px-4 py-1 ml-4 text-xs text-red-600 bg-red-200 rounded-full">Annulé</span>
                                        <span v-if="document.validated_at" class="px-4 py-1 ml-4 text-xs text-green-600 bg-green-200 rounded-full">Validé</span>
                                    </td>
                                    <td class="border-t border-gray-200 border-dashed visa_kind">
                                        <span class="px-4 text-gray-700">{{ document.visa_kind }}</span>
                                    </td>
                                    <td class="border-t border-gray-200 border-dashed actions">
                                        <div class="flex px-4 space-x-2 item-center">
                                            <Link :href="route('documents.show', { document: document.id })" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            </Link>

                                            <Link :href="route('documents.edit', { document: document.id })" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                            </Link>
                                        </div>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>

                <div class="flex items-center justify-center mt-8 space-x-4 text-sm font-medium">
                    <div>
                        <span>De {{ documents.from }} </span>
                        <span> à {{ documents.to }} </span>
                        <span> sur {{ documents.total }}, </span>
                    </div>
                    <Link class="no-underline" :href="documents.prev_page_url" v-if="documents.prev_page_url">&laquo; Précédent </Link>
                    <Link class="no-underline" :href="documents.next_page_url" v-if="documents.next_page_url">Suivant &raquo; </Link>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>