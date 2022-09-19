@extends('adminlte::page')

@section('title', 'Habitaciones')

@section('content_header')
    
@stop

@section('content')
    <h1>Lista de Habitaciones</h1>

    <a href="{{route('habitaciones.create')}}" class="btn btn-primary mb-3">Crear Habitacion</a>
    
    <br>    


    <table id="habitaciones" class="table table-striped table-bordered shadow-lg mt-4" style="width=100%">
        <thead class="bg-primary text-white">
            <tr>

                <th class="text-center" scope="col">Numero</th>
                <th class="text-center" scope="col">Piso</th>
                <th class="text-center" scope="col">Categoria</th>
                <th class="text-center" scope="col">Descripcion</th>
                <th class="text-center" scope="col">Precio</th>
                <th class="text-center" scope="col">Estado</th>
                {{-- <th scope="col"> </th> --}}
                <th scope="col"> </th>
                <th scope="col"> </th>
            </tr>
        </thead>
        <tbody>
            @foreach($habitaciones as $habitacion)
            <tr>
                <td class="text-center" >{{$habitacion->numero}}</td>
                @foreach ($pisos as $piso)
                    @if($habitacion->idPiso == $piso->id)
                        <td class="text-center" >{{$piso->numpiso}}</td>
                    
                    @endif 
                @endforeach
                
                @foreach ($categorias as $categoria)
                    @if($habitacion->idCategoria == $categoria->id)
                        <td>{{$categoria->nomcategoria}}</td>
                    
                    @endif 
                @endforeach
                <td>{{$habitacion->descripcion}}</td>
                <td class="text-center" >S/. {{$habitacion->precio}}</td>
                <td class="text-center" >{{$habitacion->estado}}</td>
                {{-- <td><a href="{{route('habitaciones.show', $habitacion->id)}}" class="btn btn-info">Ver habitacion</a></td> --}}
                <td class="text-center" ><a href="{{route('habitaciones.edit', $habitacion)}}" class="btn btn-info">Editar</a></td>
                <form action="{{route('habitaciones.destroy', $habitacion)}}" method="post">
                    @csrf
                    @method('delete')
                <td class="text-center" ><button type="submit" class="btn btn-danger">Eliminar</button></td>
                    
                </form>
            </tr>
            @endforeach
        </tbody>
    </table>
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
        $('#habitaciones').DataTable();
    </script>
@stop







