<?php

namespace App\Http\Controllers;

use App\Models\Habitacione;
use App\Models\Categoria;
use App\Models\Piso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HabitacioneController extends Controller
{
    
    public function index() {

        $habitaciones = Habitacione::all();
        $categorias = Categoria::all();
        $pisos = Piso::all();
        return view('habitaciones.index', compact('habitaciones','pisos','categorias'));
    }
    public function create() {
        $categorias = Categoria::all();
        $pisos = Piso::all();
        return view('habitaciones.create', compact('pisos'), compact('categorias'));
    }

    public function store(Request $request) {
        $user = Auth::user();
        $habitacion = new Habitacione();

        $habitacion->numero= $request->numero;
        $habitacion->idPiso = $request->idpiso;
        $habitacion->idCategoria= $request->idcategoria;
        $habitacion->descripcion=$request->descripcion;
        $habitacion->precio = $request->precio;
        $habitacion->estado = $request->estado;
        $habitacion->created_by = $user->id;

        $habitacion->save();

        return redirect()->route('habitaciones.index');
    }

    public function show($id) {
        $habitacion = Habitacione::find($id);
        
        return view('habitaciones.show',compact('habitacion')); 
    }

    public function edit(Habitacione $habitacion) {
        $categorias = Categoria::all();
        $pisos = Piso::all();

       return view('habitaciones.edit', compact('categorias','pisos','habitacion'));
    }

    public function update(Request $request, Habitacione $habitacion){
        $user = Auth::user();
        $habitacion->numero= $request->numero;
        $habitacion->idPiso = $request->idpiso;
        $habitacion->idCategoria= $request->idcategoria;
        $habitacion->descripcion=$request->descripcion;
        $habitacion->precio = $request->precio;
        $habitacion->estado = $request->estado;
        $habitacion->edited_by = $user->id;

        $habitacion->save();
        
        return redirect()->route('habitaciones.index');
    }

    public function destroy(Habitacione $habitacion) {
        $habitacion->delete();
        return redirect()->route('habitaciones.index');
    }


}
