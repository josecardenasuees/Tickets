<!-- resources/views/servicios/create.blade.php -->

@extends('layouts.app')

@section('title', 'Crear Servicio')

@section('content')
    <div class="container">
        <h1 class="mt-5">Crear Servicio</h1>

        <form action="{{ route('servicios.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="servicionombre">Nombre del Servicio:</label>
                <input type="text" name="servicionombre" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('servicios.index') }}" class="btn btn-success">Cancelar</a>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('servicio').focus();
        });
    </script>    
@endsection
