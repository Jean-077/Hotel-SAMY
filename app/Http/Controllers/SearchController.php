<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function clientes(Request $request){
        $dni = $request->get('dni');

        return $dni;
    }
}
