@extends('adminlte::page')

@section('title', 'Categoiras')

@section('content_header')
    
@stop

@section('content')
<form action="{{route('reservas.store')}}" class="form-class" method="post">
    @csrf
    <div class="container " style="">
        <h3>Habitacion</h3>
        <input type="hidden" name="idHabitacion" value="{{$habitacion->id}}">
        <div class="row">
            <div class="col">
                Numero:
            </div>
            <div class="col">
               <p name="numero">{{$habitacion->numero}}</p> 
            </div>
            <div class="col">
                Categoria:
            </div>
            <div class="col">
                @foreach ($categorias as $categoria)
                    @if($habitacion->idCategoria == $categoria->id)
                        
                    <p name="nomcategoria">{{$categoria->nomcategoria}}</p>    
                    
                    @endif 
                    @endforeach   
            </div>
        </div>


        <div class="row">
            <div class="col">
                Precio:
            </div>
            <div class="col">
                <input type="hidden" id="precio" class="form-control" value="{{$habitacion->precio}}">
               <p>{{$habitacion->precio}}</p>
            </div>
            <div class="col">
                Estado:
            </div>
            <div class="col">    
                <p>{{$habitacion->estado}}</p>   
                
            </div>
        </div>

        <div class="row">
            <div class="col">
                Detalle:
            </div>
            <div class="col">
                <p name="descripcion">{{$habitacion->descripcion}}  </p>   
            </div>
            <div class="col">
                Piso:
            </div>
            <div class="col">
                @foreach ($pisos as $piso)
                    @if($habitacion->idPiso == $piso->id)
                        {{$piso->numpiso}}
                    
                    @endif 
                @endforeach 
            </div>
        </div>
    </div>
    <div class="container ">
        
        <div class="row">
            <div class="col form-group">
                <h3>Cliente</h3>
                <form action="" class="form-class">
                <div class="mb-3">
                    <input id="dni"name="dni"type="text"class="form-control"tabindex="3" placeholder="Ingrese DNI para buscar">
                    {{-- <button type="button" class="btn btn-primary ml-auto" onclick="buscar_datos();">Buscar</button>                     --}}
                </div>
                <div class="mb-3">
                    <label for=""class="form-label">Nombre</label>
                    <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1">
                </div>
                <div class="mb-3">
                    <label for=""class="form-label">Apellido</label>
                    <input id="apellido" name="apellido" type="text" class="form-control" tabindex="2">
                </div>
                
                <div class="mb-3">
                    <label for=""class="form-label">Correo</label>
                    <input id="correo"name="correo"type="email"class="form-control"tabindex="4">
                </div>
                </form>
            </div>
            <div class="col form-group">
                <h3>Detalle Reserva</h3>
                <div class="mb-3">
                    <label for=""class="form-label">Fecha Entrada:</label>
                    <input id="fechaEntrada" name="fechaEntrada"type="date" class="form-control" tabindex="1" value="" oninput="calcularprecioInicial() ">
                </div>
                <div class="mb-3">
                    <label for=""class="form-label">Fecha Salida:</label>
                    <input id="fechaSalida" name="fechaSalida" type="date" class="form-control" tabindex="2" oninput="calcularprecioInicial() ">
                </div>
                <div class="mb-3">
                    <label for=""class="form-label">Precio</label>
                    <input id="precioInicial"name="precioInicial"type="float"class="form-control"tabindex="3" oninput="calcularprecioInicial() ">
                </div>
                <div class="mb-3">
                    <label for=""class="form-label">Descuento:</label>
                    <select name="descuento" id="descuento" class="form-control">
                        <option value="0">Sin descuento</option>
                        <option value="5">5%</option>
                        <option value="10">10%</option>
                        <option value="15">15%</option>
                        <option value="20">20%</option>
                    </select>
                    {{-- <input id="descuento"name="descuento"type="number"class="form-control"tabindex="4" value="{{$desc = 5}}"> --}}
                </div>
                <div class="mb-3">
                    <label for=""class="form-label">Total:</label>
                    <input id="total"name="total"type="float"class="form-control"tabindex="4" onfocus="calcularTotal()">
                </div>
                <button type="submit" class="btn btn-primary ml-auto">Reservar</button>
            </div>
        </div>
    </div>

</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{asset('vendor/jquery-ui/jquery-ui.min.css')}}">
@stop

@section('js')
    <script src="{{asset('vendor/jquery-ui/jquery-ui.min.js')}}"></script>

    <script>
        //  var palabras = ['html','php','java'];
        $('#dni').autocomplete({
            source: function(request, response) {
                $.ajax({   
                    url: "{{route('search.clientes')}}",
                    dataType: 'json',
                    data: {
                        dni: request.dni     
                    },
                    success: function(data){
                        response(data)
                    }
                });
            }
        });
    </script>

    <script>
    function calcularprecioInicial() {
        var fechaEntrada = new Date(document.getElementById("fechaEntrada").value);
        var fechaSalida = new Date(document.getElementById("fechaSalida").value);
        var precio = Number.parseInt(document.getElementById("precio").value);
        var actualDate = new Date();
        if (fechaSalida > fechaEntrada)
        {
            var diff = fechaSalida.getTime() - fechaEntrada.getTime();
           return document.getElementById("precioInicial").value = Math.round(diff / (1000 * 60 * 60 * 24))*precio;
        }
        else if (fechaSalida != null && fechaSalida < fechaEntrada) {
            alert("La fecha final de la promoción debe ser mayor a la fecha inicial");
           return document.getElementById("precioInicial").value = 0;
        }
    }
    function calcularTotal() {
        var precio = Number.parseInt(document.getElementById("precioInicial").value);
        var desc = Number.parseInt(document.getElementById("descuento").value);
        return document.getElementById("total").value = precio - precio*(desc/100);
    }
    </script>


    
@stop
