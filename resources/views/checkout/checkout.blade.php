@extends('adminlte::page')

@section('title', 'Pisos')

@section('content_header')
    
@stop

@section('content')

<h1></h1>

<div class="container">
    <h3>Resumen de habitación</h3>
    
    <div class="row">
        @foreach($habitaciones as $hab)
        @if($hab->id==$idhabitacion)
        <div class="col">
            <label for=""class="form-label">Habitación</label>
        </div>
        <div class="col">
            <p class="form-label">{{$hab->numero}}</p>
        </div>
        <div class="col">
            <label for=""class="form-label">Categoria</label>
        </div>
        <div class="col">
            @foreach ($categorias as $categoria)
                @if($hab->idCategoria == $categoria->id)
                    
                <p name="nomcategoria">{{$categoria->nomcategoria}}</p>    
                
                @endif 
                @endforeach   
        </div>
        <div class="col">
            <label for=""class="form-label">Precio</label>
        </div>
        <div class="col">
            <p class="form-label">{{$hab->precio}}</p>
        </div>
        <div class="col">
            <label for=""class="form-label">Piso</label>
        </div>
        <div class="col">
            <p class="form-label">{{$hab->idPiso}}</p>
        </div>
        @endif
        @endforeach
    </div>
    <div class="row form-group">
        
        @foreach($clientes as $cli)
        @if($cli->id == $idcliente)
        
        <div class="col">
            <label for=""class="form-label">Cliente:</label>
        </div>
        <div class="col">
            <p class="form-label">{{$cli->nombre}} {{$cli->apellido}}</p>
        </div>
        <div class="col">
            <label for=""class="form-label">DNI:</label>
        </div>
        <div class="col">
            <p class="form-label">{{$cli->dni}}</p>
        </div>
        
        {{-- <div class="col ">
            <label for=""class="form-label">Apellido</label>
        </div>
        <div class="col">
            <p class="form-label">{{$cli->apellido}}</p>
        </div> --}}
        <div class="col mb-3">
            <label for=""class="form-label">Correo:</label>
        </div>
        <div class="col">
            <p class="form-label">{{$cli->correo}}</p>
        </div>
        <div class="col"></div>
        <div class="col"></div>
        
        
       
        @endif
        @endforeach

    </div>
    
</div>
<div class="container">
    <h3>Resumen de hospedaje</h3>
    <div class="row">
        <div class="col">
            <label for=""class="form-label">Fecha entrada:</label>
        </div>
        <div class="col">
            <p class="form-label">{{$reserva->fechaEntrada}}</p>
        </div>
        <div class="col mb-3">
            <label for=""class="form-label">Fecha Salida:</label>
        </div>
        <div class="col">
            <p class="form-label">{{$reserva->fechaSalida}}</p>
        </div>
        <div class="col mb-3">
            <label for=""class="form-label">Descuento:</label>
        </div>
        <div class="col">
            <p class="form-label">{{$reserva->descuento}} %</p>
        </div>
        <div class="col mb-3">
            <label for=""class="form-label">Total:</label>
        </div>
        <div class="col">
            <p class="form-label">{{$reserva->total}}</p>
        </div>
    </div>
    
</div>
<div class="container">
    <a href="{{route('checkout.finalizar',$reserva)}}" class="btn btn-primary">Finalizar reserva</a>
    
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop
