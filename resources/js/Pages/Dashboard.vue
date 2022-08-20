<script setup>
import AdminLayout from '@/Layouts/Admin.vue';

import { ref } from 'vue';
import BarChar from '@/Components/Charts/BarChar.vue';
import ChartDoughnut from '@/Components/Charts/ChartDoughnut.vue';
import LineChart from '@/Components/Charts/LineChart.vue';

const isShown = ref(false);
</script>

<template>

    <Head title="Dashboard" />

    <AdminLayout>
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

    </AdminLayout>
</template>