<!-- resources/views/clientes/create.blade.php -->

@extends('layouts.app')

@section('title', 'Crear Cliente')

@section('content')
    <div class="container">
        <h1 class="mt-5">Crear Cliente</h1>

        <form action="{{ route('clientes.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="clientenombre">Nombre del Cliente:</label>
                <input type="text" name="clientenombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="clientecedula">Cédula:</label>
                <input type="text" name="clientecedula" class="form-control" pattern="\d*" title="Por favor ingrese solo números" required>
            </div>            
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('clientes.index') }}" class="btn btn-success">Cancelar</a>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('cliente').focus();
        });
    </script>    
@endsection
