<script setup>
import BreezeButton from '@/Components/Button.vue';
import BreezeGuestLayout from '@/Layouts/Guest.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';

const props = defineProps({
    email: String,
    token: String,
});

const form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('password.update'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <BreezeGuestLayout>

        <Head title="Reset Password" />

        <BreezeValidationErrors class="mb-4" />

        <form @submit.prevent="submit">
            <h1 class="mb-10 text-3xl font-bold text-center text-gray-600">Réinialiser mot de passe</h1>

            <div>
                <BreezeLabel for="email" value="Email" />
                <BreezeInput id="email" type="email" class="block w-full mt-1" v-model="form.email" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <BreezeLabel for="password" value="Mot de passe" />
                <BreezeInput id="password" type="password" class="block w-full mt-1" v-model="form.password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <BreezeLabel for="password_confirmation" value="Confirmer mot de passe" />
                <BreezeInput id="password_confirmation" type="password" class="block w-full mt-1" v-model="form.password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <BreezeButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Réinialiser mot de passe
                </BreezeButton>
            </div>
        </form>
    </BreezeGuestLayout>
</template>
