<template>
    <div class="flex justify-center bg-white p-3 rounded">
        <Echarts :option="bar" :loading="loading" style="width: 30rem; height: 20rem;"></Echarts>  
        {{ aux }}
    </div>
</template>

<script>
import Echarts from 'vue-echarts-v3'
import 'echarts/lib/chart/bar'

export default {
    props: ['balances', 'meses'], 
    data() {
        return {         
            loading: false,
            bar: {
                title: {
                    text: 'BALANCE' 
                },
                tooltip: {},
                xAxis: {
                    type: 'category',
                    data: this.meses, 
                    axisLabel: {
                        interval: 0, 
                        rotate: 30
                    }
                },
                yAxis: {
                    type: 'value'
                },
                series: [{
                    name: 'Clouds',
                    type: 'bar',
                    showBackground: true, 
                    backgroundStyle:{
                        color: 'rgba(180, 180, 180, 0.2)'
                    }, 
                    data: this.balances
                }]
            }
        }
    },
    components: {
        Echarts
    }
}
</script>