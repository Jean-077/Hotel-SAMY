@extends('adminlte::page')

@section('title', 'Ver Historial')

@section('content_header')
    
@stop

@section('content')
<div class="container">
    <h2>Historial de reservas</h2>

</div>
<div class="container">
    <div class="row">
        <h5>Nombre completo: </h5> <p>{{$cliente->nombre}} {{$cliente->apellido}}</p>
    </div>
    <div class="row">
        <h5>DNI: </h5> <p>{{$cliente->dni}}</p>
    </div>
   
</div>
    
<a href="{{route('reportes.reservaClientepdf',$cliente)}}" class="btn btn-primary m-3">Generar reporte</a>


    <div class="container">      

    
        <div class="row">
            <table id="clientes" class="table table-striped table-bordered shadow-lg mt-4" style="width=100%">
                <thead class="bg-primary text-white">
                    <tr>
                        
                        <th scope="col" class="text-center">Habitacion</th>
                        <th scope="col" class="text-center">Piso</th>
                        <th scope="col" class="text-center">Fecha Entrada</th>
                        <th scope="col" class="text-center">Precio</th>
                        <th scope="col" class="text-center">Estado</th>
                        <th scope="col" class="text-center">Ver Detalle</th>
                        
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($reservas as $reserva)
                    <tr>
                    @if($reserva->idCliente == $cliente->id)
                        @foreach($habitaciones as $habitacion)
                            @if($reserva->idHabitacion == $habitacion->id)
                            <td class="text-center">{{$habitacion->numero}}</td>
                            <td class="text-center">{{$habitacion->idPiso}}</td>
                            <td class="text-center">{{$reserva->fechaEntrada}}</td>
                            <td class="text-center">S/. {{$reserva->total}}</td>
                            <td class="text-center">{{$reserva->estado}}</td>
                            <td class="text-center"><a class="btn btn-primary text-center" href="{{route('clientes.verreserva',$habitacion)}}">Ver detalle</a> </td>
                            @endif
                        @endforeach
                            
                            
                    @endif
                    
                    </tr>
                    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    
@stop

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    $('#clientes').DataTable();
</script>

@stop