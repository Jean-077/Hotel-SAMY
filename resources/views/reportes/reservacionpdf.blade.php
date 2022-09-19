<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <title>Reservacion</title>
</head>
<body>
<div class="container">
    <div class="row">    
    <div class="col border shadow">
        <div class="">
            <h4 class="font-weight-bold mt-2">Resumen de habitación</h4>
        </div>
        <br>
        
        <div class="row">
            @foreach($habitaciones as $hab)
            @if($hab->id==$idhabitacion)
            <div class="col">
                <label for=""class="form-label">Habitación:</label>
                <p class="form-label">{{$hab->numero}}</p>
            </div>
            <div class="col">
                
            </div>
            <div class="col">
                <label for=""class="form-label">Categoria:</label>
                @foreach ($categorias as $categoria)
                    @if($hab->idCategoria == $categoria->id)
                        
                    <p>{{$categoria->nomcategoria}}</p>    
                    
                    @endif 
                @endforeach 
            </div>
            <div class="col">
                  
            </div>
            <div class="col">
                <label for=""class="form-label">Precio:</label>
                <p class="form-label">S/. {{$hab->precio}}</p>
            </div>
            <div class="col">
                
            </div>
            <div class="col">
                <label for=""class="form-label">Piso</label>
                <p class="form-label">{{$hab->idPiso}}</p>
            </div>
            <div class="col">
                
            </div>
            @endif
            @endforeach
        </div>
        
        <div class="row form-group">
            
            @foreach($clientes as $cli)
            @if($cli->id == $idcliente)
            
            <div class="col">
                <label for=""class="form-label">Cliente:</label>
                <p class="form-label">{{$cli->nombre}} {{$cli->apellido}}</p>
            </div>
            <div class="col">
               
            </div>
            <div class="col">
                <label for=""class="form-label">DNI:</label>
                <p class="form-label">{{$cli->dni}}</p>
            </div>
            <div class="col">
                
            </div>
            
            {{-- <div class="col ">
                <label for=""class="form-label">Apellido</label>
            </div>
            <div class="col">
                <p class="form-label">{{$cli->apellido}}</p>
            </div> --}}
            <div class="col mb-3">
                <label for=""class="form-label">Correo:</label>
                <p class="form-label">{{$cli->correo}}</p>
            </div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
    
            @endif
            @endforeach
    
        </div>
        
    </div>
    
    <div class="col border shadow">
        <div class="">
            <h4 class="font-weight-bold mt-3" >Resumen de hospedaje</h4>
        </div>
        <br>
        <div class="row form-group ">
            <div class="col ">
                <label for=""class="form-label">Fecha entrada:</label>
            </div>
            <div class="col">
                <p class="form-label">{{$reserva->fechaEntrada}}</p>
            </div>
            <div class="col ">
                <label for=""class="form-label">Fecha Salida:</label>
            </div>
            <div class="col">
                <p class="form-label">{{$reserva->fechaSalida}}</p>
            </div>
            <div class="col">
                <label for=""class="form-label">Descuento:</label>
            </div>
            <div class="col">
                <p class="form-label">{{$reserva->descuento}} %</p>
            </div>
            <div class="col">
                <label for=""class="form-label">Total:</label>
            </div>
            <div class="col">
                <p class="">S/. {{$reserva->total}}</p>
            </div>
        </div>
        
    </div>
    
</div> 
</div>    
    
</body>
</html>