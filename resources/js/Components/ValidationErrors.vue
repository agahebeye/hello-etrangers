<script setup>
import { computed } from 'vue';
import { usePage } from '@inertiajs/inertia-vue3';

const errors = computed(() => usePage().props.value.errors);

const hasErrors = computed(() => errors.value && Object.keys(errors.value).length > 0);
</script>

<template>
    <div v-if="hasErrors">
        <ul class="mt-3 text-sm text-red-600 list-disc list-inside">
            <li v-for="(error, key) in errors" :key="key">{{ error }}</li>
        </ul>
    </div>
</template>
