@extends('adminlte::page')

@section('title', 'Pisos')

@section('content_header')
    
@stop

@section('content')
<div class="container">
<h1>Pisos</h1>

<a href="{{route('pisos.create')}}" class="btn btn-primary">Crear piso</a>

<table id="" class="table table-striped table-bordered shadow-lg mt-4" style="width=70%">
    <thead class="bg-primary text-white">
        <tr>
           
            <th class="text-center" scope="col">Numero de piso</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($pisos as $piso)
        <tr>
            
            <td class="text-center">{{$piso->numpiso}}</td>
            <td class="text-center"><a href="{{route('pisos.edit', $piso)}}" class="btn btn-info">Editar</a></td>
            <form action="{{route('pisos.destroy', $piso)}}" method="post">
                @csrf
                @method('delete')
            <td class="text-center"><button type="submit" class=" btn btn-danger">Eliminar</button></td>
                
            </form>
        </tr>
        @endforeach
    </tbody>
</table>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop



