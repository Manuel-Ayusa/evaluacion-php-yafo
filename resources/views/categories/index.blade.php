@extends('layouts.app')

@section('title', 'CMDB - Categorias')
    
@section('content')

<h1 class="text-center mt-2 border-bottom pb-3">Categorias</h1>

@if (session('info'))
                    
    <div class="alert  @if(session('info') == 'Algo falló.') alert-danger @else alert-success @endif">
        <strong>{{session('info')}}</strong>
    </div>

@endif

<a href="{{ route('cmdb.create')}}" class="btn btn-info ms-2">Importar registros</a>

<div class="card-body mt-3">
    <table class="table table-striped border table-hover">
        <thead>
            <tr>
                <th class="text-center">Nombre</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $categoria)
                <tr>
                    <td class="ps-2 text-center">{{$categoria['nombre']}}</td>
                    <td class="text-end">
                        <form action="{{ route('cmdb.categoria', $categoria['id']) }}" method="POST">
                            @csrf
                            <input type="hidden" name="nombreCategoria" value="{{$categoria['nombre']}}">
                            <input class="btn btn-success btn-sm" type="submit" value="Ver registros">
                        </form>
                    </td>
                    <td class="text-center">
                        <form action="{{ route('cmdb.export', $categoria['id']) }}" method="POST">
                            @csrf
                            <input type="hidden" name="nombreCategoria" value="{{$categoria['nombre']}}">
                            <input class="btn btn-primary btn-sm" type="submit" value="Exportar registros">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection