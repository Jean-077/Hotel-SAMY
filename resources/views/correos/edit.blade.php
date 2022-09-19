@extends('adminlte::page')

@section('title', 'Correos')

@section('content_header')
    
@stop

@section('content')

<h1>Editar correo</h1>
    <form action="{{route('correos.update',$correo)}}" method="post">
        @csrf
        @method("put")
        <div class="mb-3">
            <label for=""class="form-label">Titulo de Correo</label>
            <input id="nomcorreo"name="nomcorreo"type="text"class="form-control"tabindex="1" value="{{$correo->nomcorreo}}">
        </div>
        <div class="mb-3">
            <label for=""class="form-label">Asunto</label>
            <input id="asunto"name="asunto"type="text"class="form-control"tabindex="1" value="{{$correo->asunto}}">
        </div>
        <div class="mb-3">
            <label for=""class="form-label">Contenido</label>
            <textarea id="contenido" name="contenido" rows="5" cols=""type="text"class="form-control"tabindex="2" > {{$correo->contenido}} </textarea>
        </div>
              
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop
