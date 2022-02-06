@extends('layouts.app_content')

@section('content')

<div class="flex bg-gray-200">
    <menu-dashboard-principal
    v-on:value-change="changeNav">        
    </menu-dashboard-principal>

    <contenido-general-dashboard
    :user='@json($user)' 
    :nav='@json($nav)' 
    :month_order_array='@json($month_order_array)'
    :lista_ingresos='@json($lista_ingresos)' 
    :lista_gastos='@json($lista_gastos)' 
    :lista_grupos='@json($lista_grupos)' 
    :ingresos_meses='@json($ingresos_meses)' 
    :gastos_meses='@json($gastos_meses)' 
    :ingresos_total_ultimo_agno='@json($ingresos_total_ultimo_agno)' 
    :gastos_total_ultimo_agno='@json($gastos_total_ultimo_agno)'
    csrf="{{ csrf_token() }}" >        
    </contenido-general-dashboard>
    <!-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div> -->
</div>

@endsection
