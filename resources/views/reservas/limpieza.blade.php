@extends('adminlte::page')

@section('title', 'Pisos')

@section('content_header')
    
@stop

@section('content')

<h1>Limpieza</h1>

<form action="{{route('reservas.updateHabitacion',$habitacion)}}" method="post">
    @csrf
    @method('put')

    <div class="mb-3">
        <label for="" class="form-label">Numero:</label>
        <p id="numero"name="numero"type="float"class="form-control"tabindex="1" value="{{$habitacion->numero}}">{{$habitacion->numero}}</p>
        
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Piso:</label>
       
       
            @foreach($pisos as $piso)
            @if($habitacion->idPiso == $piso->id)
                <p id="idpiso"name="idpiso"type="text"class="form-control"tabindex="2" value="{{$habitacion->idPiso}}">{{$piso->numpiso}}</p>
                   
            @endif 
            
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Categoria:</label>
        
            @foreach($categorias as $categoria)
            @if($habitacion->idCategoria == $categoria->id)
                <p id="idcategoria" name="idcategoria" type="text"   class="form-control" value='{{$habitacion->idCategoria}}'>{{$categoria->nomcategoria}}</p>       
                   
            @endif 
            @endforeach
        
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Descripcion:</label>
        <p id="descripcion"name="descripcion"type="text"class="form-control"tabindex="3" value="{{$habitacion->descripcion}}">{{$habitacion->descripcion}}</p>
    </div>
    <div class="mb-3">
        <label for=""class="form-label">Precio:</label>
        <p id="precio"name="precio"type="float"class="form-control"tabindex="3" value="{{$habitacion->precio}}">{{$habitacion->precio}}</p>
    </div>
    
    <div class="mb-3">
        <label for=""class="form-label">Estado:</label>
        <select name='estado' class="form-control">
            <option value="{{$habitacion->estado}}">{{$habitacion->estado}}</option>
            @if($habitacion->estado == 'Disponible' ){
                <option value="Ocupado">Ocupado</option>
                <option value="Limpieza">Limpieza</option>     
            }@elseif($habitacion->estado == 'Ocupado'){
                <option value="Disponible">Disponible</option>
                <option value="Limpieza">Limpieza</option>
            }@elseif($habitacion->estado == 'Limpieza'){
                <option value="Disponible">Disponible</option>
                <option value="Ocupado">Ocupado</option>
            }@else{
                <option value="Disponible">Disponible</option>
                <option value="Ocupado">Ocupado</option>
                <option value="Limpieza">Limpieza</option>
            }    
            @endif
        </select>
    </div>
    
    <a href="{{route('reservas.index')}}" class="btn btn-secondary">Cancelar</a>
    <button type="submit"class="btn btn-primary"tabindex="4">Actualizar</button>
    
</form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop
