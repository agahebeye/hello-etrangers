<script setup>
import BreezeButton from '@/Components/Button.vue';
import BreezeGuestLayout from '@/Layouts/Guest.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';

defineProps({
    status: String,
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <BreezeGuestLayout>

        <Head title="Mot de passe oublié" />


        <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
            {{ status }}
        </div>

        <BreezeValidationErrors class="mb-4" />

        <form @submit.prevent="submit">
            <h1 class="mb-10 text-3xl font-bold text-center text-gray-600">Mot de passe oublié</h1>

            <div class="mb-4 text-sm text-gray-600">
                Mot de passe oublié? Pas de souci. Informez-nous de votre adresse email and on va vous envoyer le lien pour la réinitialisation de votre mot de passe.
            </div>

            <div>
                <BreezeLabel for="email" value="Email" />
                <BreezeInput id="email" type="email" class="block w-full mt-1" v-model="form.email" required autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <BreezeButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Lien de réinitialisation
                </BreezeButton>
            </div>
        </form>
    </BreezeGuestLayout>
</template>
