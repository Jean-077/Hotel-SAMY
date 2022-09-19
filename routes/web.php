<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\HabitacioneController;
use App\Http\Controllers\PisoController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CorreoController;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\SearchController;
use App\Models\Cliente;
use App\Models\Habitacione;
use App\Models\Reserva;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {
    return view('auth.login');
});

Route::controller(CategoriaController::class)->group(function(){

    Route::get('categorias','index')->name('categorias.index');

    Route::get('categorias/create','create')->name('categorias.create');

    Route::post('categorias','store')->name('categorias.store');
    
    Route::get('categorias/{categoria}','show')->name('categorias.show');

    Route::get('categorias/{categoria}/edit','edit')->name('categorias.edit');

    Route::put('categorias/{categoria}','update')->name('categorias.update');

    Route::delete('categorias/{categoria}','destroy')->name('categorias.destroy');
});

Route::controller(PisoController::class)->group(function(){

    Route::get('pisos','index')->name('pisos.index');

    Route::get('pisos/create','create')->name('pisos.create');

    Route::post('pisos','store')->name('pisos.store');
    
    Route::get('pisos/{pisos}','show')->name('pisos.show');

    Route::get('pisos/{piso}/edit','edit')->name('pisos.edit');

    Route::put('pisos/{piso}','update')->name('pisos.update');

    Route::delete('pisos/{piso}','destroy')->name('pisos.destroy');
});

Route::controller(HabitacioneController::class)->group(function(){

    Route::get('habitaciones','index')->name('habitaciones.index');

    Route::get('habitaciones/create','create')->name('habitaciones.create');

    Route::post('habitaciones','store')->name('habitaciones.store');
    
    Route::get('habitaciones/{habitaciones}','show')->name('habitaciones.show');

    Route::get('habitaciones/{habitacion}/edit','edit')->name('habitaciones.edit');

    Route::put('habitaciones/{habitacion}','update')->name('habitaciones.update');

    Route::delete('habitaciones/{habitacion}','destroy')->name('habitaciones.destroy');


});

Route::controller(ClienteController::class)->group(function(){

    Route::get('clientes','index')->name('clientes.index');
    Route::get('clientes/create','create')->name('clientes.create');
    Route::post('clientes','store')->name('clientes.store');
    Route::get('clientes/{cliente}','show')->name('clientes.show');
    Route::get('clientes/{cliente}/edit','edit')->name('clientes.edit');
    Route::put('clientes/{cliente}','update')->name('clientes.update');
    Route::delete('clientes/{cliente}','destroy')->name('clientes.destroy');
    Route::get('clientes/{habitacion}/verreserva','verreserva')->name('clientes.verreserva');
    Route::get('clientes/detalle','detalle')->name('clientes.detalle');
});

Route::controller(ReservaController::class)->group(function(){
    Route::get('reservas','index')->name('reservas.index');
    Route::get('reservas/{habitacion}/create','create')->name('reservas.create');
    Route::post('reservas','store')->name('reservas.store');
    Route::get('reservas/{habitacion}/limpieza','limpieza')->name('reservas.limpieza');

    Route::put('reservas/{habitacion}','updateHabitacion')->name('reservas.updateHabitacion');
    Route::get('reservas/detallereserva','detallereserva')->name('reservas.detallereserva');
    Route::get('reservas/{habitacion}','verhabitacion')->name('reservas.verhabitacion');
});

Route::controller(SearchController::class)->group(function(){
    Route::get('search/clientes', 'SearchController@clientes')->name('search.clientes');

});


Route::controller(CheckoutController::class)->group(function(){
    Route::get('checkout','index')->name('checkout.index');
    Route::get('checkout/{habitacion}','checkout')->name('checkout.checkout');
    Route::get('checkout/{reserva}/finalizar','finalizar')->name('checkout.finalizar');
    
});


Route::controller(ReporteController::class)->group(function(){
    Route::get('reportes','index')->name('reportes.index');
    Route::get('reportes/clientepdf','clientepdf')->name('reportes.clientepdf');
    Route::get('reportes/habitacionpdf/{estado}','habitacionpdf')->name('reportes.habitacionpdf');
    Route::get('reportes/reservapdf','reservapdf')->name('reportes.reservapdf');
    Route::get('reportes/{cliente}/reservaClientepdf','reservaClientepdf')->name('reportes.reservaClientepdf');
    Route::get('reportes/reservaMensualpdf','reservaMensualpdf')->name('reportes.reservaMensualpdf');
    
    Route::get('reportes/{idHabitacion}/verreservacionpdf','verreservacionpdf')->name('reportes.verreservacionpdf');
    Route::get('reportes/reservacionpdf','reservacionpdf')->name('reportes.reservacionpdf');
});
Route::controller(CorreoController::class)->group(function(){
    Route::get('correos','index')->name('correos.index');
    Route::get('correos/create','create')->name('correos.create');
    Route::post('correos','store')->name('correos.store');
    Route::get('correos/{correo}/edit','edit')->name('correos.edit');
    Route::put('correos/{correo}','update')->name('correos.update');
    Route::delete('correos/{correo}','destroy')->name('correos.destroy');
    // Route::get('correos/getMail','getMail')->name('correos.getMail');
    Route::get('correos/{correo}/PromoMail','PromoMail')->name('correos.PromoMail');
    Route::get('correos/{idhabitacion}/ReservaMail','ReservaMail')->name('correos.ReservaMail');
});


Route::get('mail','MailController@getMail');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/', function () {
        $habitaciones = new Habitacione();
        $habitaciones->all();
        $totalHab= $habitaciones->count();
        $habEstado = $habitaciones->pluck('estado')->countBy();
                
        $reservaDia = Reserva::whereDate('fechaEntrada', Carbon::today()->format('Y-m-d'))->get();
        $gananciaDia = $reservaDia->sum('total');
        
        $reservaMes = Reserva::whereMonth('fechaEntrada',now()->month)->get();
        $gananciaMes = $reservaMes->sum('total');
        
        $clientes = new Cliente();
        $numclientes = $clientes->count();
        
        return view('dashboard', compact('totalHab','habEstado','numclientes','gananciaDia','gananciaMes'));
    })->name('dashboard');
});
