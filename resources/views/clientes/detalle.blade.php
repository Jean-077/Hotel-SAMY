@extends('adminlte::page')

@section('title', 'Detalle Reserva')

@section('content_header')
    
@stop

@section('content')

<h1></h1>

<div class="container border shadow">
    <div class="">
        <h4 class="font-weight-bold mt-2">Resumen de habitación</h4>
    </div>
    <br>
    
    <div class="row">
        @foreach($habitaciones as $hab)
        @if($hab->id==$idhabitacion)
        <div class="col">
            <label for=""class="form-label">Habitación:</label>
            <p class="form-label">{{$hab->numero}}</p>
        </div>
        <div class="col">
            
        </div>
        <div class="col">
            <label for=""class="form-label">Categoria:</label>
            @foreach ($categorias as $categoria)
                @if($hab->idCategoria == $categoria->id)
                    
                <p>{{$categoria->nomcategoria}}</p>    
                
                @endif 
            @endforeach 
        </div>
        <div class="col">
              
        </div>
        <div class="col">
            <label for=""class="form-label">Precio:</label>
            <p class="form-label">S/. {{$hab->precio}}</p>
        </div>
        <div class="col">
            
        </div>
        <div class="col">
            <label for=""class="form-label">Piso</label>
            <p class="form-label">{{$hab->idPiso}}</p>
        </div>
        <div class="col">
            
        </div>
        @endif
        @endforeach
    </div>
    
    <div class="row form-group">
        
        @foreach($clientes as $cli)
        @if($cli->id == $idcliente)
        
        <div class="col">
            <label for=""class="form-label">Cliente:</label>
            <p class="form-label">{{$cli->nombre}} {{$cli->apellido}}</p>
        </div>
        <div class="col">
           
        </div>
        <div class="col">
            <label for=""class="form-label">DNI:</label>
            <p class="form-label">{{$cli->dni}}</p>
        </div>
        <div class="col">
            
        </div>

        <div class="col mb-3">
            <label for=""class="form-label">Correo:</label>
            <p class="form-label">{{$cli->correo}}</p>
        </div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>

        @endif
        @endforeach

    </div>
    
</div>
<br>
<div class="container border shadow">
    <div class="">
        <h4 class="font-weight-bold mt-3" >Resumen de hospedaje</h4>
    </div>
    <br>
    <div class="row form-group ">
        <div class="col ">
            <label for=""class="form-label">Fecha entrada:</label>
        </div>
        <div class="col">
            <p class="form-label">{{$reserva->fechaEntrada}}</p>
        </div>
        <div class="col ">
            <label for=""class="form-label">Fecha Salida:</label>
        </div>
        <div class="col">
            <p class="form-label">{{$reserva->fechaSalida}}</p>
        </div>
        <div class="col">
            <label for=""class="form-label">Descuento:</label>
        </div>
        <div class="col">
            <p class="form-label">{{$reserva->descuento}} %</p>
        </div>
        <div class="col">
            <label for=""class="form-label">Total:</label>
        </div>
        <div class="col">
            <p class="">S/. {{$reserva->total}}</p>
        </div>
    </div>
    
</div>
<br>
{{-- <div class="container">
    <a href="" class="btn btn-primary">Enviar correo</a>
    <a href="" class="btn btn-primary">Gaurdar PDF</a>
</div> --}}

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop
