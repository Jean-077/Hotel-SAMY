@extends('adminlte::page')

@section('title', 'Checkout')

@section('content_header')
    
@stop

@section('content')
 <h3>Checkout</h3>
<div class="container ">
    <div class="row">
    @foreach($habitaciones as $habitacion)
        
        
        @if($habitacion->estado == 'Ocupado')
            <div class="col-3 shadow card text-white bg-danger m-3" style="width= 6rem;">
                <div class="card-header">
                    <h5>Numero: {{$habitacion->numero}}</h5>
                        @foreach ($pisos as $piso)
                            @if($habitacion->idPiso == $piso->id)
                            <h6>Piso: {{$piso->numpiso}}</h6>
                            
                            @endif 
                        @endforeach 
                </div>
                <div class="card-body">
                    <h5 class="card-title col-9">
                        @foreach ($categorias as $categoria)
                        @if($habitacion->idCategoria == $categoria->id)
                            {{$categoria->nomcategoria}}
                        
                        @endif 
                        @endforeach
                    </h5>
                    <img class="col-3" src="vendor/adminlte/dist/img/double-bed.png" alt="" width="20px">
                  
                </div>
                <div class="card-footer">
                    <h5 class="card-title">
                    <a class= "text-white" href="{{route('checkout.checkout',$habitacion)}}">{{$habitacion->estado}}</a>  
                    </h5> 
                </div>
              </div>
        @endif
    @endforeach
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop







