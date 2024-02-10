<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicios;
use Carbon\Carbon;

class ServiciosController extends Controller
{
    public function index()
    {
        $servicios = Servicios::all();
        return view('servicios.index', compact('servicios'));
    }

    public function create()
    {
        return view('servicios.create');
    }

    public function store(Request $request)
    {
        // Validaciones
        $request->validate([
            'servicionombre' => 'required',
        ]);

        // Crear un servicio
        Servicios::create([
            'servicionombre' => $request->servicionombre,
        ]);

        return redirect()->route('servicios.index')
                         ->with('success', 'Servicio creado con éxito.');
    }

    public function show($id)
    {
        $servicio = Servicios::findOrFail($id);
        return view('servicios.show', compact('servicio'));
    }

    public function edit($id)
    {
        $servicio = Servicios::findOrFail($id);
        return view('servicios.edit', compact('servicio'));
    }

    public function update(Request $request, $id)
    {
        // Validaciones
        $request->validate([
            'servicionombre' => 'required',
        ]);

        // Modificar
        $servicio = Servicios::findOrFail($id);
        $servicio->servicionombre = $request->servicionombre;
        $servicio->save();

        return redirect()->route('servicios.index')
                         ->with('success', 'Servicio actualizado con éxito.');
    }

    public function destroy($id)
    {
        // Eliminar
        $servicio = Servicios::findOrFail($id);
        $servicio->delete();

        return redirect()->route('servicios.index')
                         ->with('success', 'Servicio eliminado con éxito.');
    }

    public function mostrarLista()
    {
        $servicios = Servicios::all();
        return view('servicios.lista', compact('servicios'));
    }
    
    public function seleccionarCliente($servicioId)
    {
        $servicio = Servicios::findOrFail($servicioId);
    
        // Definir valores default
        $ticketFecha = Carbon::now()->toDateString(); // Fecha actual
        $ticketHora = Carbon::now()->toTimeString(); // Hora actual
        $ticketEstado = 1; // Estado Inicial
    
        return view('tickets.create', compact('servicio', 'ticketFecha', 'ticketHora', 'ticketEstado'));
    }    
}
