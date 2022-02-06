<template>
    <div class="form-ingresar flex-justify-center p-3 bg-white">
        <form class="w-full" method="post" :action="action">
            <input type="hidden" name="_token" v-bind:value="csrf">             
            <input type="hidden" name="userid" v-bind:value="user.id">
            <div class="d-flex">
                <div>
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                        <label v-if="this.option != 'grupos'" class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                            Asunto
                        </label>
                        <label v-else class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                            Nombre grupo
                        </label>
                        </div>
                        <div class="md:w-2/3">
                        <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" 
                                id="inline-full-name" type="text" name="asunto" required>
                        </div>
                    </div>
                    <div v-if="this.option != 'grupos'" class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password">
                            Cantidad
                        </label>
                        </div>
                        <div class="md:w-2/3">
                        <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" 
                                id="inline-password" type="number" min="0" name="cantidad" required>
                        </div>
                    </div>
                </div>
                <div>
                    <div v-if="this.option != 'grupos'" class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-grupo">
                            Grupo
                        </label>
                        </div>
                        <div class="md:w-2/3">
                        <select class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" 
                                id="inline-grupo" name="grupo" required>
                                <option v-if="lista_grupos.length === 0" value="Sin grupo">Sin grupo</option>
                                <option v-for="grupo in lista_grupos" :key="grupo" :value="grupo.name">{{ grupo.name }}</option>
                        </select>
                        <input class="mt-2 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-50 py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" 
                                type="text" name="grupo_nuevo" id="grupo-nuevo"><br>
                                <small>Añade aquí un grupo nuevo</small>
                        </div>
                    </div>
                    <div v-if="this.option != 'grupos'" class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password">
                            Fecha 
                        </label>
                        </div>
                        <div class="md:w-2/3">
                        <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" 
                                id="inline-date" type="date" name="date" >
                            <small>Campo opcional, por defecto se aplica la fecha de hoy</small>
                        </div>
                    </div>
                    <div class="md:flex md:items-center">
                        <div class="md:w-1/3"></div>
                        <div class="md:w-2/3">
                        <button class="shadow bg-gray-500 hover:bg-gray-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                            Guardar
                        </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>     
    </div>
</template>

<script>
export default {
    props: ['action', 'csrf', 'user', 'option', 'lista_grupos'], 
    data() {
        return {
            
        }
    },
}
</script>