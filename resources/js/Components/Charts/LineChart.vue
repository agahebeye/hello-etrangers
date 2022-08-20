<script setup>
import { LineChart } from "vue-chart-3"
</script>

<template>
  <LineChart
    :chart-data="data"
    :options="options"
    css-classes="chart-container" />
</template>
