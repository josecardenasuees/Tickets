<!-- resources/views/nuevoTicket/seleccion.blade.php -->
@extends('layouts.public')

@section('content')
<div class="container">
    <form method="POST" action="{{ route('autoticket.guardar') }}">
    @csrf       
            <div class="form-group">
                <label for="ticketfecha">Fecha:</label>
                <input disabled type="text" name="ticketfecha" class="form-control" required id="ticketfecha" value="{{ date('Y-m-d') }}">
            </div>
            <div class="form-group">
                <label for="tickethora">Hora:</label>
                <input disabled type="text" name="tickethora" class="form-control" required id="tickethora" value="{{ date('H:i') }}">            
            </div>
            <div class="form-group">
                <label for="cliente">Ingrese su cédula:</label>                
                 <input type="text" name="cedula" class="form-control" id="cedula">                
            </div>
            <div class="form-group">
                <label for="servicio">Servicio:</label>
                <select name="servicio" class="form-control" required id="servicio">
                    <option value="">Seleccione un servicio</option>
                    @foreach($servicios as $servicio)
                        <option value="{{ $servicio->servicio }}">{{ $servicio->servicionombre }}</option>
                    @endforeach
                    <input type="hidden" name="servicio_real" id="servicio_real">                    
                </select>
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-primary">Generar</button>
            <a href="{{ route('tickets.index') }}" class="btn btn-success">Cancelar</a>
            </div>
    </form>
</div>
@endsection
