@extends('layouts.plantilla')

@section('title','Categoria show' . $categoria)

@section('content')
<h1>aqui se mostraran las categorias {{$categoria->nomcategoria}}  </h1>

@endsection