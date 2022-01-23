<template>
    <div class="container"> 
        <div class="box-listado">
        <button @click="listarFunction()" class="w-full text-start text-l bg-white hover:bg-gray-100 text-gray-500 font-bold py-2 px-4 border-b-4 border-gray-300 hover:border-gray-300 rounded">
                VER INGRESOS
        </button> 
            <ver-listado
            v-if="listar"
            :lista="lista_ingresos"
            :option="option">
            </ver-listado> 
        </div>
        <div class="box-ingresos">
        <button @click="ingresarFunction()" class="w-full text-start text-l bg-white hover:bg-gray-100 text-gray-500 font-bold py-2 px-4 border-b-4 border-gray-300 hover:border-gray-300 rounded">
                INCLUIR INGRESO
        </button> 
            <form-operar
            v-if="form"
            :action="action"
            :csrf="csrf">                    
            </form-operar>
        </div>
        <div class="box-filtrar">
        <button @click="filtrarFunction()" class="w-full text-start text-l bg-white hover:bg-gray-100 text-gray-500 font-bold py-2 px-4 border-b-4 border-gray-300 hover:border-gray-300 rounded">
                FILTRAR
        </button> 
        </div>
    </div>
</template>

<script>
export default {
    props: ['csrf', 'lista_ingresos'],
    data() {
        return {
            action: '/ingresar/add', 
            form: false,
            listar: false,
            option: 'ingresar', 
        }
    },
    methods: {
        ingresarFunction() {
            if (this.form) {
                this.form = false;
            }else {
                this.form = true;
            }            
        },
        listarFunction() {
            if (this.listar) {
                this.listar = false;
            }else {
                this.listar = true;
            }            
        }
    },
}
</script>