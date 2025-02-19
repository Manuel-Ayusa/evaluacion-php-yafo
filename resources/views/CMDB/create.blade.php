@extends('layouts.app')

@section('title', 'Importar CMDB')

@section('content')
    
<h1 class="text-center mt-2 border-bottom pb-3">Importar Archivo XLS</h1>

<div class="card-body w-50 mx-auto mt-4">
    <form action="{{ route('cmdb.import') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="file" class="form-label">Seleccionar archivo XLS:</label>
            <input type="file" name="file" id="file" class="form-control" required>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <div class="text-center">
            <button type="submit" class="btn btn-primary w-100">
                Subir Archivo
            </button>
        </div>
    </form>
</div>
