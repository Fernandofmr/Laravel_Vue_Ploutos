<template>
    <div class="container">

        <div class="caja-ingresos bg-white">
            <button @click="ingresarFunction()" class="w-full text-xl bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                INGRESOS
            </button> 
            <div id="form-ingresos" v-if="ingresar">
                <opt-operation
                :user="user"
                :csrf="csrf"
                :lista="lista_ingresos" 
                :lista_grupos="lista_grupos" 
                :tipo="tipo_ingreso" 
                :option="option_ingreso" 
                :form="form" 
                :list="list">                    
                </opt-operation>
            </div>   
        </div>      
        <div class="caja-gastos mt-9 bg-white">
            <button @click="gastosFunction()" class="w-full text-xl bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                GASTOS
            </button>    
            <div id="form-gastos" v-if="gastos">
                <opt-operation 
                :user="user" 
                :csrf="csrf" 
                :lista="lista_gastos" 
                :lista_grupos="lista_grupos" 
                :tipo="tipo_gasto" 
                :option="option_gasto"
                :form="form" 
                :list="list">                    
                </opt-operation>
            </div>
        </div> 
        <div class="caja-gastos mt-9 bg-white">
            <button @click="gruposFunction()" class="w-full text-xl bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                GRUPOS
            </button>    
            <div id="form-gastos" v-if="grupos">
                <opt-operation 
                :user="user" 
                :csrf="csrf" 
                :lista="lista_grupos" 
                :tipo="tipo_grupo" 
                :option="option_grupo"
                :form="form" 
                :list="list">                    
                </opt-operation>
            </div>
        </div> 
    </div>
</template>

<script>
export default {
    props: ['csrf', 'lista_ingresos', 'lista_gastos', 'lista_grupos', 'user'], 
    data() {
        return {
            ingresar: false, 
            gastos: false,  
            grupos: false, 
            form: false, 
            list: false,
            tipo_gasto: 'GASTOS', 
            option_gasto: 'gastos', 
            tipo_ingreso: 'INGRESOS', 
            option_ingreso: 'ingresar', 
            tipo_grupo: 'GRUPOS', 
            option_grupo: 'grupos'
        }
    },
    methods: {
        ingresarFunction() {
            this.gastos = false;
            this.grupos = false;
            if (this.ingresar){
                this.ingresar = false;
            }else{
                this.ingresar = true;
            }
        }, 
        gastosFunction() {
            this.ingresar = false; 
            this.grupos = false;
            if (this.gastos){
                this.gastos = false;
            }else{
                this.gastos = true;
            }
        }, 
        gruposFunction() {
            this.ingresar = false; 
            this.gastos = false;
            if (this.grupos){
                this.grupos = false;
            }else{
                this.grupos = true;
            }
        }
    },
}
</script>