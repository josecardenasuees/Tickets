@extends('layouts.app')

@section('title', 'Tickets')

@section('content')
    <div class="container">
        <h1 class="mt-5">Tickets</h1>
        <div class="mb-3">
            <a href="{{ route('tickets.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo Ticket</a>
            <button class="btn btn-primary" onclick="window.location.reload();"><i class="fas fa-sync"></i> Actualizar</button>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Número</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Servicio</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->ticket }}</td>
                        <td>{{ \Carbon\Carbon::parse($ticket->TicketFecha)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($ticket->TicketHora)->format('H:i') }}</td>
                        <td style="display: none;">{{ $ticket->servicio  }}</td>
                        <td>{{ $ticket->ser->servicionombre }}</td>
                        <td style="display: none;">{{ $ticket->cliente  }}</td>
                        <td>{{ $ticket->cli->clientenombre }}</td>
                        <td>{{ $ticket->cli->clientecedula }}</td>
                        <td>
                            @if($ticket->TicketEstado == 1)
                                Activo
                            @elseif($ticket->TicketEstado == 2)
                                Realizado
                            @elseif($ticket->TicketEstado == 3)
                                Anulado
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('tickets.edit', $ticket->Ticket) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                            <form id="delete-form-{{ $ticket->Ticket }}" action="{{ route('tickets.destroy', $ticket->Ticket) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro(a) de eliminar este ticket?')"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>   
@endsection
