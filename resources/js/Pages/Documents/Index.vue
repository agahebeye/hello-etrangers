<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';

defineProps({
    documents: Array,
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
</script>

<template>

    <Head title="Documents" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Documents
            </h2>
        </template>

        <div class="py-8 prose max-w-none">

            <div class="container py-6 mx-auto">
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
                            <template v-for="document in documents.data">
                                <tr>
                                    <td class="border-t border-gray-200 border-dashed userId">
                                        <span class="px-4 text-gray-700 ">{{ document.id }}</span>
                                    </td>
                                    <td class="border-t border-gray-200 border-dashed owner">
                                        <span class="px-4 text-gray-700 ">{{ document.user.fullname }}</span>
                                    </td>
                                    <td class="border-t border-gray-200 border-dashed adress">
                                        <span class="px-4 text-gray-700 ">{{ document.user.adress?.avenue ?? 'somewhere in Burundi' }}</span>
                                    </td>
                                    <td class="border-t border-gray-200 border-dashed visa_status">
                                        <span v-if="!document.validated_at && !document.rejected_at" class="px-4 py-1 ml-4 text-xs text-yellow-600 bg-yellow-200 rounded-full">Programmé</span>
                                        <span v-if="document.rejected_at" class="px-4 py-1 ml-4 text-xs text-red-600 bg-red-200 rounded-full">Annulé</span>
                                        <span v-if="document.validated_at" class="px-4 py-1 ml-4 text-xs text-green-600 bg-green-200 rounded-full">Validé</span>
                                    </td>
                                    <td class="border-t border-gray-200 border-dashed visa_kind">
                                        <span class="px-4 text-gray-700">{{ document.visa_kind }}</span>
                                    </td>
                                    <td class="border-t border-gray-200 border-dashed actions">
                                        <div class="flex px-4 space-x-2 item-center">
                                            <Link :href="route('documents.show', {document: document.id})" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </Link>

                                            <Link :href="route('documents.edit', {document: document.id})" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
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