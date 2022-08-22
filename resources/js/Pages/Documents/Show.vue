<script setup>
import Button from '@/Components/Button.vue';
import AuthenticatedLayout from '@/Layouts/Authenticated.vue';
import Input from '@/Components/Input.vue';
import Checkbox from '@/Components/Checkbox.vue';
import Label from '@/Components/Label.vue';
import ValidationErrors from '@/Components/ValidationErrors.vue';
import { Head, useForm, usePage } from '@inertiajs/inertia-vue3';
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

    <Head title="Documents/Modifier" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Le document de <strong>&laquo;{{ document.user.fullname }}&raquo;</strong>
            </h2>
        </template>

        <div class="py-12">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <ValidationErrors class="mb-4" />

                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <div>Nom</div>
                            <div>{{ document.user.last_name }}</div>
                        </div>

                        <div class="">
                            <div>Prénom</div>
                            <div>{{ document.user.first_name }}</div>
                        </div>

                        <div>
                            <div>Nom de la mère</div>
                            <div>{{ document.mother_lastname }}</div>
                        </div>

                        <div>
                            <div>Prénom de la mère</div>
                            <div>{{ document.mother_firstname }}</div>
                        </div>

                        <div>
                            <div>Nom de la père</div>
                            <div>{{ document.father_lastname }}</div>
                        </div>

                        <div>
                            <div>Prénom de la père</div>
                            <div>{{ document.father_firstname }}</div>
                        </div>

                        <div>
                            <div>Date et Lieu de naissance</div>
                            <div>{{ document.birth }}</div>
                        </div>

                        <div>
                            <div>Sexe</div>
                            <div>{{ document.gender }}</div>
                        </div>

                        <div>
                            <div>Etat civil</div>
                            <div>{{ maritalStatuses[document.marital_status] }}</div>
                        </div>

                        <div>
                            <div>Nationalité</div>
                            <div>{{ document.citizenship }}</div>
                        </div>

                        <div>
                            <div>Profession</div>
                            <div>{{ document.user.role.name }}</div>
                        </div>

                        <div>
                            <div>Numéro de passport ou autre document de voyage</div>
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
