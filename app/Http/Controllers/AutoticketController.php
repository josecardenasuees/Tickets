<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tickets;
use App\Models\Clientes;
use App\Models\Servicios;

class AutoticketController extends Controller
{
    public function seleccion()
    {
        $servicios = Servicios::all();
            return view('autoticket.seleccion', compact('servicios'));       
        
    }
    public function guardar(Request $request)
    {        
            $request->validate([
                'cedula' => 'required',                
            ]);

            $cliente = Clientes::where('clientecedula', $request->cedula)->first();

            if ($cliente) {
                Tickets::create([
                    'ticketfecha' => date('Y-m-d'),
                    'tickethora' => date('H:i') ,
                    'cliente' => $cliente->cliente,
                    'servicio' => $request->servicio,
                    'ticketestado' => 1,
                ]);

                return redirect()->route('autoticket.seleccion')
                ->with('success', 'Ticket creado con éxito.');      
            } else {
                return redirect()->route('autoticket.seleccion')->with('success', 'Cliente no existe o el código es invalido');
            }
    }

   
}
