@extends('layouts.app')

@section('title', 'Clientes')

@section('content')
    <div class="container">
        <h1 class="mt-5">Clientes</h1>
        <div class="mb-3">
            <a href="{{ route('clientes.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo Cliente</a>
            <button class="btn btn-primary" onclick="window.location.reload();"><i class="fas fa-sync"></i> Actualizar</button>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Cliente</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Cédula</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->cliente }}</td>
                        <td>{{ $cliente->clientenombre }}</td>
                        <td>{{ $cliente->clientecedula }}</td>
                        <td>
                            <a href="{{ route('clientes.edit', $cliente->cliente) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                            <form id="delete-form-{{ $cliente->cliente }}" action="{{ route('clientes.destroy', $cliente->cliente) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro(a) de eliminar este cliente?')"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>   
@endsection
