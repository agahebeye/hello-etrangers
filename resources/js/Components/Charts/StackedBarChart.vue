<script setup>
import { LineChart } from 'vue-chart-3';
import { computed } from 'vue';
import * as Utils from '@/utils/ChartUtils';

const options = computed(() => ({
    plugins: {
        title: {
            display: true,
            text: 'Documents commandés par mois'
        }
    },
    scales: {
        y: {
            stacked: true
        }
    }
}));

const data = computed(() => (
    {

        labels: Utils.months({ count: 7 }),
        datasets: [
            {
                label: 'Commandes',
                data: ['100', '700', '1000', '3000', '6010', '7320', '10000'],
                borderColor: Utils.CHART_COLORS.red,
                backgroundColor: Utils.transparentize(Utils.CHART_COLORS.red, 0.5),
                stack: 'combined',
                type: 'bar'
            },
            {
                label: 'Mois',
                data: Utils.numbers({ count: 7, min: 0, max: 100 }),
                borderColor: Utils.CHART_COLORS.blue,
                backgroundColor: Utils.transparentize(Utils.CHART_COLORS.blue, 0.5),
                stack: 'combined'
            }
        ]
    }))
</script>

<template>
        <LineChart :chart-data="data" :options="options" css-classes="chart-container" />
</template>