<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriaController extends Controller
{
    public function index() {

        $categorias = Categoria::all();

        return view('categorias.index', compact('categorias'));
    }
    public function create() {
        return view('categorias.create');
    }

    public function store(Request $request) {
        $categoria = new Categoria();
        $user = Auth::user();
        $categoria->nomcategoria = $request->nomcat;
        $categoria->created_by = $user->id;

        $categoria->save();
        
        return redirect()->route('categorias.index');
    }

    public function show($id) {
        $categoria = Categoria::find($id);
        
        return view('categorias.show',compact('categoria')); 
    }

    public function edit(Categoria $categoria){
        return view('categorias.edit',compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria) {
        $user = Auth::user();
        $categoria->nomcategoria = $request->nomcat;
        $categoria->edited_by = $user->id;
        $categoria->save();

        return redirect()->route('categorias.index');
    }
    public function destroy(Categoria $categoria) {
        $categoria->delete();
        return redirect()->route('categorias.index');
    }
}
