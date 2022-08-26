<script setup>
import Button from '@/Components/Button.vue';
import GuestLayout from '@/Layouts/Guest.vue';
import Input from '@/Components/Input.vue';
import Label from '@/Components/Label.vue';
import ValidationErrors from '@/Components/ValidationErrors.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

const form = useForm({
    first_name: '',
    last_name: '',
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
    <GuestLayout>

        <Head title="Register" />

        <ValidationErrors class="mb-4" />

        <form @submit.prevent="submit">
            <h1 class="mb-10 text-3xl font-bold text-center text-gray-600">Inscription</h1>

            <div>
                <Label for="lastname" value="Nom" />
                <Input id="lastname" type="text" class="block w-full mt-1" v-model="form.last_name" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <Label for="firstname" value="Prénom" />
                <Input id="firstname" type="text" class="block w-full mt-1" v-model="form.first_name" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <Label for="email" value="Email" />
                <Input id="email" type="email" class="block w-full mt-1" v-model="form.email" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <Label for="password" value="Mot de passe" />
                <Input id="password" type="password" class="block w-full mt-1" v-model="form.password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <Label for="password_confirmation" value="Confirmer mot de passe" />
                <Input id="password_confirmation" type="password" class="block w-full mt-1" v-model="form.password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <Label for="role" value="Role" />
                <div class="flex my-3 space-x-3">
                    <div class="flex space-x-2">
                        <input type="radio" for="role" id="commercant" value="Commercant" v-model="form.role" />
                        <Label value="Commerçant" id="role" />
                    </div>
                    <div class="flex space-x-2">
                        <input type="radio" for="role" id="etudiant" value="Etudiant" v-model="form.role" />
                        <Label id="role" value="Etudiant"></Label>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link :href="route('login')" class="text-sm text-gray-600 underline hover:text-gray-900">
                Déjà enregistré(e)?
                </Link>

                <Button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    S'enregistrer
                </Button>
            </div>
        </form>
    </GuestLayout>
</template>
