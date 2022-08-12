<script setup>
import BreezeButton from '@/Components/Button.vue';
import BreezeGuestLayout from '@/Layouts/Guest.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

const form = useForm({
    firstname: '',
    lastname: '',
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
    <BreezeGuestLayout>

        <Head title="Register" />

        <BreezeValidationErrors class="mb-4" />

        <form @submit.prevent="submit">
            <div>
                <BreezeLabel for="lastname" value="Nom" />
                <BreezeInput id="lastname" type="text" class="block w-full mt-1" v-model="form.lastname" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <BreezeLabel for="firstname" value="Prénom" />
                <BreezeInput id="firstname" type="text" class="block w-full mt-1" v-model="form.firstname" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <BreezeLabel for="email" value="Email" />
                <BreezeInput id="email" type="email" class="block w-full mt-1" v-model="form.email" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <BreezeLabel for="password" value="Mot de passe" />
                <BreezeInput id="password" type="password" class="block w-full mt-1" v-model="form.password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <BreezeLabel for="password_confirmation" value="Confirmer mot de passe" />
                <BreezeInput id="password_confirmation" type="password" class="block w-full mt-1" v-model="form.password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <BreezeLabel for="role" value="Role" />
                <div class="flex my-3 space-x-3">
                    <div class="flex space-x-2">
                        <input type="radio" for="role" id="commercant" value="Commercant" v-model="form.role" />
                        <BreezeLabel value="Commerçant" id="role" />
                    </div>
                    <div class="flex space-x-2">
                        <input type="radio" for="role" id="etudiant" value="Etudiant" v-model="form.role" />
                        <BreezeLabel id="role" value="Etudiant"></BreezeLabel>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link :href="route('login')" class="text-sm text-gray-600 underline hover:text-gray-900">
                Déjà enregistré(e)?
                </Link>

                <BreezeButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    S'enregistrer
                </BreezeButton>
            </div>
        </form>
    </BreezeGuestLayout>
</template>
