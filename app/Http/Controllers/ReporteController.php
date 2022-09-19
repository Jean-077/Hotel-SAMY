<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Habitacione;
use App\Models\Piso;
use App\Models\Reserva;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class ReporteController extends Controller
{
    public function index(){
        return view('reportes.index');
    }
    public function clientepdf(){
        $clientes = Cliente::all();
        view()->share('reportes.clientepdf', $clientes);
        $pdf = Pdf::loadView('reportes.clientepdf', compact('clientes'));
        return $pdf->setPaper('a4','landscape')->stream('lista_clientes.pdf');
    }
    public function habitacionpdf($estado){
        $habitaciones = Habitacione::all();
        $categorias = Categoria::all();
        $pisos = Piso::all();

        view()->share('reportes.habitacionpdf', $habitaciones);
        $pdf = Pdf::loadView('reportes.habitacionpdf', compact('habitaciones','categorias','pisos','estado'));
        return $pdf->setPaper('a4','landscape')->stream('lista_habitaciones_'.$estado.'s.pdf');
    }
    public function reservapdf(){
        $reservas = Reserva::whereDate('fechaEntrada', Carbon::today()->format('Y-m-d'))->get();
        $habitaciones = Habitacione::all();
        $clientes = Cliente::all();
        $categorias = Categoria::all();
        $now = Carbon::today()->format('Y-m-d');
        $gananciaDia = $reservas->sum('total');

        view()->share('reportes.reservapdf');
        $pdf = Pdf::loadView('reportes.reservapdf', compact('reservas','now','habitaciones','clientes','categorias','gananciaDia'));
        return $pdf->setPaper('a3','landscape')->stream('reservas_del_dia.pdf');
    }
    public function reservaClientepdf(Cliente $cliente){
        $reservas = Reserva::all();
        $habitaciones = Habitacione::all();
        $categorias = Categoria::all();
        view()->share('reportes.reservaClientepdf');
        $pdf = Pdf::loadView('reportes.reservaClientepdf', compact('reservas','habitaciones','cliente','categorias'));
        return $pdf->setPaper('a3','landscape')->stream('reservas_por_cliente.pdf');
    }
    public function reservaMensualpdf(){
        $reservas = Reserva::whereMonth('fechaEntrada', now()->month)->get();
        $habitaciones = Habitacione::all();
        $clientes = Cliente::all();
        $categorias = Categoria::all();
        $gananciaMes = $reservas->sum('total');
       
        view()->share('reportes.reservaMensualpdf');
        $pdf = Pdf::loadView('reportes.reservaMensualpdf', compact('reservas','habitaciones','clientes','categorias','gananciaMes'));
        return $pdf->setPaper('a3','landscape')->stream('reservas_del_mes.pdf');
    }
    public function verreservacionpdf($idHabitacion){
        $habitacion=Habitacione::find($idHabitacion);
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
        view()->share('reportes.reservacionpdf');
        $pdf = Pdf::loadView('reportes.reservacionpdf', compact('idcliente','idhabitacion','clientes','reserva','recepcionistas','habitaciones','usuario','categorias'));
        return $pdf->setPaper('a4','portrait')->stream('reservacion.pdf');
    }
}
