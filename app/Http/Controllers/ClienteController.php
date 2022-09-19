<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Habitacione;
use App\Models\Reserva;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    public function index() {

        $clientes = Cliente::all();

        return view('clientes.index', compact('clientes'));
    }
    public function create() {
        return view('clientes.create');
    }

    public function store(Request $request) {
        $cliente = new Cliente();
        $user = Auth::user();
        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->dni = $request->dni;
        $cliente->correo = $request->correo;
        $cliente->created_by=$user->id;
        $cliente->save();
        
        
        return redirect()->route('clientes.index');
    }

    public function show(Cliente $cliente) {
        $reservas = Reserva::all();
        $habitaciones = Habitacione::all();


        return view('clientes.show',compact('cliente','reservas','habitaciones'));  
    }

    public function edit(Cliente $cliente) {
        //$cliente = Cliente::find($id);

       return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente){
        $user = Auth::user();
        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->dni = $request->dni;
        $cliente->correo = $request->correo;
        $cliente->edited_by=$user->id;

        $cliente->save();
        
        return redirect()->route('clientes.index');
    }

    public function destroy(Cliente $cliente) {
        $cliente->delete();
        return redirect()->route('clientes.index');
    }

    public function verreserva(Habitacione $habitacion){
        $reservas=Reserva::all();
        $reserva = new Reserva();
        foreach ($reservas as $res){
            if($res->idHabitacion==$habitacion->id){
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
        return view('clientes.detalle', compact('idcliente','idhabitacion','clientes','reserva','recepcionistas','habitaciones','usuario','categorias'));
    }

}
