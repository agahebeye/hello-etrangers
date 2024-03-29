<script setup>
import Button from '@/Components/Button.vue';
import AuthenticatedLayout from '@/Layouts/Authenticated.vue';
import Input from '@/Components/Input.vue';
import Checkbox from '@/Components/Checkbox.vue';
import Label from '@/Components/Label.vue';
import ValidationErrors from '@/Components/ValidationErrors.vue';
import { Head, useForm, usePage } from '@inertiajs/inertia-vue3';
import { ref, computed } from '@vue/reactivity';

const props = defineProps({
    document: Object,
});

const maritalStatuses = computed(() => ({
    'bachelor': 'Célibataire',
    'married': 'Marié(e)',
    'divorced': 'Divorcé(e)',
    'widowed': 'Veuf(ve)'
}));

const shoulBeChanged = ref(false);

const form = useForm({
    first_name: props.document.user.first_name,
    last_name: props.document.user.last_name,
    mother_firstname: props.document.mother_firstname,
    mother_lastname: props.document.mother_lastname,
    father_firstname: props.document.father_firstname,
    father_lastname: props.document.father_lastname,
    birth: props.document.birth,
    gender: props.document.gender,
    marital_status: props.document.marital_status,
    citizenship: props.document.citizenship,
    profession: props.document.user.role.name,
    passport_number: props.document.passport_number,
    passport_issue: props.document.passport_issue,
    passport_validity: props.document.passport_validity,
    stay_purpose: props.document.stay_purpose,
    person_reference: props.document.person_reference,
    arrival_date: props.document.arrival_date,
    current_occupation: props.document.current_occupation,
    adress: props.document.user.adress?.avenue ?? 'somewhere in town',
    stay_duration: props.document.stay_duration,
    has_been: props.document.has_been,
    has_been_period: props.document.has_been_period,
    visa_kind: props.document.visa_kind,
});

function modifyHasBeen() {
    if (!form.has_been)
        form.has_been_period = null;
}

const submit = () => {
    if (form.isDirty) {
        form.put(route('documents.update', { document: props.document }));
    } else {
        shoulBeChanged.value = true;
        window.scrollTo({behavior: 'smooth', left: 0, top: 0})
    }
};
</script>

<template>

    <Head title="Documents/Modifier" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Modifier le document de <strong>&laquo;{{ document.user.fullname }}&raquo;</strong>
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-5xl overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <ValidationErrors class="mb-4" />

                    <div class="flex items-center my-4 space-x-2 text-sm font-bold text-red-600" v-if="shoulBeChanged">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                        </svg>

                        <div>Vous devez modifier au moins un champ.</div>
                    </div>

                    <form @submit.prevent="submit" class="grid grid-cols-2 gap-6">
                        <div>
                            <Label for="lastname" value="Nom" />
                            <Input id="lastname" type="text" class="block w-full mt-1" v-model="form.last_name" required autofocus autocomplete="name" />
                        </div>

                        <div class="">
                            <Label for="firstname" value="Prénom" />
                            <Input id="firstname" type="text" class="block w-full mt-1" v-model="form.first_name" required autocomplete="name" />
                        </div>

                        <div class="">
                            <Label for="mother_lastname" value="Nom de la mère" />
                            <Input id="mother_lastname" type="text" class="block w-full mt-1" v-model="form.mother_lastname" required autocomplete="off" />
                        </div>

                        <div class="">
                            <Label for="mother_firstname" value="Prénom de la mère" />
                            <Input id="mother_firstname" type="text" class="block w-full mt-1" v-model="form.mother_firstname" required autocomplete="off" />
                        </div>

                        <div class="">
                            <Label for="father_lastname" value="Nom de la père" />
                            <Input id="father_lastname" type="text" class="block w-full mt-1" v-model="form.father_lastname" required autocomplete="off" />
                        </div>

                        <div class="">
                            <Label for="father_firstname" value="Prénom de la père" />
                            <Input id="father_firstname" type="text" class="block w-full mt-1" v-model="form.father_firstname" required autocomplete="off" />
                        </div>

                        <div class="">
                            <Label for="birth" value="Date et Lieu de naissance" />
                            <Input id="birth" type="text" class="block w-full mt-1" v-model="form.birth" required autocomplete="off" />
                        </div>

                        <div class="col-span-full">
                            <Label for="gender" value="Sexe" />
                            <div class="flex my-3 space-x-3">
                                <div class="flex space-x-2">
                                    <input type="radio" id="sexe" value="Masculin" v-model="form.gender" :checked="form.gender === 'Masculin' ? true : null" />
                                    <Label for="sexe" value="Masculin" />
                                </div>
                                <div class="flex space-x-2">
                                    <input type="radio" id="sexe" value="Féminin" v-model="form.gender" :checked="form.gender === 'Féminin' ? true : null" />
                                    <Label for="sexe" value="Féminin" />
                                </div>
                            </div>
                        </div>

                        <div class="col-span-full">
                            <Label for="marital_status" value="Etat Civil" />
                            <select v-model="form.marital_status" class="w-full input">
                                <option v-for="(status, key) in maritalStatuses" :value="key">{{ status }}</option>
                            </select>
                        </div>

                        <div class="">
                            <Label for="citizenship" value="Nationalité" />
                            <Input id="citizenship" type="text" class="block w-full mt-1" v-model="form.citizenship" required autocomplete="off" />
                        </div>

                        <div class="">
                            <Label for="profession" value="Profession" />
                            <Input id="profession" type="text" class="block w-full mt-1" v-model="form.profession" required :disabled="form.profession" autocomplete="off" />
                        </div>

                        <div class="col-span-full">
                            <Label for="passport_number" value="Numéro de passport ou autre props.document de voyage" />
                            <Input id="passport_number" type="text" class="block w-full mt-1" v-model="form.passport_number" required autocomplete="off" />
                        </div>

                        <div class="">
                            <Label for="passport_issue" value="Date et lieu de délivrance" />
                            <Input id="passport_issue" type="text" class="block w-full mt-1" v-model="form.passport_issue" required autocomplete="off" />
                        </div>

                        <div class="">
                            <Label for="passport_validity" value="Valable jusqu'à" />
                            <Input id="passport_validity" :value="form.passport_validity" type="date" class="block w-full mt-1" v-model="form.passport_validity" required autocomplete="off" />
                        </div>

                        <div class="">
                            <Label for="stay_purpose" value="Motif de séjour au Burundi" />
                            <Input id="stay_purpose" type="text" class="block w-full mt-1" v-model="form.stay_purpose" required autocomplete="off" />
                        </div>

                        <div class="">
                            <Label for="person_reference" value="Personne/institution de référence" />
                            <Input id="person_reference" type="text" class="block w-full mt-1" v-model="form.person_reference" required autocomplete="off" />
                        </div>

                        <div class="">
                            <Label for="current_occupation" value="Activité ou situation actuelle" />
                            <Input id="current_occupation" type="text" class="block w-full mt-1" v-model="form.current_occupation" required autocomplete="off" />
                        </div>

                        <div class="">
                            <Label for="arrival_date" value="Date d'arrivée au Burundi" />
                            <Input id="arrival_date" :value="form.arrival_date" type="date" class="block w-full mt-1" v-model="form.arrival_date" required autocomplete="off" />
                        </div>

                        <div class="">
                            <Label for="addresse" value="Addresse au Burundi" />
                            <textarea id="addresse" class="block w-full mt-1 resize-none input" v-model="form.adress" required></textarea>
                        </div>

                        <div class="">
                            <Label for="stay_duration" value="Durée de séjour au Burundi" />
                            <Input id="stay_duration" type="text" class="block w-full mt-1" v-model="form.stay_duration" required autocomplete="off" />
                        </div>

                        <div class="flex items-center space-x-2 ">
                            <Label for="has_been" value="Avez-vous déjà séjourné au Burundi?" />
                            <Checkbox name="has_been" v-model:checked="form.has_been" @change="modifyHasBeen" />
                        </div>

                        <div class="" v-if="form.has_been">
                            <Label for="has_been_period" value="Si oui, à quelle époque?" />
                            <Input id="has_been_period" :value="form.has_been_period" type="date" class="block w-full mt-1" v-model="form.has_been_period" autocomplete="off" />
                        </div>

                        <div class="">
                            <Label for="visa_kind" value="Nature du visa sollicité" />
                            <Input id="visa_kind" type="text" class="block w-full mt-1" v-model="form.visa_kind" required autocomplete="off" />
                        </div>

                        <div class="flex justify-center mt-4 col-span-full">
                            <Button class="px-10 py-4 ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                modifier
                            </Button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>

<style scoped>
input:disabled {
    @apply bg-gray-100;
}

.input {
    @apply border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm;
}
</style>