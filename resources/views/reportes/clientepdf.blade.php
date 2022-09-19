<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte Clientes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="{{public_path('css/app.css')}}" type="text/css"> --}}
</head>
<body>
    <h1 class="text-center">Reporte de Clientes </h1>
    <table id="clientes" class="table table-striped table-bordered shadow-lg mt-4" style="width=100%">
        <thead class="bg-success text-white ">
            <tr>
                
                <th scope="col" class="text-center">Nombre</th>
                <th scope="col" class="text-center">Apellido</th>
                <th scope="col" class="text-center">DNI</th>
                <th scope="col" class="text-center">Correo</th>
                {{-- <th scope="col" colspan="3" class="text-center">Acciones</th> --}}
                
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
            <tr>
                
                <td class="text-center">{{$cliente->nombre}}</td>
                <td class="text-center">{{$cliente->apellido}}</td>
                <td class="text-center">{{$cliente->dni}}</td>  
                <td class="text-center">{{$cliente->correo}}</td>
                
            </tr>
            
            @endforeach
        </tbody>

    </table>

</body>

</html>

