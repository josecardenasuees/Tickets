<!-- resources/views/servicios/lista.blade.php -->
@extends('layouts.app')

@section('title', 'Servicios')

@section('content')
<div class="container">
    <h1>Servicios Disponibles</h1>
    <div class="row">
        @foreach($servicios as $servicio)
        <div class="col-md-4 mb-3">
            <a href="{{ route('tickets.create', ['servicio' => $servicio->id]) }}" class="btn btn-primary btn-lg btn-block">{{ $servicio->servicionombre }}</a>
        </div>
        @endforeach
    </div>
</div>
@endsection
