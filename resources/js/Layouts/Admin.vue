<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue';
import SideBar from '@/Components/SideBar.vue';
</script>

<template>
    <AuthenticatedLayout>
        <div class="flex pt-8 lg:space-x-3">
            <!--sidebar-->
            <SideBar />

            <div class="w-full">
                <div class="px-5 space-y-16">
                    <slot></slot>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style>
.chart-container {
    @apply w-72 h-72;
}
</style>