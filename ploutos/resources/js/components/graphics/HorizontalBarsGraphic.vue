<template>
    <div class="flex justify-center bg-white p-3 rounded">
        <Echarts :option="horizontal_bars" :loading="loading" style="width: 30rem; height: 20rem;"></Echarts>
    </div>
</template>

<script>
import Echarts from 'vue-echarts-v3'
import 'echarts/lib/chart/bar'

export default {
    props: ['lista_ingresos', 'lista_gastos'], 
    data() {
        return {
            loading: false,
            horizontal_bars: {
                title: {
                    text: 'World Population'
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
                    bottom: '3%',
                    containLabel: true
                },
                xAxis: {
                    type: 'value',
                    boundaryGap: [0, 0.01]
                },
                yAxis: {
                    type: 'category',
                    data: ['Brazil', 'Indonesia', 'USA', 'India', 'China', 'World']
                },
                series: [
                    {
                    name: '2011',
                    type: 'bar',
                    data: [18203, 23489, 29034, 104970, 131744, 630230]
                    },
                    {
                    name: '2012',
                    type: 'bar',
                    data: [19325, 23438, 31000, 121594, 134141, 681807]
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