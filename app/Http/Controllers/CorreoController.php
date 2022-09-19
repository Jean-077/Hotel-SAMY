<?php

namespace App\Http\Controllers;

use App\Mail\PromoMail;
use App\Mail\ReservaMail;
use App\Mail\TestMail;
use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Correo;
use App\Models\Habitacione;
use App\Models\Piso;
use App\Models\Reserva;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CorreoController extends Controller
{
    public function index(){

        $correos = Correo::all();

        return view('correos.index', compact('correos'));
    }
    public function create(){
        return view('correos.create');
    }
    public function store(Request $request){
        $user = Auth::user();
        $correo = new Correo();
        $correo->nomcorreo = $request->nomcorreo; 
        $correo->asunto = $request->asunto; 
        $correo->contenido = $request->contenido; 
        $correo->created_by = $user->id;
        $correo->save();
        // Aquí debemos crear el enlace para enviar el correo
       
        $data = compact('correo');
        $clientes = Cliente::all();
        foreach ($clientes as $cliente){
            Mail::to($cliente->correo)->send(new PromoMail($data,$correo->asunto));
        }
        
        $correos = Correo::all();
        return view('correos.index',compact('correos'));

        // return redirect()->route('correos.index');
    }
    public function edit(Correo $correo){
        return view('correos.edit', compact('correo'));
    }
    public function update(Request $request, Correo $correo){
        $user = Auth::user();
        $correo->nomcorreo = $request->nomcorreo; 
        $correo->asunto = $request->asunto; 
        $correo->contenido = $request->contenido; 
        $correo->edited_by=$user->id;
        $correo->save();
        return redirect()->route('correos.index');
    }


    public function destroy(Correo $correo) {
        $correo->delete();
        return redirect()->route('correos.index');
    }
    public function getMail(){
        $data = ['name' => 'Anthony'];
        Mail::to('anthonycalapuja@gmail.com')->send(new TestMail($data));
        $correos = Correo::all();

        return view('correos.index', compact('correos'));
    }
    public function PromoMail(Correo $correo){
        
        $data = compact('correo');
        $clientes = Cliente::all();
        foreach ($clientes as $cliente){
            Mail::to($cliente->correo)->send(new PromoMail($data,$correo->asunto));
        }
        
        $correos = Correo::all();
        return view('correos.index',compact('correos'));
    }
    public function ReservaMail($idhabitacion){
        $habitacion = Habitacione::find($idhabitacion);
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
        $data = compact('idcliente','idhabitacion','clientes','reserva','recepcionistas','habitaciones','usuario','categorias');
        $asunto = "Detalles de reserva"; 
        foreach ($clientes as $cliente){
            if ($cliente->id==$idcliente){
                Mail::to($cliente->correo)->send(new ReservaMail($data,$asunto));
            }
        }
        $pisos = Piso::all();
        return view('reservas.index',compact('habitaciones', 'categorias','pisos'));
    }



}
