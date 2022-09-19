<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte Habitaciones</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
</head>
<body>
    <h3 class="text-center">Reporte de Habitaciones </h3>
    <table id="clientes" class="table table-striped table-bordered shadow-lg mt-4" style="width=100%; border=1">
        <thead class="bg-primary text-white">
            <tr>
                    <th scope="col">Numero</th>
                    <th scope="col">Piso</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Estado Actual</th>
            </tr>
        </thead>
        <tbody>
            @foreach($habitaciones as $habitacion)
            @if($habitacion->estado == $estado)
                <tr>
                    <td>{{$habitacion->numero}}</td>
                    @foreach ($pisos as $piso)
                        @if($habitacion->idPiso == $piso->id)
                            <td>{{$piso->numpiso}}</td>
                        
                        @endif 
                    @endforeach
                    
                    @foreach ($categorias as $categoria)
                        @if($habitacion->idCategoria == $categoria->id)
                            <td>{{$categoria->nomcategoria}}</td>
                        
                        @endif 
                    @endforeach
                    <td>{{$habitacion->descripcion}}</td>
                    <td>{{$habitacion->precio}}</td>
                    <td>{{$habitacion->estado}}</td>
                    
                </tr>
            @endif
            @endforeach
        </tbody>

    </table>

</body>

</html>