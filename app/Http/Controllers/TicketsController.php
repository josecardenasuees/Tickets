<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tickets;
use App\Models\Clientes;
use App\Models\Servicios;

class TicketsController extends Controller
{
    public function index()
    {
        $tickets = Tickets::all();
        return view('tickets.index', compact('tickets'));
    }

    public function welcome()
    {
        
        return view('welcome');
    }

    public function create()
    {
        $clientes = Clientes::all();
        $servicios = Servicios::all();
        return view('tickets.create', compact('clientes', 'servicios'));
    }

    public function store(Request $request)
    {
      
        // Validaciones
        $request->validate([
            'ticketfecha' => 'required',
            'tickethora' => 'required',
            'cliente' => 'required',
            'servicio' => 'required',
            'ticketestado' => 'required',
        ]);
        
        //var_dump()
        //die();
        // Registro de información para log
        //\Log::debug('Datos recibidos en el formulario:', $request->all());
    
        // Crear un ticket
        Tickets::create([
            'ticketfecha' => $request->ticketfecha,
            'tickethora' => $request->tickethora,
            'cliente' => $request->cliente,
            'servicio' => $request->servicio,
            'ticketestado' => $request->ticketestado,
        ]);
    
        return redirect()->route('tickets.index')
                         ->with('success', 'Ticket creado con éxito.');
    }

    public function show($id)
    {
        $ticket = Tickets::find($id);
        return view('tickets.show', compact('ticket'));
    }

    public function edit($id)
    {
        $ticket = Tickets::find($id);
        $clientes = Clientes::all();
        $servicios = Servicios::all();
        return view('tickets.edit', compact('ticket', 'clientes', 'servicios'));
    }

    public function update(Request $request, $id)
    {
        // Validaciones
        $request->validate([
            'cliente' => 'required',
            'servicio' => 'required',
            'TicketFecha' => 'required',
            'TicketHora' => 'required',
            'TicketEstado' => 'required',
        ]);

        // Actualizar el ticket
        $ticket = Tickets::find($id);
        $ticket->cliente = $request->cliente;
        $ticket->servicio = $request->servicio;
        $ticket->TicketFecha = $request->TicketFecha;
        $ticket->TicketHora = $request->TicketHora;
        $ticket->TicketEstado = $request->TicketEstado;
        $ticket->save();

        return redirect()->route('tickets.index')
                         ->with('success', 'Ticket actualizado con éxito.');
    }

    public function destroy($id)
    {
        // Eliminar el ticket
        $ticket = Tickets::find($id);
        $ticket->delete();

        return redirect()->route('tickets.index')
                         ->with('success', 'Ticket eliminado con éxito.');
    }

    public function generar(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'cedula' => 'required',                
            ]);

            // Crear ticket
            Tickets::create([
                'ticketfecha' => $request->ticketfecha,
                'tickethora' => $request->tickethora,
                'cliente' => $request->cliente,
                'servicio' => $request->servicio,
                'ticketestado' => $request->ticketestado,
            ]);

        } elseif ($request->isMethod('get')) {
            $servicios = Servicios::all();
            return view('tickets.generar', compact('servicios'));            
        }
    }
}
