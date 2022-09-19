<?php

namespace App\Http\Controllers;

use App\Models\Piso;
use Illuminate\Http\Request;

class PisoController extends Controller
{
    public function index() {

        $pisos = Piso::paginate();

        return view('pisos.index', compact('pisos'));
    }

    public function create() {
        return view('pisos.create');
    }

    public function store(Request $request) {
        $piso = new Piso();

        $piso->numpiso = $request->numpiso;

        $piso->save();

        return redirect()->route('pisos.index');
    }

    public function show($id) {
        $piso = Piso::find($id);
        
        return view('pisos.show',compact('piso')); 
    }

    public function edit(Piso $piso) {
        

       return view('pisos.edit', compact('piso'));
    }

    public function update(Request $request, Piso $piso){
        
        $piso->numpiso = $request->numpiso;

        $piso->save();

        return redirect()->route('pisos.index');
    }

    public function destroy(Piso $piso) {
        $piso->delete();
        return redirect()->route('pisos.index');
    }
}
