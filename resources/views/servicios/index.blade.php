@extends('layouts.app')

@section('title', 'Servicios')

@section('content')
    <div class="container">
        <h1 class="mt-5">Servicios</h1>
        <div class="mb-3">
            <a href="{{ route('servicios.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo Servicio</a>
            <button class="btn btn-primary" onclick="window.location.reload();"><i class="fas fa-sync"></i> Actualizar</button>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Servicio</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($servicios as $servicio)
                    <tr>
                        <td>{{ $servicio->servicio }}</td>
                        <td>{{ $servicio->servicionombre }}</td>
                        <td>
                            <a href="{{ route('servicios.edit', $servicio->servicio) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                            <form id="delete-form-{{ $servicio->servicio }}" action="{{ route('servicios.destroy', $servicio->servicio) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro(a) de eliminar este servicio?')"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>   
@endsection