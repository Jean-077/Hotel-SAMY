@extends('adminlte::page')

@section('title', 'Pisos')

@section('content_header')
    
@stop

@section('content')

<h1>Crear nuevo piso</h1>
    <form action="{{route('pisos.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for=""class="form-label">Numero de piso</label>
            <input id="numpiso"name="numpiso"type="number"class="form-control"tabindex="1">
        </div>
        
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop





