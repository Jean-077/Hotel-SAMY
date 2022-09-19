@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
    <h1>Dashboard</h1>
    
    
@stop

@section('content')
<div class="container">
<div class="row">
    <div class="col-3 m-3 ">
        <div class="card text-white bg-primary" >
            <div class="card-header text-center">Total de Habitaciones </div>
            <div class="card-body text-center">
              {{$totalHab}}
            </div> 
        </div>
    </div>
    <div class="col-3 m-3">
        <div class="card text-white bg-primary" >
            <div class="card-header text-center">Habitaciones Ocupadas</div>
            <div class="card-body text-center">
              {{$habEstado->get('Ocupado')}}
            </div>   
        </div>
    </div>
    <div class="col-3 m-3">
        <div class="card text-white bg-primary" >
            <div class="card-header text-center">Habitaciones en Limpieza</div>
            <div class="card-body text-center">
                
                    @if($habEstado->get('Limpieza')==0)
                        0    
                    @else
                        {{$habEstado->get('Limpieza')}}  
                    @endif

            </div>     
        </div>
    </div>
    <div class="col-3 m-3">
        <div class="card text-white bg-gray" >
            <div class="card-header text-center" >Clientes Registrados</div>
            <div class="card-body text-center">
                {{$numclientes}}
            </div>     
        </div>
    </div>
    <div class="col-3 m-3">
        <div class="card text-white bg-success" >
            <div class="card-header text-center" >Ganancia bruta al día</div>
            <div class="card-body text-center">
                S/. {{$gananciaDia}}
            </div>     
        </div>
    </div>
    <div class="col-3 m-3">
        <div class="card text-white bg-success" >
            <div class="card-header text-center" >Ganancia mensual estimada</div>
            <div class="card-body text-center">
                S/. {{$gananciaMes}}
            </div>     
        </div>
    </div>
    
</div>
</div>

{{-- <x-app-layout>
    <x-slot name="header">
       <h3>DAtos mi king</h3>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
            </div>
        </div>
    </div>
</x-app-layout> --}}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

