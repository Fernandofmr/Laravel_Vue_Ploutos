<template>
    <div class="container">

        <div class="caja-ingresos">
            <button @click="ingresarFunction()" class="text-2xl bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">INGRESAR</button> 
            <div id="form-ingresos" v-if="ingresar">
                <opt-ingresos></opt-ingresos>
            </div>   
        </div>      
        <div class="caja-gastos mt-12">
            <button @click="gastosFunction()" class="text-2xl bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">GASTOS</button>    
            <div id="form-gastos" v-if="gastos">
                <opt-gastos></opt-gastos>
            </div>
        </div> 
    </div>
</template>

<script>
export default {
    props: [], 
    data() {
        return {
            ingresar: false, 
            gastos: false
        }
    },
    methods: {
        ingresarFunction() {
            this.gastos = false;
            this.ingresar = true;
        }, 
        gastosFunction() {
            this.ingresar = false; 
            this.gastos = true;
        }
    },
}
</script>