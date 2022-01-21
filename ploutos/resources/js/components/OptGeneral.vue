<template>
    <div class="container">
        <h1>Soy el componente OptGeneral</h1>   
        <IEcharts :option="bar" :loading="loading" style="width: 600px; height: 400px;"></IEcharts>     
    </div>
</template>

<script>
import IEcharts from 'vue-echarts-v3'
import 'echarts/lib/chart/bar'
export default {
    props: [], 
    data() {
        return {
            loading: false,
            bar: {
                title: {
                    text: 'Prueba ECharts'
                },
                tooltip: {},
                xAxis: {
                    data: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN']
                },
                yAxis: {},
                series: [{
                    name: 'Clouds',
                    type: 'bar',
                    data: [5, 20, 36, 10, 10, 20]
                }]
            }
        }
    },
    components: {
        IEcharts
    }
}
</script>