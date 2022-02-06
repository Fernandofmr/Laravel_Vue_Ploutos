<template>
    <div class="container">
        <table class="table-fixed w-full">
            <thead v-if="this.option != 'grupos'" class="bg-gray-200">
                    <tr class="text-center">
                    <th class="p-3">GRUPO</th>
                    <th class="p-3">ASUNTO</th>
                    <th class="p-3">CANTIDAD</th>
                    <th class="p-3">FECHA</th>
                    <th class="p-3">ACCIÓN</th>
                </tr>
            </thead>
            <thead v-else class="bg-gray-200">
                    <tr class="text-center">
                    <th class="p-3">GRUPO</th>
                    <th class="p-3">ACCIÓN</th>
                </tr>
            </thead>
            <tbody v-if="this.option != 'grupos'"  class="bg-white">
                <tr class="text-center" v-for="item in lista" :key="item">                 
                    <td class="p-3" v-if="item.groups">{{ item.groups.name}}</td>   
                    <td class="p-3" v-else>Sin grupo</td>
                    <td class="p-3">{{ item.concepto }}</td>
                    <td class="p-3">{{ item.cantidad }}</td>
                    <td class="p-3">{{ item.updated_at }}</td>
                    <td class="p-3">
                        <button @click="updateItem(item.id, option)" class="bg-yellow-500 hover:bg-yellow-700 font-bold py-2 px-4 rounded">
                            Modificar
                        </button>
                        <button @click="deleteItem(item.id, option)" class="bg-red-500 hover:bg-red-700 font-bold py-2 px-4 rounded">
                            Borrar
                        </button>
                    </td>
                </tr>
            </tbody>            
            <tbody v-else class="bg-white">
                <tr class="text-center" v-for="item in lista" :key="item">
                    <td class="p-3">{{ item.name }}</td>
                    <td class="p-3">
                        <button @click="updateItem(item.id, option)" class="bg-yellow-500 hover:bg-yellow-700 font-bold py-2 px-4 rounded">
                            Modificar
                        </button>
                        <button @click="deleteItem(item.id, option)" class="bg-red-500 hover:bg-red-700 font-bold py-2 px-4 rounded">
                            Borrar
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    props: ['lista', 'option'], 
    data() {
        return {
            
        }
    },
    methods: {
        updateItem(id, option) {
            window.location.href = '/' + option + '/update/' + id;
        },
        deleteItem(id, option) {
            window.location.href = '/' + option + '/delete/' + id;
        }
    },
}
</script>