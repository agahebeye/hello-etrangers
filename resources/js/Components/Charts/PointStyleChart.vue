<script setup>
import { LineChart } from 'vue-chart-3';
import { computed } from 'vue';
import * as Utils from '@/utils/ChartUtils';

const options = computed(() => ({
    responsive: true,
    plugins: {
        title: {
            display: true,
            text: (ctx) => 'Tous les étrangers par an',
        }
    },

    // scales: {
    //     y: {
    //         stacked: true
    //     }
    // }
}));

const data = computed(() => (
    {
        labels: ['2017', '2018', '2019', '2020', '2021', '2022'],
        datasets: [
            {
                label: 'etrangers',
                data: Utils.numbers({ count: 6, min: -100, max: 100 }),
                borderColor: Utils.CHART_COLORS.red,
                backgroundColor: Utils.transparentize(Utils.CHART_COLORS.red, 0.5),
                pointStyle: 'circle',
                pointRadius: 10,
                pointHoverRadius: 15
            }
        ]
    }))
</script>

<template>
    <LineChart :chart-data="data" :options="options" css-classes="chart-container" />
</template>