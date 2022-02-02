<template>
    <div class="flex justify-center bg-white p-3 rounded">
        <Echarts :option="horizontal_bars" :loading="loading" style="width: 30rem; height: 20rem;"></Echarts>
    </div>
</template>

<script>
import Echarts from 'vue-echarts-v3'
import 'echarts/lib/chart/bar'

export default {
    props: ['meses', 'ingresos_last_year', 'gastos_last_year'], 
    data() {
        return {
            loading: false,
            horizontal_bars: {
                title: {
                    text: 'Último año'
                },
                tooltip: {
                    trigger: 'axis',
                    axisPointer: {
                    type: 'shadow'
                    }
                },
                legend: {},
                grid: {
                    left: '3%',
                    right: '4%',
                    bottom: '5%',
                    containLabel: true
                },
                xAxis: {
                    type: 'value',
                    boundaryGap: [0, 0.01]
                },
                yAxis: {
                    type: 'category',
                    data: ['Último año']
                },
                series: [
                    {
                    name: 'Ingresos',
                    type: 'bar',
                    data: this.ingresos_last_year
                    },
                    {
                    name: 'Gastos',
                    type: 'bar',
                    data: this.gastos_last_year
                    }
                ]
            }, 
            
        }
    },
    components: {
        Echarts
    }
}
</script>