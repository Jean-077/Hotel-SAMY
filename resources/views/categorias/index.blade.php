@extends('adminlte::page')

@section('title', 'Categoiras')

@section('content_header')
    
@stop

@section('content')
<div class="container">
    <div class="md-3">
        <h3>Categorias</h3>
    </div>
    
<a href="{{route('categorias.create')}}"  class="btn btn-primary mb-3">Crear Categoria</a>

<table id="categorias" class="table table-striped table-bordered shadow-lg mt-4" style="width=100%">
    <thead class="bg-primary text-white">
        <tr>
            
            <th class="text-center" scope="col">Categoria</th>
            {{-- <th scope="col"></th> --}}
            <th scope="col"></th>
            <th scope="col"></th>

        </tr>
    </thead>
    <tbody>
        @foreach($categorias as $categoria)
        <tr>
            
            <td class="text-justify">{{$categoria->nomcategoria}}</td>
            
            {{-- <td><a href="{{route('categorias.show', $categoria->id)}}" class="btn btn-info">Ver Categoria</a></td> --}}
            <td class="text-center"><a href="{{route('categorias.edit', $categoria)}}" class="btn btn-info">Editar</a></td>
            <form action="{{route('categorias.destroy', $categoria)}}" method="post">
                @csrf
                @method('delete')
            <td class="text-center"><button type="submit" class="btn btn-danger">Eliminar</button></td>
                
            </form>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $('#categorias').DataTable();
    </script>
@stop





