<template>
    <div class="container">
        <div class="graphics grid gap-4 grid-cols-2 grig-rows-2 w-full">
            <bar-graphic
            :meses="meses" 
            :balances="balances">
            </bar-graphic>

            <bar-double-graphic
            :meses="meses" 
            :suma_ingresos_meses="suma_ingresos_meses"
            :suma_gastos_meses="suma_gastos_meses">
            </bar-double-graphic>
            
            <pie-lines-graphic
            :lista_ingresos="lista_ingresos" 
            :lista_gastos="lista_gastos">
            </pie-lines-graphic>

            <line-graphic
            :lista_ingresos="lista_ingresos" 
            :lista_gastos="lista_gastos">
            </line-graphic>

            <horizontal-bars-graphic
            :meses="meses" 
            :ingresos_last_year="ingresos_last_year" 
            :gastos_last_year="gastos_last_year">
            </horizontal-bars-graphic>

            <circle-pie-graphic
            :lista_ingresos="lista_ingresos" 
            :lista_gastos="lista_gastos">
            </circle-pie-graphic>     
        </div>     
         
    </div>
</template>

<script>
export default {
    props: ['lista_ingresos', 'lista_gastos', 'ingresos_meses', 'gastos_meses', 'month_order_array', 
            'ingresos_total_ultimo_agno', 'gastos_total_ultimo_agno'], 
    data() {
        return { 
            meses: this.month_order_array,
            ingresos: [], 
            conceptos_ingresos: [], 
            cantidades_ingresos: [], 
            fechas_ingresos: [],
            gastos: [], 
            conceptos_gastos: [], 
            cantidades_gastos: [], 
            fechas_gastos: [],
            balances: [],  
            suma_ingresos: 0,
            suma_ingresos_meses: [],  
            suma_gastos: 0,
            suma_gastos_meses: [], 
            ingresos_last_year: [], 
            gastos_last_year: [],
        }
    }, 
    mounted() {
        this.ingresos_last_year.push(this.ingresos_total_ultimo_agno);
        this.gastos_last_year.push(this.gastos_total_ultimo_agno);
        this.ingresos = this.lista_ingresos;
        for (let index = 0; index < this.ingresos.length; index++) {
            this.conceptos_ingresos.push(this.ingresos[index].concepto);
            this.cantidades_ingresos.push(this.ingresos[index].cantidad);
            this.fechas_ingresos.push(this.ingresos[index].updated_at);
        }
        
        for (let index = 0; index < this.ingresos.length; index++) {
            this.conceptos_gastos.push(this.ingresos[index].concepto);
            this.cantidades_gastos.push(this.ingresos[index].cantidad);
            this.fechas_gastos.push(this.ingresos[index].updated_at);
        }

        this.ingresos_meses.forEach(element => {
            this.suma_ingresos = 0;
            element.forEach(cantidad => {
                this.suma_ingresos += cantidad.cantidad;
            });
            this.suma_ingresos_meses.push(this.suma_ingresos);
        });

        this.gastos_meses.forEach(element => {
            this.suma_gastos = 0;
            element.forEach(cantidad => {
                this.suma_gastos += cantidad.cantidad;
            });
            this.suma_gastos_meses.push(this.suma_gastos);
        });

        for (let i = 0; i < 12; i++) {
            var resto = this.suma_ingresos_meses[i] - this.suma_gastos_meses[i];
            this.balances.push(resto);      
        }

    },
}
</script>