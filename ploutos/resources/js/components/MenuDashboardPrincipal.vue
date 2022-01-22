<template>
    <div class="menu-dashboard w-52">
        <ul class="nav flex-column" v-for="(item, i) in items_menu" :key="item">
            <li class="nav-item">
                <a href="#" @click="change(i)" class="nav-link active text-white text-l font-bold tex-m p-3 border-y tab-dashboard">
                    {{ item.text }}
                </a>
            </li>
        </ul>
        
    </div>
</template>

<script>
export default {
    props: [], 
    data() {
        return {
            items_menu: [
                {
                    text: 'General', 
                }, 
                {
                    text: 'Ingresos', 
                }, 
                {
                    text: 'Gastos', 
                }, 
                {
                    text: 'Operaciones', 
                }, 
                {
                    text: 'opción5', 
                }, 
                {
                    text: 'opción6', 
                }, 
            ]
        }
    },
    methods: {
        change(i) {
            this.$root.$emit('change-nav', i);
        }
    },
}
</script>