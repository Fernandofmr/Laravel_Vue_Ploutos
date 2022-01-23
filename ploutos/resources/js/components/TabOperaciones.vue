<template>
    <div class="container">

        <div class="caja-ingresos bg-white">
            <button @click="ingresarFunction()" class="w-full text-xl bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">INGRESAR</button> 
            <div id="form-ingresos" v-if="ingresar">
                <opt-ingresos
                :csrf="csrf">                    
                </opt-ingresos>
            </div>   
        </div>      
        <div class="caja-gastos mt-9 bg-white">
            <button @click="gastosFunction()" class="w-full text-xl bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">GASTOS</button>    
            <div id="form-gastos" v-if="gastos">
                <opt-gastos
                :csrf="csrf">                    
                </opt-gastos>
            </div>
        </div> 
    </div>
</template>

<script>
export default {
    props: ['csrf'], 
    data() {
        return {
            ingresar: false, 
            gastos: false
        }
    },
    methods: {
        ingresarFunction() {
            this.gastos = false;
            if (this.ingresar){
                this.ingresar = false;
            }else{
                this.ingresar = true;
            }
        }, 
        gastosFunction() {
            this.ingresar = false; 
            if (this.gastos){
                this.gastos = false;
            }else{
                this.gastos = true;
            }
        }
    },
}
</script>