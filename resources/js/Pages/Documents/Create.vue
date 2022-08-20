<script setup>
import Button from '@/Components/Button.vue';
import AuthenticatedLayout from '@/Layouts/Authenticated.vue';
import Input from '@/Components/Input.vue';
import Checkbox from '@/Components/Checkbox.vue';
import Label from '@/Components/Label.vue';
import ValidationErrors from '@/Components/ValidationErrors.vue';
import { Head, useForm, usePage } from '@inertiajs/inertia-vue3';
import { computed } from '@vue/reactivity';

const user = usePage().props.value.auth.user;
const isAdmin = computed( () => user?.role.name === 'Administrateur');

const props = defineProps({
    hasCommanded: Boolean,
    role: String,
});

const maritalStatuses = {
    'bachelor': 'Célibataire',
    'married': 'Marié(e)',
    'divorced': 'Divorcé(e)',
    'widowed': 'Veuf(ve)'
};

const form = useForm({
    first_name: isAdmin.value ? '' : user.firstName,
    last_name: isAdmin.value ? '' : user.lastName,
    mother_firstname: '', 
    mother_lastname: '',
    father_firstname: '',
    father_lastname: '',
    birth: '',
    gender: '',
    marital_status: '',
    citizenship: '',
    profession: isAdmin.value ? props.role : user.role.name,
    passport_number: '',
    passport_issue: '',
    passport_validity: '',
    stay_purpose: '',
    person_reference: '',
    arrival_date: '',
    current_occupation: '',
    adress: '',
    stay_duration: '',
    has_been: false,
    has_been_period: '',
    visa_kind: '',
});

function modifyHasBeen() {
    if (!form.has_been)
        form.has_been_period = null;
}

const submit = () => {
    form.post(route('documents.store'));
};
</script>

<template>

    <Head title="Documents/Commander" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Commander un document
            </h2>
        </template>

        <div class="py-12">
            <div class="p-5 bg-white shadow-sm sm:rounded-lg" v-if="!isAdmin && hasCommanded">Votre document n'a pas encore expiré. Vous ne pouvez pas en commander un autre.</div>
            <template v-else>
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <ValidationErrors class="mb-4" />

                        <form @submit.prevent="submit" class="grid grid-cols-2 gap-6">
                            <div>
                                <Label for="lastname" value="Nom" />
                                <Input id="lastname" type="text" class="block w-full mt-1" v-model="form.last_name" required :disabled="!isAdmin" autofocus autocomplete="name" />
                            </div>

                            <div class="">
                                <Label for="firstname" value="Prénom" />
                                <Input id="firstname" type="text" class="block w-full mt-1" v-model="form.first_name" required :disabled="!isAdmin" autocomplete="name" />
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
                                        <input type="radio" id="sexe" value="male" v-model="form.gender" />
                                        <Label for="sexe" value="Masculin" />
                                    </div>
                                    <div class="flex space-x-2">
                                        <input type="radio" id="sexe" value="female" v-model="form.gender" />
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
                                <Label for="passport_number" value="Numéro de passport ou autre document de voyage" />
                                <Input id="passport_number" type="text" class="block w-full mt-1" v-model="form.passport_number" required autocomplete="off" />
                            </div>

                            <div class="">
                                <Label for="passport_issue" value="Date et lieu de délivrance" />
                                <Input id="passport_issue" type="text" class="block w-full mt-1" v-model="form.passport_issue" required autocomplete="off" />
                            </div>

                            <div class="">
                                <Label for="passport_validity" value="Valable jusqu'à" />
                                <Input id="passport_validity" type="date" class="block w-full mt-1" v-model="form.passport_validity" required autocomplete="off" />
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
                                <Input id="arrival_date" type="date" class="block w-full mt-1" v-model="form.arrival_date" required autocomplete="off" />
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
                                <Input id="has_been_period" type="date" class="block w-full mt-1" v-model="form.has_been_period" autocomplete="off" />
                            </div>

                            <div class="">
                                <Label for="visa_kind" value="Nature du visa sollicité" />
                                <Input id="visa_kind" type="text" class="block w-full mt-1" v-model="form.visa_kind" required autocomplete="off" />
                            </div>

                            <div class="flex justify-center mt-4 col-span-full">
                                <Button class="px-10 py-4 ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                    commander
                                </Button>
                            </div>
                        </form>
                    </div>
                </div>
            </template>
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