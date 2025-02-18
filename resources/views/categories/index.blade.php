@extends('layouts.app')

@section('title', 'CMDB - Categorias')
    
@section('content')

<h1 class="text-center mt-2">Categorias</h1>

{{-- <ul class="list-group">

    @foreach ($categorias as $categoria)
    
        <a href="{{ route('cmdb.categoria', $categoria['id']) }}?categoria={{ $categoria['nombre'] }}" class="text-decoration-none"><li class="mt-2 list-group-item btn btn-primary">{{$categoria['nombre']}}</li></a>   

    @endforeach

</ul> --}}

@if (session('info'))
                    
    <div class="alert  @if(session('info') == 'Algo falló.') alert-danger @else alert-success @endif">
        <strong>{{session('info')}}</strong>
    </div>

@endif

<a href="{{ route('cmdb.create')}}" class="btn btn-info ">Importar registros</a>

<div class="card-body mt-3">
    <table class="table table-striped border">
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
                        <a href="{{ route('cmdb.categoria', $categoria['id']) }}?categoria={{$categoria['nombre']}}" class="btn btn-success">Ver registros</a>
                    </td>
                    <td class="text-end">
                        <a href="{{ route('cmdb.export', $categoria['id']) }}?categoria={{$categoria['nombre']}}" class="btn btn-primary">Exportar registros</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection