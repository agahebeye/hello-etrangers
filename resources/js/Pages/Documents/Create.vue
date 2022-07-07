<script setup>
import BreezeButton from '@/Components/Button.vue';
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeCheckbox from '@/Components/Checkbox.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import { Head, Link, useForm, usePage } from '@inertiajs/inertia-vue3';

const user = usePage().props.value.auth.user;

const maritalStatuses = {
    'bachelor': 'Célibataire',
    'married': 'Marié(e)',
    'divorced': 'Divorcé(e)',
    'widowed': 'Veuf(ve)'
};

const form = useForm({
    firstname: user.firstname,
    lastname: user.lastname,
    mother_firstname: '',
    mother_lastname: '',
    father_firstname: '',
    father_lastname: '',
    birth: '',
    gender: '',
    marital_status: '',
    citizenship: '',
    profession: user.roles[0].name,
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

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>

    <Head title="Documents" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Commander un document
            </h2>
        </template>


        <div class="p-6 pt-0">
            <BreezeValidationErrors class="mb-4" />

            <form @submit.prevent="submit" class="grid grid-cols-2 gap-6">
                <div>
                    <BreezeLabel for="lastname" value="Nom" />
                    <BreezeInput id="lastname" type="text" class="mt-1 block w-full" v-model="form.lastname" required disabled autofocus autocomplete="name" />
                </div>

                <div class="">
                    <BreezeLabel for="firstname" value="Prénom" />
                    <BreezeInput id="firstname" type="text" class="mt-1 block w-full" v-model="form.firstname" required disabled autocomplete="name" />
                </div>

                <div class="">
                    <BreezeLabel for="mother_lastname" value="Nom de la mère" />
                    <BreezeInput id="mother_lastname" type="text" class="mt-1 block w-full" v-model="form.mother_lastname" required autocomplete="off" />
                </div>

                <div class="">
                    <BreezeLabel for="mother_firstname" value="Prénom de la mère" />
                    <BreezeInput id="mother_firstname" type="text" class="mt-1 block w-full" v-model="form.mother_firstname" required autocomplete="off" />
                </div>

                <div class="">
                    <BreezeLabel for="father_lastname" value="Nom de la père" />
                    <BreezeInput id="father_lastname" type="text" class="mt-1 block w-full" v-model="form.father_lastname" required autocomplete="off" />
                </div>

                <div class="">
                    <BreezeLabel for="father_firstname" value="Prénom de la père" />
                    <BreezeInput id="father_firstname" type="text" class="mt-1 block w-full" v-model="form.father_firstname" required autocomplete="off" />
                </div>

                <div class="">
                    <BreezeLabel for="birth" value="Date et Lieu de naissance" />
                    <BreezeInput id="birth" type="text" class="mt-1 block w-full" v-model="form.birth" required autocomplete="off" />
                </div>

                <div class="col-span-full">
                    <BreezeLabel for="gender" value="Sexe" />
                    <div class="flex space-x-3 my-3">
                        <div class="flex space-x-2">
                            <input type="radio" id="masculin" value="male" v-model="form.gender" required />
                            <BreezeLabel for="masculin" value="Masculin" />
                        </div>
                        <div class="flex space-x-2">
                            <input type="radio" id="feminin" value="female" v-model="form.gender" required />
                            <BreezeLabel for="feminin" value="Féminin" />
                        </div>
                    </div>
                </div>

                <div class="">
                    <BreezeLabel for="marital_status" value="Etat Civil" />
                    <select v-model="form.marital_status" class="border-none input">
                        <option v-for="(status, key) in maritalStatuses" :value="key">{{status}}</option>
                    </select>
                    <!-- <div class="flex space-x-3 my-3" id="marital_status">
                        <div class="flex space-x-2">
                            <input type="radio" id="Ccelibataire" value="bachelor" v-model="form.marital_status" required />
                            <BreezeLabel for="celibataire" value="Célibataire" />
                        </div>
                        <div class="flex space-x-2">
                            <input type="radio" id="married" value="married" v-model="form.marital_status" required />
                            <BreezeLabel for="married" value="Marié(e)"></BreezeLabel>
                        </div>
                        <div class="flex space-x-2">
                            <input type="radio" id="divorced" value="divorced" v-model="form.marital_status" required />
                            <BreezeLabel for="divorced" value="Divore(e)"></BreezeLabel>
                        </div>
                        <div class="flex space-x-2">
                            <input type="radio" id="widowed" value="widowed" v-model="form.marital_status" required />
                            <BreezeLabel for="widowed" value="Veuf(ve)"></BreezeLabel>
                        </div>
                    </div> -->
                </div>

                <div class="">
                    <BreezeLabel for="profession" value="Profession" />
                    <BreezeInput id="profession" type="text" class="mt-1 block w-full" v-model="form.profession" required disabled autocomplete="off" />
                </div>

                <div class="">
                    <BreezeLabel for="passport_number" value="Numéro de passport ou autre document de voyage" />
                    <BreezeInput id="passport_number" type="text" class="mt-1 block w-full" v-model="form.passport_number" required autocomplete="off" />
                </div>

                <div class="">
                    <BreezeLabel for="passport_validity" value="Valable jusqu'à" />
                    <BreezeInput id="passport_validity" type="date" class="mt-1 block w-full" v-model="form.passport_validity" required autocomplete="off" />
                </div>

                <div class="">
                    <BreezeLabel for="stay_purpose" value="Motif de séjour au Burundi" />
                    <BreezeInput id="stay_purpose" type="text" class="mt-1 block w-full" v-model="form.stay_purpose" required autocomplete="off" />
                </div>

                <div class="">
                    <BreezeLabel for="person_reference" value="Personne/institution de référence" />
                    <BreezeInput id="person_reference" type="text" class="mt-1 block w-full" v-model="form.person_reference" required autocomplete="off" />
                </div>

                <div class="">
                    <BreezeLabel for="current_occupation" value="Activité ou situation actuelle" />
                    <BreezeInput id="current_occupation" type="text" class="mt-1 block w-full" v-model="form.current_occupation" required autocomplete="off" />
                </div>

                <div class="">
                    <BreezeLabel for="arrival_date" value="Date d'arrivée au Burundi" />
                    <BreezeInput id="arrival_date" type="text" class="mt-1 block w-full" v-model="form.arrival_date" required autocomplete="off" />
                </div>

                <div class="">
                    <BreezeLabel for="addresse" value="Addresse au Burundi" />
                    <BreezeInput id="addresse" type="text" class="mt-1 block w-full" v-model="form.adress" required autocomplete="off" />
                </div>

                <div class="">
                    <BreezeLabel for="stay_duration" value="Durée de séjour au Burundi" />
                    <BreezeInput id="stay_duration" type="text" class="mt-1 block w-full" v-model="form.stay_duration" required autocomplete="off" />
                </div>

                <div class=" flex space-x-2 items-center">
                    <BreezeLabel for="has_been" value="Avez-vous déjà séjourné au Burundi?" />
                    <BreezeCheckbox name="has_been" v-model:checked="form.has_been" />
                </div>

                <div class="" v-if="form.has_been">
                    <BreezeLabel for="has_been_period" value="Si oui, à quelle époque?" />
                    <BreezeInput id="has_been_period" type="date" class="mt-1 block w-full" v-model="form.has_been_period" required autocomplete="off" />
                </div>

                <div class="">
                    <BreezeLabel for="visa_kind" value="Nature du visa sollicité" />
                    <BreezeInput id="visa_kind" type="text" class="mt-1 block w-full" v-model="form.visa_kind" required autocomplete="off" />
                </div>

                <div class="flex justify-center mt-4 col-span-full">
                    <BreezeButton class="ml-4 px-10 py-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        commander
                    </BreezeButton>
                </div>
            </form>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<style scoped>
input:disabled {
    @apply bg-transparent;
}
.input {
     @apply border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm;
}
</style>