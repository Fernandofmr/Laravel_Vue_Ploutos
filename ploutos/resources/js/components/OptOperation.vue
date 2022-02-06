<template>
    <div class="container">
        <div class="box-listado">
        <button @click="listFunction()" class="w-full text-start text-l bg-white hover:bg-gray-100 text-gray-500 font-bold py-2 px-4 border-b-4 border-gray-300 hover:border-gray-300 rounded">
                VER {{ tipo }}
        </button>
            <ver-listado
            v-if="list"
            :lista="lista"
            :option="option">
            </ver-listado> 
        </div>
        <div class="box-ingresos">
        <button @click="formFunction()" class="w-full text-start text-l bg-white hover:bg-gray-100 text-gray-500 font-bold py-2 px-4 border-b-4 border-gray-300 hover:border-gray-300 rounded">
                INCLUIR {{ tipo }}
        </button> 
            <form-operar 
            v-if="form" 
            :user="user"
            :action="action" 
            :option="option" 
            :lista_grupos="lista_grupos" 
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
    props: ['csrf', 'lista', 'lista_grupos', 'user', 'tipo', 'option', 'form', 'list'],
    data() {
        return {
            action: '/' + this.option + '/add', 
        }
    },
    methods: {
        formFunction() {
            if (this.form) {
                this.form = false;
            }else {
                this.form = true;
            }            
        },
        listFunction() {
            if (this.list) {
                this.list = false;
            }else {
                this.list = true;
            }            
        }
    },
    mounted() {

    },
}
</script>