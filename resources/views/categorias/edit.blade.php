@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
@stop

@section('content')
    <h1>Crear categoria</h1>
    <form action="{{route('categorias.update',$categoria)}}" method="post">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for=""class="form-label">Nombre de la categoria</label>
            <input id="nomcat"name="nomcat"type="text"class="form-control"tabindex="1" value="{{$categoria->nomcategoria}}">
        </div>
        
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop

