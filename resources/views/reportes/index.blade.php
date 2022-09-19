@extends('adminlte::page')

@section('title', 'Categoiras')

@section('content_header')
    <h1>Reportes</h1>
@stop

@section('content')
<div class="container">
<table id="habitaciones" class="table table-striped table-bordered shadow-lg mt-4 " style="width=40%">
    <thead class="bg-primary text-white">
        <tr>

            <th class="col-6 text-center" scope="col">Reporte</th>
            <th class="col-6 text-center" scope="col">Acción</th>
           
        </tr>
    </thead>
    <tbody ">
        
        <tr>
            <td class="col-6 text-center">Reporte de Clientes</td>
            <td class="col-6 text-center"><a href="{{route('reportes.clientepdf')}}" class="btn btn-primary">{{__('PDF')}}</a></td>
        </tr>
        <tr>
            
            <td class="col-6 text-center">Reporte de Habitaciones Disponibles</td>
            
            <td class="col-6 text-center"><a href="{{route('reportes.habitacionpdf', $estado="Disponible")}}" class="btn btn-primary">{{__('PDF')}}</a></td>
        </tr>
        <tr>
            
            <td class="col-6 text-center">Reporte de Habitaciones Ocupadas</td>
            
            <td class="col-6 text-center"><a href="{{route('reportes.habitacionpdf', $estado="Ocupado")}}" class="btn btn-primary">{{__('PDF')}}</a></td>
        </tr>

        <tr>
            
            <td class="col-6 text-center">Reporte de Reservas del día</td>
            
            <td class="col-6 text-center"><a href="{{route('reportes.reservapdf')}}" class="btn btn-primary">{{__('PDF')}}</a></td>
        </tr>
        <tr>
            
            <td class="col-6 text-center">Reporte de Reservas mensual</td>
            
            <td class="text-center"><a href="{{route('reportes.reservaMensualpdf')}}" class="btn btn-primary">{{__('PDF')}}</a></td>
        </tr>
        
    </tbody>
</table>

</div>    
  


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop





