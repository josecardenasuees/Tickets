<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;

class ClientesController extends Controller
{
    public function index()
    {
        $clientes = Clientes::all();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'clientenombre' => 'required',
            'clientecedula' => 'required|unique:Clientes',
        ]);

        // Crear cliente
        Clientes::create([
            'clientenombre' => $request->clientenombre,
            'clientecedula' => $request->clientecedula,
        ]);

        return redirect()->route('clientes.index')
                         ->with('success', 'Cliente creado con éxito.');
    }

    public function show($id)
    {
        $cliente = Clientes::find($id);
        return view('clientes.show', compact('cliente'));
    }

    public function edit($id)
    {
        $cliente = Clientes::find($id);
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'clientenombre' => 'required',
            'clientecedula' => 'required|unique:Clientes,clientecedula,'.$id.',cliente',
        ]);

        // Actualizar cliente
        $cliente = Clientes::find($id);
        $cliente->clientenombre = $request->clientenombre;
        $cliente->clientecedula = $request->clientecedula;
        $cliente->save();

        return redirect()->route('clientes.index')
                         ->with('success', 'Cliente actualizado con éxito.');
    }

    public function destroy($id)
    {
        // Eliminar cliente
        $cliente = Clientes::find($id);
        $cliente->delete();

        return redirect()->route('clientes.index')
                         ->with('success', 'Cliente eliminado con éxito.');
    }  
}
