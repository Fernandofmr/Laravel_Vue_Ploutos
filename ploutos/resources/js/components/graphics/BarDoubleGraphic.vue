<template>
    <div class="flex justify-center bg-white p-3 rounded">
        <Echarts :option="bar_doble" :loading="loading" style="width: 30rem; height: 20rem;"></Echarts>        
    </div>
</template>

<script>
import Echarts from 'vue-echarts-v3'
import 'echarts/lib/chart/bar'

export default {
    props: ['meses', 'suma_ingresos_meses', 'suma_gastos_meses'], 
    data() {
        return {            
            loading: false,
            bar_doble: {
                tooltip: {
                    trigger: 'axis',
                    axisPointer: {
                    type: 'cross',
                    crossStyle: {
                        color: '#999'
                    }
                    }
                },
                toolbox: {
                    feature: {
                    dataView: { show: true, readOnly: false },
                    magicType: { show: true, type: ['line', 'bar'] },
                    restore: { show: true },
                    saveAsImage: { show: true }
                    }
                },
                legend: {
                    data: ['Ingresos', 'Gastos']
                },
                xAxis: [
                    {
                    type: 'category',
                    data: this.meses,
                    axisLabel: {
                        interval: 0, 
                        rotate: 30
                    }
                    }
                ],
                yAxis: [
                    {
                    type: 'value',
                    name: 'Gastos',
                    min: 0,
                    /*interval: 300,*/
                    axisLabel: {
                        formatter: '{value} €'
                    }
                    },
                ],
                series: [
                    {
                    name: 'Ingresos',
                    type: 'bar',
                    data: this.suma_ingresos_meses
                    },
                    {
                    name: 'Gastos',
                    type: 'bar',
                    data: this.suma_gastos_meses
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