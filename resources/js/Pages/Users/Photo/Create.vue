<script setup>
import BreezeButton from '@/Components/Button.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import BreezeGuestLayout from '@/Layouts/Guest.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';

const props = defineProps({
    user: {
        type: Object,
        required: true
    }
})

const form = useForm({
    photo: null,
    url: null,
});

function submit() {
    form
        .post(`/${props.user.id}/photos/store`)
}

function onFileChanged(event) {
    const file = event.target.files[0];
    form.photo = file;
    form.url = URL.createObjectURL(file);
}
</script>

<template>
    <BreezeGuestLayout>

        <Head>
            <title>Ajouter photo</title>
        </Head>

        <BreezeValidationErrors class="mb-4" />

        <form @submit.prevent="submit" class="flex flex-col items-center">
            <div>
                <img class="rounded-full w-28 max-w-full h-28" v-if="form.url" :src="form.url" />
            </div>
            <div class="my-6 ">
                <BreezeLabel for="name" value="Ajouter photo" />
                <input type="file" @input="onFileChanged($event)" required class="inline">
                <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                    {{ form.progress.percentage }}%
                </progress>
            </div>

            <BreezeButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Ajouter
            </BreezeButton>
        </form>
    </BreezeGuestLayout>
</template>