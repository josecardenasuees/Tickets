@extends('layouts.app')

@section('title', 'Modificar Servicio')

@section('content')
    <div class="container">
        <h1 class="mt-5">Modificar Servicio</h1>

        <form action="{{ route('servicios.update', $servicio->servicio) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="servicio">Servicio:</label>
                <input type="text" name="servicio" class="form-control" value="{{ $servicio->servicio }}" readonly>
            </div>

            <div class="form-group">
                <label for="servicionombre">Nombre del Servicio:</label>
                <input type="text" name="servicionombre" class="form-control" value="{{ $servicio->servicionombre }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('servicios.index') }}" class="btn btn-success">Cancelar</a>            
        </form>
    </div>
@endsection
