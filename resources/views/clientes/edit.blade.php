@extends('adminlte::page')

@section('title', 'Cliente')

@section('content_header')
    
@stop

@section('content')
    <h1>Editar cliente</h1>
    <form action="{{route('clientes.update', $cliente)}}" method="post">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for=""class="form-label">Nombre</label>
            <input id="nombre"name="nombre"type="text"class="form-control"tabindex="1" value="{{$cliente->nombre}}">
        </div>
        <div class="mb-3">
            <label for=""class="form-label">Apellido</label>
            <input id="apellido"name="apellido"type="text"class="form-control"tabindex="2"value="{{$cliente->apellido}}">
        </div>
        <div class="mb-3">
            <label for=""class="form-label">DNI</label>
            <input id="dni"name="dni"type="text"class="form-control"tabindex="3"value="{{$cliente->dni}}">
        </div>
        <div class="mb-3">
            <label for=""class="form-label">Correo</label>
            <input id="correo"name="correo"type="email"class="form-control"tabindex="4"value="{{$cliente->correo}}">
        </div>
        
        <button type="submit" class="btn btn-primary">actualizar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop