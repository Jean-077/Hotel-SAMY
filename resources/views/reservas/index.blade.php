@extends('adminlte::page')

@section('title', 'Reservas')

@section('content_header')
    
@stop

@section('content')
<div class="container ">
    <div class="row">
    @foreach($habitaciones as $habitacion)
        
        @if($habitacion->estado == 'Disponible')
            <div class="col-3 m-4  shadow card text-white bg-success mb-3" >
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
                    Categoria:
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
                    <a class= "text-white" href="{{route('reservas.create',$habitacion)}}">{{$habitacion->estado}}</a>  
                    </h5> 
                </div>
            </div>
        @elseif($habitacion->estado == 'Ocupado')
            <div class="col-3 m-4 shadow card text-white bg-danger mb-3">
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
                        Categoria:
                        @foreach ($categorias as $categoria)
                        @if($habitacion->idCategoria == $categoria->id)
                            {{$categoria->nomcategoria}}
                        
                        @endif 
                        @endforeach
                      </h5>
                      <img class="col-3" src="vendor/adminlte/dist/img/sala-de-llaves.png" alt="" width="20px">
                  
                </div>
                <div class="card-footer">
                    <h5 class="card-title">
                    <a class= "text-white" href="{{route('reservas.verhabitacion',$habitacion)}}">{{$habitacion->estado}}</a>  
                    </h5> 
                </div>
              </div>
        @elseif($habitacion->estado == 'Limpieza')
            <div class="col-3 m-4 shadow card text-white bg-warning mb-3">
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
                        Categoria:
                        @foreach ($categorias as $categoria)
                        @if($habitacion->idCategoria == $categoria->id)
                            {{$categoria->nomcategoria}}
                        
                        @endif 
                        @endforeach
                      </h5>
                      <img class="col-3" src="vendor/adminlte/dist/img/limpieza.png" alt="" width="20px">
                  
                </div>
                <div class="card-footer">
                    <h5 class="card-title">
                    <a class= "text-white" href="{{route('reservas.limpieza',$habitacion)}}">{{$habitacion->estado}}</a>  
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







