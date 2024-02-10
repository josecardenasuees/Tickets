@extends('layouts.app')

@section('title', 'Modificar Ticket')

@section('content')
    <div class="container">
        <h1 class="mt-5">Modificar Ticket</h1>

        <form action="{{ route('tickets.update', $ticket->ticket) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="ticket">Ticket:</label>
                <input type="text" name="ticket" class="form-control" value="{{ $ticket->ticket }}" required>
            </div>
            <div class="form-group">
                <label for="cliente">Cliente:</label>
                    <select name="cliente" id="cliente">
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->cliente }}" {{ $cliente->cliente == $ticket->cliente ? 'selected' : '' }}>{{ $cliente->clientenombre }}</option>
                        @endforeach
                    </select>
            </div>
            <div class="form-group">
                <label for="servicio">Servicio:</label>
                    <select name="servicio" id="servicio">
                    @foreach($servicios as $servicio)
                        <option value="{{ $servicio->servicio }}" {{ $servicio->servicio == $ticket->servicio ? 'selected' : '' }}>{{ $servicio->servicionombre }}</option>
                    @endforeach
                </select>            
            </div>
            <div class="form-group">
                <label for="ticketfecha">Fecha:</label>
                <input type="text" name="ticketfecha" class="form-control" value="{{ $ticket->ticketfecha }}" required>
            </div>
            <div class="form-group">
                <label for="tickethora">Hora:</label>
                <input type="text" name="tickethora" class="form-control" value="{{ $ticket->tickethora }}" required>
            </div>
            <div class="form-group">
                <label for="ticketestado">Estado:</label>
                    <select name="TicketEstado" id="TicketEstado">
                        <option value="1" {{ $ticket->TicketEstado == 1 ? 'selected' : '' }}>Activo</option>
                        <option value="2" {{ $ticket->TicketEstado == 2 ? 'selected' : '' }}>Realizado</option>
                        <option value="3" {{ $ticket->TicketEstado == 3 ? 'selected' : '' }}>Anulado</option>
                    </select>
             </div>            

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('tickets.index') }}" class="btn btn-success">Cancelar</a>            
        </form>
    </div>   
@endsection
