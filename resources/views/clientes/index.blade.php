@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>Clientes</h1>
@stop

@section('content')

<div class="container">
    <a href="{{route('clientes.create')}}"  class="mb-3 btn btn-primary">Crear Cliente</a>
</div>
<div class="container">
    
        

    
    <div class="row">
        <table id="clientes" class="table table-striped table-bordered shadow-lg mt-4" style="width=100%">
            <thead class="bg-primary text-white">
                <tr>
                    
                    <th scope="col" class="text-center">Nombre</th>
                    <th scope="col" class="text-center">Apellido</th>
                    <th scope="col" class="text-center">DNI</th>
                    <th scope="col" class="text-center">Correo</th>
                    <th scope="col" class="text-center"></th>
                    <th scope="col" class="text-center"></th>
                    <th scope="col" class="text-center"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $cliente)
                <tr>
                    
                    <td>{{$cliente->nombre}}</td>
                    <td>{{$cliente->apellido}}</td>
                    <td>{{$cliente->dni}}</td>
                    <td>{{$cliente->correo}}</td>
                    <td class="text-center" ><a href="{{route('clientes.show', $cliente)}}" class="btn btn-info">Ver historial</a></td>
                    <td class="text-center" ><a href="{{route('clientes.edit', $cliente)}}" class="btn btn-info">Editar</a></td>
                    <form action="{{route('clientes.destroy', $cliente)}}" method="post">
                        @csrf
                        @method('delete')
                    <td class="text-center" ><button type="submit" class="btn btn-danger">Eliminar</button></td>
                        
                    </form>
                </tr>
                
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    $('#clientes').DataTable();
</script>
@stop
