<script setup>
import BreezeButton from '@/Components/Button.vue';
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import { Head, Link, useForm, usePage } from '@inertiajs/inertia-vue3';

const user = usePage().props.value.auth.user;

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
    has_been: '',
    has_been_period: '',
    visa_kind: '',
    email: '',
    password: '',
    password_confirmation: '',
    role: '',
    terms: false,
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

            <form @submit.prevent="submit">
                <div>
                    <BreezeLabel for="lastname" value="Nom" />
                    <BreezeInput id="lastname" type="text" class="mt-1 block w-full" v-model="form.lastname" required autofocus autocomplete="name" />
                </div>

                <div class="mt-4">
                    <BreezeLabel for="firstname" value="Prénom" />
                    <BreezeInput id="firstname" type="text" class="mt-1 block w-full" v-model="form.firstname" required autofocus autocomplete="name" />
                </div>

                <div class="mt-4">
                    <BreezeLabel for="mother_lastname" value="Nom de la mère" />
                    <BreezeInput id="mother_lastname" type="text" class="mt-1 block w-full" v-model="form.mother_lastname" required autocomplete="off" />
                </div>

                <div class="mt-4">
                    <BreezeLabel for="mother_firstname" value="Prénom de la mère" />
                    <BreezeInput id="mother_firstname" type="text" class="mt-1 block w-full" v-model="form.mother_firstname" required autocomplete="off" />
                </div>

                <div class="mt-4">
                    <BreezeLabel for="father_lastname" value="Nom de la père" />
                    <BreezeInput id="father_lastname" type="text" class="mt-1 block w-full" v-model="form.father_lastname" required autocomplete="off" />
                </div>

                <div class="mt-4">
                    <BreezeLabel for="father_firstname" value="Prénom de la père" />
                    <BreezeInput id="father_firstname" type="text" class="mt-1 block w-full" v-model="form.father_firstname" required autocomplete="off" />
                </div>

                <div class="mt-4">
                    <BreezeLabel for="birth" value="Date et Lieu de naissance" />
                    <BreezeInput id="birth" type="text" class="mt-1 block w-full" v-model="form.birth" required autocomplete="off" />
                </div>

                <div class="mt-4">
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

                <div class="mt-4">
                    <BreezeLabel for="marital_status" value="Etat Civil" />
                    <div class="flex space-x-3 my-3" id="marital_status">
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
                    </div>
                </div>

                <div class="mt-4">
                    <BreezeLabel for="profession" value="Profession" />
                    <BreezeInput id="profession" type="text" class="mt-1 block w-full" v-model="form.profession" required autocomplete="off" />
                </div>

                <div class="mt-4">
                    <BreezeLabel for="passport_number" value="Numéro de passport ou autre document de voyage" />
                    <BreezeInput id="passport_number" type="text" class="mt-1 block w-full" v-model="form.passport_number" required autocomplete="off" />
                </div>

                <div class="mt-4">
                    <BreezeLabel for="passport_issue" value="Date et Lieu de délivrance" />
                    <BreezeInput id="passport_issue" type="text" class="mt-1 block w-full" v-model="form.passport_issue" required autocomplete="off" />
                </div>

                <div class="mt-4">
                    <BreezeLabel for="passport_validity" value="valable jusqu'à" />
                    <BreezeInput id="passport_validity" type="date" class="mt-1 block w-full" v-model="form.passport_validity" required autocomplete="off" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <Link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900">
                    Déjà enregistré(e)?
                    </Link>

                    <BreezeButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        S'enregistrer
                    </BreezeButton>
                </div>
            </form>
        </div>
    </BreezeAuthenticatedLayout>
</template>