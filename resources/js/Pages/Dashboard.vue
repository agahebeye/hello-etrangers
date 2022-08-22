<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue';
import NavLink from '@/Components/NavLink.vue';
import { Head } from '@inertiajs/inertia-vue3';

import {ref} from 'vue'

import BarChar from '@/Components/Charts/BarChar.vue';
import ChartDoughnut from '@/Components/Charts/ChartDoughnut.vue';
import LineChart from '@/Components/Charts/LineChart.vue';


defineProps({
    latestDocuments: Array,
    latestStudents: Array,
    latestTraders: Array,
})

const documentHeadings = ref([{
    'key': 'userId',
    'value': 'ID'
}, {
    'key': 'owner',
    'value': 'Propietaire'
}, {
    'key': 'adress',
    'value': 'Adresse'
},
{
    'key': 'visaStatus',
    'value': 'Status de visa'
}, {
    'key': 'visa_kind',
    'value': 'Nature de visa'
}
]);

const foreignerHeadings = ref([{
    'key': 'userId',
    'value': 'ID'
}, {
    'key': 'firstName',
    'value': 'Nom'
}, {
    'key': 'lastName',
    'value': 'Prénom'
}, {
    'key': 'emailAddress',
    'value': 'Email'
}, {
    'key': 'gender',
    'value': 'Sexe'
}, {
    'key': 'citizenship',
    'value': 'Nationalité'
}
])
</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h1 class="text-xl font-semibold leading-tight text-gray-800">
                Dashboard
            </h1>
        </template>

        <div class="space-y-16 prose max-w-none">
            <div class="grid pt-8 gap-7 sm:grid-cols-2 lg:grid-cols-4">
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

            <div id="charts" class="relative z-10 flex flex-wrap justify-between gap-10">
                <BarChar />
                <ChartDoughnut />
                <LineChart />
            </div>

            <!--recent docs-->
            <div>
                <h2>Documents récement commandés</h2>
                <NavLink class="block mb-4 no-underline" :href="route('documents.index')">Voir plus de documents</NavLink>
                <div class="relative overflow-x-auto overflow-y-auto bg-white rounded-lg shadow">
                    <table class="relative w-full m-0 whitespace-no-wrap bg-white border-collapse table-auto table-striped">
                        <thead>
                            <tr class="text-left">
                                <template v-for="heading in documentHeadings">
                                    <th class="sticky top-0 px-6 py-2 text-xs font-bold tracking-wider text-gray-600 uppercase bg-gray-100 border-b border-gray-200"
                                        v-text="heading.value" x-ref="heading.key" :class="{ [heading.key]: true }"></th>
                                </template>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="document in latestDocuments">
                                <tr>
                                    <td class="border-t border-gray-200 border-dashed userId">
                                        <span class="px-4 text-gray-700 ">{{ document.id }}</span>
                                    </td>
                                    <td class="border-t border-gray-200 border-dashed owner">
                                        <span class="px-4 text-gray-700 ">{{ document.user.fullname }}</span>
                                    </td>
                                    <td class="border-t border-gray-200 border-dashed adress">
                                        <span class="px-4 text-gray-700 ">{{ document.user.adress?.avenue ?? 'somewhere in Burundi' }}</span>
                                    </td>
                                    <td class="border-t border-gray-200 border-dashed visa_status">
                                        <span v-if="!document.validated_at && !document.rejected_at" class="px-4 py-1 ml-4 text-xs text-yellow-600 bg-yellow-200 rounded-full">Programmé</span>
                                        <span v-if="document.rejected_at" class="px-4 py-1 ml-4 text-xs text-red-600 bg-red-200 rounded-full">Annulé</span>
                                        <span v-if="document.validated_at" class="px-4 py-1 ml-4 text-xs text-green-600 bg-green-200 rounded-full">Validé</span>
                                    </td>
                                    <td class="border-t border-gray-200 border-dashed visa_kind">
                                        <span class="px-4 text-gray-700">{{ document.visa_kind }}</span>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>

            <div>
                <h2>Etudiants récents</h2>
                <NavLink class="block mb-4 no-underline" :href="route('foreigners.index', {role: 'Etudiant'})">Voir plus d'Etudiants</NavLink>
                <div class="relative overflow-x-auto overflow-y-auto bg-white rounded-lg shadow">
                    <table class="relative w-full m-0 whitespace-no-wrap bg-white border-collapse table-auto table-striped">
                        <thead>
                            <tr class="text-left">
                                <template v-for="heading in foreignerHeadings">
                                    <th class="sticky top-0 px-6 py-2 text-xs font-bold tracking-wider text-gray-600 uppercase bg-gray-100 border-b border-gray-200"
                                        v-text="heading.value" x-ref="heading.key" :class="{ [heading.key]: true }"></th>
                                </template>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="foreigner in latestStudents">
                                <tr>
                                    <td class="border-t border-gray-200 border-dashed userId">
                                        <span class="px-4 text-gray-700 ">{{ foreigner.id }}</span>
                                    </td>
                                    <td class="border-t border-gray-200 border-dashed first_name">
                                        <span class="px-4 text-gray-700 ">{{ foreigner.first_name }}</span>
                                    </td>
                                    <td class="border-t border-gray-200 border-dashed lastName">
                                        <span class="px-4 text-gray-700 ">{{ foreigner.last_name }}</span>
                                    </td>
                                    <td class="border-t border-gray-200 border-dashed emailAddress">
                                        <span class="px-4 text-gray-700">{{ foreigner.email }}</span>
                                    </td>
                                    <td class="border-t border-gray-200 border-dashed gender">
                                        <span class="px-4 text-gray-700">{{ foreigner.document.gender }}</span>
                                    </td>
                                    <td class="border-t border-gray-200 border-dashed phoneNumber">
                                        <span class="px-4 text-gray-700">{{ foreigner.document.citizenship }}</span>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>

               <div>
                <h2>Commerçants récement ajoutés</h2>
                <NavLink class="block mb-4 no-underline" :href="route('foreigners.index', {role: 'Commerçant'})">Voir plus de Commerçants</NavLink>
                <div class="relative overflow-x-auto overflow-y-auto bg-white rounded-lg shadow">
                    <table class="relative w-full m-0 whitespace-no-wrap bg-white border-collapse table-auto table-striped">
                        <thead>
                            <tr class="text-left">
                                <template v-for="heading in foreignerHeadings">
                                    <th class="sticky top-0 px-6 py-2 text-xs font-bold tracking-wider text-gray-600 uppercase bg-gray-100 border-b border-gray-200"
                                        v-text="heading.value" x-ref="heading.key" :class="{ [heading.key]: true }"></th>
                                </template>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="foreigner in latestTraders">
                                <tr>
                                    <td class="border-t border-gray-200 border-dashed userId">
                                        <span class="px-4 text-gray-700 ">{{ foreigner.id }}</span>
                                    </td>
                                    <td class="border-t border-gray-200 border-dashed first_name">
                                        <span class="px-4 text-gray-700 ">{{ foreigner.first_name }}</span>
                                    </td>
                                    <td class="border-t border-gray-200 border-dashed lastName">
                                        <span class="px-4 text-gray-700 ">{{ foreigner.last_name }}</span>
                                    </td>
                                    <td class="border-t border-gray-200 border-dashed emailAddress">
                                        <span class="px-4 text-gray-700">{{ foreigner.email }}</span>
                                    </td>
                                    <td class="border-t border-gray-200 border-dashed gender">
                                        <span class="px-4 text-gray-700">{{ foreigner.document.gender }}</span>
                                    </td>
                                    <td class="border-t border-gray-200 border-dashed phoneNumber">
                                        <span class="px-4 text-gray-700">{{ foreigner.document.citizenship }}</span>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
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