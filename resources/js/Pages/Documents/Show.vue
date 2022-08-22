<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
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
</script>

<template>

    <Head :title="`Documents - Document de ${document.user.fullname}`" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Le document de <strong>&laquo;{{ document.user.fullname }}&raquo;</strong>
            </h2>
        </template>

        <div class="py-12">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-2 gap-6">
                        <div class="flex space-x-3">
                            <div class="flex flex-col">
                                <span class="font-bold">Nom</span>
                                <span class="text-xs">Surname</span>
                            </div>
                            <div>{{ document.user.last_name }}</div>
                        </div>

                        <div class="flex space-x-3">
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

                        <div>
                            <div></div>
                            <div>{{ document.passport_number }}</div>
                        </div>

                        <div>
                            <div>Date et lieu de délivrance</div>
                            <div>{{ document.passport_issue }}</div>
                        </div>

                        <div>
                            <div>Valable jusqu'à</div>
                            <div>{{ document.passport_validity }}</div>
                        </div>

                        <div>
                            <div>Motif de séjour au Burundi</div>
                            <div>{{ document.stay_purpose }}</div>
                        </div>

                        <div>
                            <div>Personne/institution de référence</div>
                            <div>{{ document.person_reference }}</div>
                        </div>

                        <div>
                            <div>Activité ou situation actuelle</div>
                            <div>{{ document.current_occupation }}</div>
                        </div>

                        <div class="">
                            <div>Date d'arrivée au Burundi</div>
                            <div>{{ document.arrival_date }}</div>
                        </div>

                        <div>
                            <div>Addresse au Burundi</div>
                            <div>{{ document.user.adress?.avenue ?? 'somewhere in town' }}</div>
                        </div>

                        <div>
                            <div>Durée de séjour au Burundi</div>
                            <div>{{ document.stay_duration }}</div>
                        </div>

                        <div>
                            <div>Avez-vous déjà séjourné au Burundi?</div>
                            <div>{{ document.has_been }}</div>
                        </div>

                        <div>
                            <div>Si oui, à quelle époque?</div>
                            <div>{{ document.has_been_period }}</div>
                        </div>

                        <div>
                            <div>Nature du visa sollicité</div>
                            <div>{{ document.visa_kind }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>
