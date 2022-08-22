<script setup>
import { computed } from 'vue';
import { DoughnutChart } from 'vue-chart-3';

const options = computed(() => ({
    plugins: {
      title: {
        display: true,
        text: 'Nationalités'
      }
    },
   
}));

const data = computed(() => ({
    labels: ['Congolaise', 'Tanzanienne', 'Kenyanne', 'Ugandaise', 'Rwandaise', 'Sudanaise'],
    datasets: [
        {
            data: [301, 400, 160, 700, 512],
            backgroundColor: ['#77CEFF', '#0079AF', '#123E6B', '#97B0C4', '#A5C8ED'],
        },
    ],
}));
</script>

<template>
    <DoughnutChart :chartData="data" :options="options" css-classes="chart-container" />
</template>