<template @load="cargarReloj()">
    <div class="container bg-gray-200">
        <nav class="">
            <ul class="flex mb-4">
                <li class="mr-6 w-1/3 h-12">
                    <a class="text-gray-500 hover:text-gray-800" href="#">Últimos movimientos</a>
                </li>
                <li class="mr-6 w-1/3 h-12">
                    <a @click="cargarReloj()" id="box-time" class="text-gray-500 hover:text-gray-800">Reloj</a>
                </li>
                <li class="mr-6 w-1/3 h-12">
                    <a class="text-gray-500 hover:text-gray-800" href="#">Consejos para ahorrar</a>
                </li>
                <li class="mr-6 w-1/3 h-12">
                    <a class="text-gray-500 hover:text-gray-800" href="#">Ajustes</a>
                </li>
            </ul>
        </nav>
        <div class="" v-if="nav==0">
            <tab-general></tab-general>
        </div>
        <div class="" v-if="nav==1">Ingresos</div>
        <div class="" v-if="nav==2">Gastos</div>
        <div class="" v-if="nav==3">
            <tab-operaciones
            :csrf="csrf" 
            :lista_ingresos="lista_ingresos" 
            :lista_gastos="lista_gastos">                
            </tab-operaciones>
        </div>
        <div class="" v-if="nav==4">Opción 5</div>
        <div class="" v-if="nav==5">Opción 6</div>
        
    </div>
</template>

<script>
// import components from './TabGeneral';
export default {
    props: ['nav', 'csrf', 'lista_ingresos', 'lista_gastos'], 
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
    methods: {
        startTime() {
            const today = new Date();
            let h = today.getHours();
            let m = today.getMinutes();
            let s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('box-time').innerHTML =  h + ":" + m + ":" + s;
            setTimeout(startTime, 1000);
        }, 
        checkTime(i) {
            if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
            return i;
        }, 
         
        cargarReloj(){
 
            // Haciendo uso del objeto Date() obtenemos la hora, minuto y segundo 
            var fechahora = new Date();
            var hora = fechahora.getHours(); 
            var minuto = fechahora.getMinutes(); 
            var segundo = fechahora.getSeconds(); 
            
            // Formateamos los ceros '0' del reloj 
            hora = (hora < 10) ? "0" + hora : hora;
            minuto = (minuto < 10) ? "0" + minuto : minuto;
            segundo = (segundo < 10) ? "0" + segundo : segundo;
            
            // Enviamos la hora a la vista HTML 
            var tiempo = hora + ":" + minuto + ":" + segundo + " ";    
            document.getElementById("box-time").innerText = tiempo;
            document.getElementById("box-time").textContent = tiempo;
        
            // Cargamos el reloj a los 500 milisegundos 
            setTimeout(cargarReloj, 500);
            
        }
    },
}
</script>