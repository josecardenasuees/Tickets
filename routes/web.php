<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\AutoticketController;

Route::get('/clientes', [ClientesController::class, 'index']);
Route::get('/clientes/create', [ClientesController::class, 'create'])->name('clientes.create');
Route::post('/clientes', [ClientesController::class, 'store'])->name('clientes.store');
Route::get('/clientes/{cliente}/edit', [ClientesController::class, 'edit'])->name('clientes.edit');
Route::put('/clientes/{cliente}', [ClientesController::class, 'update'])->name('clientes.update');
Route::get('/clientes', [ClientesController::class, 'index'])->name('clientes.index');
Route::delete('/clientes/{cliente}', [ClientesController::class, 'destroy'])->name('clientes.destroy');

Route::get('/servicios', [ServiciosController::class, 'index']);
Route::get('/servicios/create', [ServiciosController::class, 'create'])->name('servicios.create');
Route::post('/servicios', [ServiciosController::class, 'store'])->name('servicios.store');
Route::get('/servicios/{servicio}/edit', [ServiciosController::class, 'edit'])->name('servicios.edit');
Route::put('/servicios/{servicio}', [ServiciosController::class, 'update'])->name('servicios.update');
Route::get('/servicios', [ServiciosController::class, 'index'])->name('servicios.index');
Route::delete('/servicios/{servicio}', [ServiciosController::class, 'destroy'])->name('servicios.destroy');

Route::get('/tickets', [TicketsController::class, 'index']);
Route::get('/tickets/create', [TicketsController::class, 'create'])->name('tickets.create');
Route::post('/tickets', [TicketsController::class, 'store'])->name('tickets.store');
Route::get('/tickets/{ticket}/edit', [TicketsController::class, 'edit'])->name('tickets.edit');
Route::put('/tickets/{ticket}', [TicketsController::class, 'update'])->name('tickets.update');
Route::get('/tickets', [TicketsController::class, 'index'])->name('tickets.index');
Route::delete('/tickets/{ticket}', [TicketsController::class, 'destroy'])->name('tickets.destroy');

//Route::match(['get', 'post'], '/tickets/generar', [TicketsController::class, 'generar'])->name('tickets.generar');
//Route::post('/tickets/generar', [TicketsController::class, 'store'])->name('tickets.generar');

Route::get('/autoticket/seleccion', [AutoticketController::class, 'seleccion'])->name('autoticket.seleccion');
Route::post('/autoticket/guardar', [AutoticketController::class, 'guardar'])->name('autoticket.guardar');


Route::get('/', [TicketsController::class, 'welcome']);
