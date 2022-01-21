<template>
    <div class="container">
        <div class="" v-if="nav==0">General
            <opt-general></opt-general>
        </div>
        <div class="" v-if="nav==1">Ingresos</div>
        <div class="" v-if="nav==2">Gastos</div>
        <div class="" v-if="nav==3">Operaciones</div>
        <div class="" v-if="nav==4">Opción 5</div>
        <div class="" v-if="nav==5">Opción 6</div>
        
    </div>
</template>

<script>
import components from './OptGeneral';
export default {
    props: ['nav'], 
    data() {
        return {
            
        }
    },
    mounted() {
        var that = this; 
        this.$root.$on('change-nav', function(n) {
            that.nav = n;
        })
    },
}
</script>