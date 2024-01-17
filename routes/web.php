<?php

use App\Http\Controllers\IA_DeteccionController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\SubscripcionController;
use App\Http\Controllers\Traductor;
use App\Http\Middleware\Subscripcion;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('inicio');
        })->name('dashboard');
    });


Route::get('/inicio', function () {
    return view('inicio');
})->name('inicio');

Route::get('/chats', function(){
    return view('chats.index');
})->name('salasChats.index');


//Metodos de Pago
Route::get('/paymentMethod', [PagoController::class, 'index'])
    ->middleware('auth')
    ->name('paymentMethod');


Route::get('/subscripcion', [SubscripcionController::class, 'index'])
    ->middleware('auth')
    ->name('subscripcion');

Route::get('/traductor', [Traductor::class, 'index'])
    ->middleware('auth')
    ->middleware(Subscripcion::class)
    ->name('traductor.index');

    Route::get('detectargesto', [IA_DeteccionController::class, 'detectargesto'])->middleware('auth')->name('detectargesto');
