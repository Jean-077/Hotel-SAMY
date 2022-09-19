<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte Reservas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="{{public_path('css/app.css')}}" type="text/css"> --}}
</head>
<body>
    <div class="container">
      <h3 class="text-center">Reporte de reservas del mes </h3> 
      
    </div>

            <table id="clientes" class="table table-striped table-bordered shadow-lg mt-4" >
                
                <thead class="bg-success text-white">
                    <tr>
                        <th scope="col" class="text-center"><p>Habitacion</p></th>
                        <th scope="col" class="text-center"><p>Piso</p></th>
                        <th scope="col" class="text-center"><p>Categoria</p></th>
                        <th scope="col" class="text-center"><p>Nombre Completo</p></th>
                        <th scope="col" class="text-center"><p>DNI</p></th>
                        <th scope="col" class="text-center"><p>F. Entrada</p></th>
                        <th scope="col" class="text-center"><p>F. Salida</p></th>
                        <th scope="col" class="text-center"><p>Subtotal</p></th>
                        <th scope="col" class="text-center"><p>Descuento</p></th>
                        <th scope="col" class="text-center"><p>Precio</p></th>
                        {{-- <th scope="col" class="text-center">Estado</th>
                         --}}
                        
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($reservas as $reserva)
                    <tr>
                    
                        @foreach($habitaciones as $habitacion)
                            @if($reserva->idHabitacion == $habitacion->id)
                            <td class="text-center"><p>{{$habitacion->numero}}</p></td>
                            <td class="text-center"><p>{{$habitacion->idPiso}}</p></td>
                            @foreach($categorias as $categoria)
                                @if($habitacion->idCategoria == $categoria->id)
                                <td class="text-center"><p>{{$categoria->nomcategoria}}</p></td>
                                @endif
                            @endforeach
                            @foreach($clientes as $cliente)
                                @if($reserva->idCliente == $cliente->id)
                                <td class="text-center"><p>{{$cliente->nombre}} {{$cliente->apellido}}</p></td>
                                <td class="text-center"><p>{{$cliente->dni}}</p></td>
                                @endif
                            @endforeach
                            <td class="text-center"><p>{{$reserva->fechaEntrada}}</p></td>
                            <td class="text-center"><p>{{$reserva->fechaSalida}}</p></td>
                            <td class="text-center"><p>S/. {{$reserva->precioInicial}}</p></td>
                            <td class="text-center"><p>{{$reserva->descuento}}%</p></td>
                            <td class="text-center"><p>S/. {{$reserva->total}}</p></td>
                            {{-- <td class="text-center">{{$reserva->estado}}</td> --}}
                           
                            @endif
                        @endforeach
                            
                            
                   
                    
                    </tr>
                    
                    @endforeach
                </tbody>
            
            </table>
            <div class="row">
                <h5 class=" col-2 bg-success text-white shadow-lg"> Ganancia estimada mensual: </h5>  
                <h5 class="col-2"> S/. {{$gananciaMes}}</h5>
            </div>

</body>

</html>

