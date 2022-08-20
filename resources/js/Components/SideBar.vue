<script setup>
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
</script>

<template>
    <div
        id="view"
        class="relative flex flex-row h-full">

        <div
            id="sidebar"
            class="h-screen px-3 overflow-x-hidden bg-white shadow-xl lg:relative lg:block w-30 md:w-60 lg:w-60">
            <div class="mt-10 space-y-6 md:space-y-10">
                <div id="menu" class="flex flex-col space-y-2">

                    <div class="block py-2 pl-3 pr-4 text-base font-medium text-gray-700 transition duration-150 ease-in-out border-l-4 border-gray-400 bg-gray-50 focus:outline-none focus:text-gray-800 focus:bg-gray-100 focus:border-gray-700">
                        <span class="">Résumé</span>
                    </div>

                    <ResponsiveNavLink :href="route('documents.index')">
                        <span class="">Documents</span>
                    </ResponsiveNavLink>

                    <ResponsiveNavLink
                        href="#">
                        <span class="">Etudiants</span>
                    </ResponsiveNavLink>

                    <ResponsiveNavLink
                        href="#">
                        <span class="">Commerçants</span>
                    </ResponsiveNavLink>

                    <ResponsiveNavLink
                        href="#">
                        <span class="">Tous les étrangers</span>
                    </ResponsiveNavLink>

                </div>
            </div>
        </div>

    </div>
</template>