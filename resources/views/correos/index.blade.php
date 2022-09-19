@extends('adminlte::page')

@section('title', 'Correos')

@section('content_header')
    
@stop

@section('content')

<h1>Correos</h1>

<a href="{{route('correos.create')}}" class="btn btn-primary">Crear correo</a>

<table id="" class="table table-striped table-bordered shadow-lg mt-4" style="width=100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">Titulo de correo</th>
            <th scope="col">Asunto de correo</th>
            <th scope="col">Fecha de creacion</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($correos as $correo)
        <tr>
            
            <td>{{$correo->nomcorreo}}</td>
            <td>{{$correo->asunto}}</td>
            <td>{{$correo->created_at}}</td>
            <td><a href="{{route('correos.PromoMail',$correo)}}" class="btn btn-info">Reenviar correo</a></td>
            <td><a href="{{route('correos.edit',$correo)}}" class="btn btn-info">Editar</a></td>
            
            <form action="{{route('correos.destroy', $correo)}}" method="post">
                @csrf
                @method('delete')
            <td><button type="submit" class="btn btn-danger">Eliminar</button></td>
                
            </form>
            
        </tr>
        @endforeach
       
    </tbody>
</table>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop



