@extends('adminlte::page')

@section('title', 'Habitaciones')

@section('content_header')
    <h1>Crear Habitaciones</h1>
@stop

@section('content')
<form action="{{route('habitaciones.store')}}" method="post">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Numero:</label>
        <input id="numero"name="numero"type="float"class="form-control"tabindex="1">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Piso:</label>
        
        <select name="idpiso" class="form-control">
            @foreach($pisos as $piso)
            <option value="{{$piso->id}}">{{$piso->numpiso}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for=""class="form-label">Categoria:</label>
        <select name='idcategoria' class="form-control">
            @foreach($categorias as $categoria)
            <option value="{{$categoria->id}}">{{$categoria->nomcategoria}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Descripcion:</label>
        <input id="descripcion"name="descripcion"type="text"class="form-control"tabindex="3">
    </div>
    <div class="mb-3">
        <label for=""class="form-label">Precio:</label>
        <input id="precio"name="precio"type="float"class="form-control"tabindex="3">
    </div>
    
    <div class="mb-3">
        <label for=""class="form-label">Estado:</label>
        <select name='estado' class="form-control">
            <option value="Disponible">Disponible</option>
            <option value="Ocupado">Ocupado</option>
            <option value="Limpieza">Limpieza</option>
        </select>
    </div>
    
    <a href="{{route('habitaciones.index')}}" class="btn btn-secondary">Cancelar</a>
    <button type="submit"class="btn btn-primary"tabindex="4">Guardar</button>
    
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop



