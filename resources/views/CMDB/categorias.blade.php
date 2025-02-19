@extends('layouts.app')

@section('title', 'CMDB - Listado')
    
@section('content')

<h1 class="text-center mt-2 border-bottom pb-3">Registros de la categoria: {{$categoria}}</h1>

<a class="btn btn-primary my-2" href="{{url()->previous()}}">Volver</a>

<div class="card-body">
    <table class="table table-striped border table-hover">
        <thead>
            <tr>
                <th class="border">ID</th>
                <th class="border">Nombre</th>
                <th class="border">Fecha de creación</th>
                <th class="border">Activado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cmdb as $item)
                <tr>
                    <td class="border">{{$item['identificador']}}</td>
                    <td class="border">{{$item['nombre']}}</td>
                    <td class="border">{{$item['fecha_creacion']}}</td>
                    <td class="border">{{$item['activado']}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection