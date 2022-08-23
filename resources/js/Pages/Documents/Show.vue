<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';

import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';

import { computed } from '@vue/reactivity';

const props = defineProps({
    document: Object,
});

const maritalStatuses = computed(() => ({
    'bachelor': 'Célibataire',
    'married': 'Marié(e)',
    'divorced': 'Divorcé(e)',
    'widowed': 'Veuf(ve)'
}));

function printDocument() {
    window.print();
}
</script>

<template>

    <Head :title="`Documents - Document de ${document.user.fullname}`" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between print:hidden">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Le document de <strong>&laquo;{{ document.user.fullname }}&raquo;</strong>
                </h2>

                <Dropdown align="right" width="48">
                    <template #trigger>
                        <span class="inline-flex rounded-md">
                            <button type="button" class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none">
                                Actions
                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </span>
                    </template>

                    <template #content>
                        <div class="flex flex-col">
                            <DropdownLink v-if="!document.validated_at" as="button" method="put" :href="route('documents.validate', { document })">
                                Valider ce document
                            </DropdownLink>

                            <DropdownLink v-if="!document.rejected_at" as="button" method="put" :href="route('documents.reject', { document })">
                                Annuler ce document
                            </DropdownLink>
                        </div>
                    </template>
                </Dropdown>

            </div>
        </template>

        <div class="py-8">
            <div class="max-w-4xl space-y-8 overflow-hidden">
                <div class="flex items-center justify-between pt-2 print:hidden">
                    <Link :href="`/documents/${document.id}/edit`" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray">Modifier ce document</Link>

                    <div class="text-sm font-semibold text-red-400 border-b border-red-400" v-if="document.rejected_at">Vous ne pouvez pas imprimer le document annulé.</div>

                    <button v-else class="flex space-x-2 text-sm font-semibold" @click="printDocument">
                        <span>imprimer ce document</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                        </svg>
                    </button>
                </div>

                <div id="document" class="grid justify-between gap-12 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">

                    <div id="signature" class="space-y-3">
                        <div class="flex flex-col">
                            <span class="font-bold">Signature du candidat</span>
                            <span class="text-xs">Applicant's signature</span>
                        </div>
                        <div class="w-48 h-12 border border-gray-500"></div>
                        <div class="flex flex-col">
                            <span class="font-medium">Prière de signer dans la case réservée</span>
                            <span class="text-xs">Please keep signature within the box</span>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <div class="flex flex-col">
                            <span class="font-bold">Photographie du candidat</span>
                            <span class="text-xs">Applicant's phot</span>
                        </div>

                        <div class="h-40 border border-gray-500 w-36"></div>

                        <div class="flex flex-col">
                            <span class="font-medium">Prière de coller la photo</span>
                            <span class="text-xs">Please paste photo do not staple</span>
                        </div>
                    </div>

                    <div class="flex space-x-3 col-span-full">
                        <div class="flex flex-col">
                            <span class="font-bold">Nom</span>
                            <span class="text-xs">Surname</span>
                        </div>
                        <div>{{ document.user.last_name }}</div>
                    </div>

                    <div class="flex space-x-3 col-span-full">
                        <div class="flex flex-col">
                            <span class="font-bold">Prénom</span>
                            <span class="text-xs">Given names</span>
                        </div>
                        <div>{{ document.user.first_name }}</div>
                    </div>

                    <div class="flex space-x-3">
                        <div class="flex flex-col">
                            <span class="font-bold">Nom de la mère</span>
                            <span class="text-xs">Mother's surname</span>
                        </div>
                        <div>{{ document.mother_lastname }}</div>
                    </div>

                    <div class="flex space-x-3">
                        <div class="flex flex-col">
                            <span class="font-bold">Prénom de la mère</span>
                            <span class="text-xs">Mother's given names</span>
                        </div>
                        <div>{{ document.mother_firstname }}</div>
                    </div>

                    <div class="flex space-x-3">
                        <div class="flex flex-col">
                            <span class="font-bold">Nom de la père</span>
                            <span class="text-xs">Father's surname</span>
                        </div>
                        <div>{{ document.father_firstname }}</div>
                    </div>

                    <div class="flex space-x-3">
                        <div class="flex flex-col">
                            <span class="font-bold">Prénom de la père</span>
                            <span class="text-xs">Father's given names</span>
                        </div>
                        <div>{{ document.father_lastname }}</div>
                    </div>

                    <div class="flex space-x-3 col-span-full">
                        <div class="flex flex-col">
                            <span class="font-bold">Date et Lieu de naissance</span>
                            <span class="text-xs">Date et place of birth</span>
                        </div>
                        <div>{{ document.birth }}</div>
                    </div>

                    <div class="flex space-x-3">
                        <div class="flex flex-col">
                            <span class="font-bold">Sexe</span>
                            <span class="text-xs">Sex</span>
                        </div>
                        <div>{{ document.gender }}</div>
                    </div>

                    <div class="flex space-x-3">
                        <div class="flex flex-col">
                            <span class="font-bold">Etat civil</span>
                            <span class="text-xs">Marital status</span>
                        </div>
                        <div>{{ maritalStatuses[document.marital_status] }}</div>
                    </div>

                    <div class="flex space-x-3">
                        <div class="flex flex-col">
                            <span class="font-bold">Nationalité</span>
                            <span class="text-xs">Nationality</span>
                        </div>
                        <div>{{ document.citizenship }}</div>
                    </div>

                    <div class="flex space-x-3">
                        <div class="flex flex-col">
                            <span class="font-bold">Profession</span>
                            <span class="text-xs">Profession</span>
                        </div>
                        <div>{{ document.user.role.name }}</div>
                    </div>

                    <div class="flex space-x-3 col-span-full">
                        <div class="flex flex-col">
                            <span class="font-bold">Numéro de passport ou autre document de voyage</span>
                            <span class="text-xs">Number of passport or other document</span>
                        </div>
                        <div>{{ document.passport_number }}</div>
                    </div>

                    <div class="flex space-x-3">
                        <div class="flex flex-col">
                            <span class="font-bold">Date et lieu de délivrance</span>
                            <span class="text-xs">Date and place of issue</span>
                        </div>
                        <div>{{ document.passport_issue }}</div>
                    </div>

                    <div class="flex space-x-3">
                        <div class="flex flex-col">
                            <span class="font-bold">Valable jusqu'à</span>
                            <span class="text-xs">Valid until</span>
                        </div>
                        <div>{{ document.passport_validity }}</div>
                    </div>

                    <div class="flex space-x-3 col-span-full">
                        <div class="flex flex-col">
                            <span class="font-bold">Motif de séjour au Burundi</span>
                            <span class="text-xs">Purpose of stay in Burundi</span>
                        </div>
                        <div>{{ document.stay_purpose }}</div>
                    </div>

                    <div class="flex space-x-3 col-span-full">
                        <div class="flex flex-col">
                            <span class="font-bold">Personne/institution de référence</span>
                            <span class="text-xs">Person/Institution of reference</span>
                        </div>
                        <div>{{ document.person_reference }}</div>
                    </div>

                    <div class="flex space-x-3 col-span-full">
                        <div class="flex flex-col">
                            <span class="font-bold">Activité ou situation actuelle</span>
                            <span class="text-xs">Present preoccupation</span>
                        </div>
                        <div>{{ document.current_occupation }}</div>
                    </div>

                    <div class="flex space-x-3 col-span-full">
                        <div class="flex flex-col">
                            <span class="font-bold">Date d'arrivée au Burundi</span>
                            <span class="text-xs">Date of arrival in Burundi</span>
                        </div>
                        <div>{{ document.arrival_date }}</div>
                    </div>

                    <div class="flex space-x-3 col-span-full">
                        <div class="flex flex-col">
                            <span class="font-bold">Addresse au Burundi</span>
                            <span class="text-xs">Adress in Burundi</span>
                        </div>
                        <div>{{ document.user.adress?.avenue ?? 'somewhere in town' }}</div>
                    </div>

                    <div class="flex space-x-3 col-span-full">
                        <div class="flex flex-col">
                            <span class="font-bold">Durée de séjour au Burundi</span>
                            <span class="text-xs">Length of stay in Burundi</span>
                        </div>
                        <div>{{ document.stay_duration }}</div>
                    </div>

                    <div class="flex space-x-3">
                        <div class="flex flex-col">
                            <span class="font-bold">Avez-vous déjà séjourné au Burundi?</span>
                            <span class="text-xs">Been in Burundi before?</span>
                        </div>
                        <div>{{ document.has_been ? 'Yes' : 'No' }}</div>
                    </div>

                    <div class="flex space-x-3">
                        <div class="flex flex-col">
                            <span class="font-bold">Si oui, à quelle époque?</span>
                            <span class="text-xs">If yes, which period?</span>
                        </div>
                        <div>{{ document.has_been_period }}</div>
                    </div>

                    <div class="flex space-x-3 col-span-full">
                        <div class="flex flex-col">
                            <span class="font-bold">Nature du visa sollicité</span>
                            <span class="text-xs">Kind of visa requested</span>
                        </div>
                        <div>{{ document.visa_kind }}</div>
                    </div>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>

<style scoped>
#document {
    grid-template-columns: repeat(2, 20rem);
}
</style>
