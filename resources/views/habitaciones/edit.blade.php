@extends('adminlte::page')

@section('title', 'Habitaciones')

@section('content_header')
    <h1>Modificar Habitacion</h1>
@stop

@section('content')
<form action="{{route('habitaciones.update', $habitacion)}}" method="post">
    @csrf
    @method('put')

    <div class="mb-3">
        <label for="" class="form-label">Numero:</label>
        <input id="numero"name="numero"type="float"class="form-control"tabindex="1" value="{{$habitacion->numero}}" >
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Piso:</label>
        
        <select name="idpiso" class="form-control">
            @foreach($pisos as $piso)
            @if($habitacion->idPiso == $piso->id)
                    <option value="{{$piso->id}}">{{$piso->numpiso}}</option>
                      @break
            @endif 
            @endforeach
            @foreach($pisos as $piso)
            @if($habitacion->idPiso != $piso->id)
                    <option value="{{$piso->id}}">{{$piso->numpiso}}</option>
                      
            @endif 
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for=""class="form-label">Categoria:</label>
        <select name='idcategoria' class="form-control" value="">
            @foreach($categorias as $categoria)
            @if($habitacion->idCategoria == $categoria->id)
                       
                <option value="{{$categoria->id}}">{{$categoria->nomcategoria}}</option>     
                @break
            @endif 
            @endforeach
            @foreach($categorias as $categoria)
            @if($habitacion->idCategoria != $categoria->id)
                       
                <option value="{{$categoria->id}}">{{$categoria->nomcategoria}}</option>     
            @endif 
            
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Descripcion:</label>
        <input id="descripcion"name="descripcion"type="text"class="form-control"tabindex="3" value="{{$habitacion->descripcion}}">
    </div>
    <div class="mb-3">
        <label for=""class="form-label">Precio:</label>
        <input id="precio"name="precio"type="float"class="form-control"tabindex="3" value="{{$habitacion->precio}}"
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
    
    <a href="{{route('habitaciones.index')}}" class="btn btn-secondary">Cancelar</a>
    <button type="submit"class="btn btn-primary"tabindex="4">Actualizar</button>
    
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop



