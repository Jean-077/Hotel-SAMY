<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Habitacione;
use App\Models\Piso;
use App\Models\Reserva;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(){
        $habitaciones = Habitacione::all();
        $pisos = Piso::all();
        $categorias = Categoria::all();
        return view('checkout.index', compact('habitaciones','pisos','categorias'));
    }
    public function checkout(Habitacione $habitacion){
        $reservas=Reserva::all();
        $reserva = new Reserva();
        foreach ($reservas as $res){
            if($res->idHabitacion==$habitacion->id && $res->estado=="activo"){
                $reserva = $res;
            }
        }
        $idcliente = $reserva->idCliente;
        $idhabitacion = $habitacion->id;
        
        $habitaciones = Habitacione::all();
        
        $clientes = Cliente::all();
        $recepcionistas = User::all();
        $usuario = Auth::user();
        $categorias = Categoria::all();
        return view('checkout.checkout', compact('idcliente','idhabitacion','clientes','reserva','recepcionistas','habitaciones','usuario','categorias'));
    }
    public function finalizar(Reserva $reserva) {

        
        // $habitacion = new Habitacione();
        $habitaciones = Habitacione::all();
        foreach ($habitaciones as $habitacion) {
            if ($habitacion->id == $reserva->idHabitacion) {
                $reserva->estado = 'cerrado';
                $habitacion->estado = 'Limpieza';
                $reserva->save();
                $habitacion->save();
            }
        };

        
        
        

        $habitaciones = Habitacione::all();
        $categorias = Categoria::all();
        $pisos = Piso::all();
        
        return view('reservas.index',compact('habitaciones', 'categorias','pisos'));
    }
}
