<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Habitacione;
use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Piso;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    public function index() {

        $habitaciones = Habitacione::all();
        $categorias = Categoria::all();
        $pisos = Piso::all();
        return view('reservas.index',compact('habitaciones', 'categorias','pisos'));
    }
    public function create(Habitacione $habitacion){
        $habitaciones = Habitacione::all();
        $categorias = Categoria::all();
        $pisos = Piso::all();
        $clientes = Cliente::all();
        return view('reservas.create', compact('habitacion', 'categorias','pisos','clientes'));
    }
    public function store(Request $request){
        $reserva=new Reserva();
        $clientes = Cliente::all();
        $ncliente = new Cliente();
        $usuario = Auth::user();
        $idcliente = 0;
        $idhabitacion = 0;
        $valor = true;
        foreach ($clientes as $cliente){
            if($cliente->dni == $request->dni){
                $reserva->idCliente = $cliente->id;
                $idcliente=$cliente->id;    
                $valor=false;
                break;
            }               
        }  
        if($valor){
            $ncliente->nombre = $request->nombre;
            $ncliente->apellido = $request->apellido;
            $ncliente->dni = $request->dni;
            $ncliente->correo = $request->correo;
            $ncliente->save();
            $Nuevoclientes = Cliente::all();
            foreach ($Nuevoclientes as $pcliente){
                if($pcliente->dni == $request->dni){
                    $reserva->idCliente = $pcliente->id;
                    $idcliente=$pcliente->id;  
                }
            }
        }
        
          
        $habitaciones= Habitacione::all();
        foreach ($habitaciones as $habitacion){
            if($habitacion->id == $request->idHabitacion){
                $reserva->idHabitacion= $request->idHabitacion;
                $habitacion->estado = "Ocupado";
                $idhabitacion=$request->idHabitacion;
                $habitacion->save();
            }
        }
        //$reserva->idHabitacion= $request->idHabitacion;
        $reserva->idRecepcionista = $usuario->id;
        $reserva->fechaEntrada=$request->fechaEntrada;
        $reserva->fechaSalida=$request->fechaSalida;
        $reserva->precioInicial=$request->precioInicial;
        $reserva->descuento = $request->descuento;
        $reserva->total = $request->total;
        $reserva->estado = 'activo';
        $reserva->created_by = $usuario->id;
        $reserva->save();

        $clientes = Cliente::all();
        $reservas = Reserva::all();
        $reserva=new Reserva();
            foreach ($reservas as $res){
                if($res->idHabitacion==$idhabitacion && $res->estado=="activo"){
                    $reserva = $res;
                }
            }
        $recepcionistas = User::all();
        $habitacion = new Habitacione();
        $habitaciones = Habitacione::all();
        // foreach($habitaciones as $hab){
        //     if($hab->id == $request->idHabitacion){
        //         $habitacion = $hab;
        //     }
        // }
        $categorias = Categoria::all();
        return view('reservas.detallereserva', compact('idcliente','idhabitacion','clientes','reserva','recepcionistas','habitaciones','usuario','categorias'));

    }

    public function verhabitacion(Habitacione $habitacion){
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
        return view('reservas.detallereserva', compact('idcliente','idhabitacion','clientes','reserva','recepcionistas','habitaciones','usuario','categorias'));
    }

    public function limpieza(Habitacione $habitacion){
        $categorias = Categoria::all();
        $pisos = Piso::all();
        return view('reservas.limpieza', compact('habitacion','categorias','pisos'));

    }
    public function updateHabitacion(Request $request, Habitacione $habitacion){
        
        // $habitacion->numero= $request->numero;
        // $habitacion->idPiso = $request->idpiso;
        // $habitacion->idCategoria= $request->idcategoria;
        // $habitacion->descripcion=$request->descripcion;
        // $habitacion->precio = $request->precio;
        $habitacion->estado = $request->estado;

        $habitacion->save();
        
        return redirect()->route('reservas.index');
    }

    public function detallereserva(){



    }

    

}
