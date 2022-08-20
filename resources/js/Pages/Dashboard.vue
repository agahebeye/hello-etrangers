<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Head } from '@inertiajs/inertia-vue3';

import { ref } from 'vue';
import BarChar from '@/Components/Charts/BarChar.vue';
import ChartDoughnut from '@/Components/Charts/ChartDoughnut.vue';
import LineChart from '@/Components/Charts/LineChart.vue';

const isShown = ref(false);
</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <!-- <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Dashboard
            </h2>
        </template> -->

        <div class="flex pt-8 lg:space-x-3">
            <!--sidebar-->
            <div
                id="view"
                class="relative flex flex-row h-full"
                >
                
                <div
                    id="sidebar"
                    class="hidden h-screen px-3 overflow-x-hidden bg-white shadow-xl lg:relative lg:block w-30 md:w-60 lg:w-60"
                    >
                    <div class="mt-10 space-y-6 md:space-y-10">
                        <div id="menu" class="flex flex-col space-y-2">

                            <div class="block py-2 pl-3 pr-4 text-base font-medium text-gray-700 transition duration-150 ease-in-out border-l-4 border-gray-400 bg-gray-50 focus:outline-none focus:text-gray-800 focus:bg-gray-100 focus:border-gray-700">
                                <span class="">Résumé</span>
                            </div>
                            
                            <ResponsiveNavLink>
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

            <div class="w-full">
                <div class="px-5 space-y-16">
                    <div class="grid gap-7 sm:grid-cols-2 lg:grid-cols-4">
                        <!--metrics card-->
                        <div class="p-5 bg-white rounded shadow-sm">
                            <div class="text-base text-gray-400 ">Total Sales</div>
                            <div class="flex items-center pt-1">
                                <div class="text-2xl font-bold text-gray-900 ">$9850.90</div>
                                <span class="flex items-center px-2 py-0.5 mx-2 text-sm text-green-600 bg-green-100 rounded-full">
                                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18 15L12 9L6 15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    <span>1.8%</span>
                                </span>
                            </div>
                        </div>

                        <!--metrics card-->
                        <div class="p-5 bg-white rounded shadow-sm">
                            <div class="text-base text-gray-400 ">Net Revenue</div>
                            <div class="flex items-center pt-1">
                                <div class="text-2xl font-bold text-gray-900 ">$7520.50</div>
                                <span class="flex items-center px-2 py-0.5 mx-2 text-sm text-red-600 bg-red-100 rounded-full">
                                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6 9L12 15L18 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    <span>2.5%</span>
                                </span>
                            </div>
                        </div>

                        <!--metrics card-->
                        <div class="p-5 bg-white rounded shadow-sm">
                            <div class="text-base text-gray-400 ">Customers</div>
                            <div class="flex items-center pt-1">
                                <div class="text-2xl font-bold text-gray-900 ">1375</div>
                                <span class="flex items-center px-2 py-0.5 mx-2 text-sm text-green-600 bg-green-100 rounded-full">
                                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18 15L12 9L6 15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    <span>5.2%</span>
                                </span>
                            </div>
                        </div>

                        <!--metrics card-->
                        <div class="p-5 bg-white rounded shadow-sm">
                            <div class="text-base text-gray-400 ">MRR</div>
                            <div class="flex items-center pt-1">
                                <div class="text-2xl font-bold text-gray-900 ">$250.00</div>
                                <span class="flex items-center px-2 py-0.5 mx-2 text-sm text-green-600 bg-green-100 rounded-full">
                                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18 15L12 9L6 15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    <span>2.2%</span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div id="charts" class="relative z-10 flex flex-wrap gap-10">

                        <BarChar />
                        <ChartDoughnut />
                        <LineChart />
                    </div>
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
