@extends('layouts.app')

@section('title', 'Modificar Cliente')

@section('content')
    <div class="container">
        <h1 class="mt-5">Modificar Cliente</h1>

        <form action="{{ route('clientes.update', $cliente->cliente) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="cliente">Cliente:</label>
                <input type="text" name="cliente" class="form-control" value="{{ $cliente->cliente }}" required>
            </div>

            <div class="form-group">
                <label for="clientenombre">Nombre del Cliente:</label>
                <input type="text" name="clientenombre" class="form-control" value="{{ strtoupper($cliente->clientenombre) }}" required>
            </div>

            <div class="form-group">
                <label for="clientecedula">Cédula:</label>
                <input type="text" name="clientecedula" class="form-control" value="{{ $cliente->clientecedula }}" pattern="\d*" title="Por favor ingrese solo números" required>
            </div> 


            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('clientes.index') }}" class="btn btn-success">Cancelar</a>            
        </form>
    </div>
@endsection
