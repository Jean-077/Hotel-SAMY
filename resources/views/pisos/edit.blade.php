@extends('adminlte::page')

@section('title', 'Pisos')

@section('content_header')
    
@stop

@section('content')

<h1>Actualizar piso</h1>
    <form action="{{route('pisos.update', $piso)}}" method="post">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for=""class="form-label">Numero de piso</label>
            <input id="numpiso"name="numpiso"type="number"class="form-control"tabindex="1" value="{{$piso->numpiso}}">
        </div>
        
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop

