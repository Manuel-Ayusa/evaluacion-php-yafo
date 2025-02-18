@extends('layouts.app')

@section('title', 'CMDB - Listado')
    
@section('content')

<h1 class="text-center mt-2">Registros</h1>

<a class="btn btn-primary" href="{{url()->previous()}}">Volver</a>

<div class="card-body mt-3">
    <table class="table table-striped border">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Fecha de creación</th>
                <th>Activado</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cmdb as $item)
                <tr>
                    <td>{{$item['identificador']}}</td>
                    <td>{{$item['nombre']}}</td>
                    <td>{{$item['fecha_creacion']}}</td>
                    <td>{{$item['activado']}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection