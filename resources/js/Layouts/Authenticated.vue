<script setup>
import { ref, computed } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link, usePage } from '@inertiajs/inertia-vue3';

const user = usePage().props.value.auth['user'];
const isAdmin = computed(() => user?.role.name === 'Administrateur');

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div>
        <div class="min-h-screen bg-gray-50">
            <nav class="bg-white border-b border-gray-100 print:hidden">
                <!-- Primary Navigation Menu -->
                <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="flex items-center shrink-0">
                                <Link :href="isAdmin ? route('dashboard') : route('home')">
                                <ApplicationLogo class="block w-auto h-9" />
                                </Link>
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 lg:flex">
                                <template v-if="$page.props.auth.user">
                                    <NavLink v-if="isAdmin" :href="route('documents.index')">
                                        Documents
                                    </NavLink>

                                    <NavLink v-if="isAdmin" :href="route('foreigners.index', { role: 'Etudiant' })">
                                        Etudiants
                                    </NavLink>

                                    <NavLink v-if="isAdmin" :href="route('foreigners.index', { role: 'Commerçant' })">
                                        Commerçants
                                    </NavLink>

                                    <NavLink v-if="isAdmin" :href="route('foreigners.index')">
                                        Tous les étrangers
                                    </NavLink>

                                    <NavLink v-if="!isAdmin" :href="route('documents.create')">
                                        Commander un document
                                    </NavLink>
                                </template>

                                <template v-else>
                                    <NavLink :href="route('login')">
                                        Connexion
                                    </NavLink>

                                    <NavLink :href="route('register')">
                                        S'enregistrer
                                    </NavLink>

                                </template>
                            </div>
                        </div>

                        <div class="hidden lg:flex lg:items-center lg:ml-6" v-if="$page.props.auth.user">
                            <!-- Settings Dropdown -->
                            <div class="relative ml-3">
                                <Dropdown align="right" width="48">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none">
                                                <img v-if="user.photo" :src="`/storage/${user.photo.src}`" class="w-10 h-10 max-w-full mr-2 rounded-full" />
                                                <img v-else src="/avatars/man_placeholder.png" class="w-10 h-10 max-w-full mr-2 rounded-full" />
                                                <span>{{ user.fullname }}</span>

                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template v-if="$page.props.auth.user" #content>
                                        <DropdownLink :href="route('logout')" method="post" as="button">
                                            Deconnexion
                                        </DropdownLink>
                                    </template>
                                </Dropdown>
                            </div>
                        </div>

                        <!-- Hamburger -->
                        <div class="flex items-center -mr-2 lg:hidden">
                            <button @click="showingNavigationDropdown = !showingNavigationDropdown" class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                                <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{ 'hidden': showingNavigationDropdown, 'inline-flex': !showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{ 'hidden': !showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div :class="{ 'block': showingNavigationDropdown, 'hidden': !showingNavigationDropdown }" class="lg:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <template v-if="$page.props.auth.user">
                            <ResponsiveNavLink v-if="isAdmin" :href="route('documents.index')" :active="route().current('documents.index')">
                                Documents
                            </ResponsiveNavLink>

                            <ResponsiveNavLink v-if="isAdmin" :href="route('foreigners.index', { role: 'Etudiant' })">
                                Etudiants
                            </ResponsiveNavLink>

                            <ResponsiveNavLink v-if="isAdmin" :href="route('foreigners.index', { role: 'Commerçant' })">
                                Commerçants
                            </ResponsiveNavLink>

                            <ResponsiveNavLink v-if="isAdmin" :href="route('foreigners.index')">
                                Tous les étrangers
                            </ResponsiveNavLink>

                            <ResponsiveNavLink v-if="!isAdmin" :href="route('documents.create')" :active="route().current('dashboard')">
                                Commander un document
                            </ResponsiveNavLink>
                        </template>

                        <template v-else>
                            <ResponsiveNavLink :href="route('login')">
                                Connexion
                            </ResponsiveNavLink>

                            <ResponsiveNavLink :href="route('register')">
                                S'enregistrer
                            </ResponsiveNavLink>

                        </template>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200" v-if="$page.props.auth.user">
                        <div class="px-4">
                            <div class="text-base font-medium text-gray-800">{{ $page.props.auth.user.fullname }}</div>
                            <div class="text-sm font-medium text-gray-500">{{ $page.props.auth.user.email }}</div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <ResponsiveNavLink :href="route('logout')" method="post" as="button">
                                Log Out
                            </ResponsiveNavLink>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            <header class="bg-white shadow" v-if="$slots.header">
                <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <slot />
            </main>
        </div>
    </div>
</template>
