<!-- resources/views/servicios/create.blade.php -->

@extends('layouts.app')

@section('title', 'Crear Ticket')

@section('content')
    <div class="container">
        <h1 class="mt-5">Crear Ticket</h1>

        <form action="{{ route('tickets.store') }}" method="post">
            @csrf       
            <div class="form-group">
                <label for="ticketfecha">Fecha:</label>
                <input type="date" name="ticketfecha" class="form-control" required id="ticketfecha" value="{{ date('Y-m-d') }}">
            </div>
            <div class="form-group">
                <label for="tickethora">Hora:</label>
                <input type="time" name="tickethora" class="form-control" required id="tickethora" value="{{ date('H:i') }}">            
            </div>
            <div class="form-group">
                <label for="cliente">Cliente:</label>
                <select name="cliente" class="form-control" required id="cliente">
                    <option value="">Seleccione un cliente</option>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->cliente }}">{{ $cliente->clientenombre }}</option>
                    @endforeach
                    <input type="hidden" name="cliente_real" id="cliente_real">
                </select>
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
                <label for="ticketestado">Estado:</label>
                <select name="ticketestado" class="form-control" required id="ticketestado">
                    <option value="1">Activo</option>
                    <option value="2">Realizado</option>
                    <option value="3">Anulado</option>
                </select>
                <input type="hidden" name="ticketestado_real" id="ticketestado_real">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('tickets.index') }}" class="btn btn-success">Cancelar</a>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('ticketfecha').focus();
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#cliente').change(function() {
                $('#cliente_real').val($(this).val());
            });
        });
    </script>
    
@endsection
