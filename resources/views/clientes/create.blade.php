@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
@stop

@section('content')
    <h1>Crear cliente</h1>
    <form action="{{route('clientes.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for=""class="form-label">Nombre</label>
            <input id="nombre"name="nombre"type="text"class="form-control"tabindex="1">
        </div>
        <div class="mb-3">
            <label for=""class="form-label">Apellido</label>
            <input id="apellido"name="apellido"type="text"class="form-control"tabindex="2">
        </div>
        <div class="mb-3">
            <label for=""class="form-label">DNI</label>
            <input id="dni"name="dni"type="text"class="form-control"tabindex="3">
        </div>
        <div class="mb-3">
            <label for=""class="form-label">Correo</label>
            <input id="correo"name="correo"type="email"class="form-control"tabindex="4">
        </div>
        
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop