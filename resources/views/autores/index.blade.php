@extends('layout')

@section('content')
<style>
    .container {
        margin-top: 20px;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
    }

    h1 {
        margin-bottom: 20px;
        text-align: center;
    }

    .btn-primary {
        margin-bottom: 15px;
    }

    .table {
        background-color: #f8f9fa;
        border-radius: 0.5rem;
        overflow: hidden;
    }

    .table th, .table td {
        padding: 12px;
        text-align: center;
    }

    .table thead {
        background-color: #007bff;
        color: white;
    }

    .btn-warning {
        margin-right: 5px;
    }

    .btn-danger {
        margin-left: 5px;
    }

    form {
        display: inline;
    }
</style>

<div class="container">
    <h1>Autores</h1>
    <a href="{{ route('autores.create') }}" class="btn btn-primary">Añadir Autor</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Fecha de Nacimiento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($autores as $autor)
                <tr>
                    <td>{{ $autor->id }}</td>
                    <td>{{ $autor->nombre }}</td>
                    <td>{{ $autor->apellido }}</td>
                    <td>{{ $autor->fecha_nacimiento }}</td>
                    <td>
                        <a href="{{ route('autores.edit', $autor->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('autores.destroy', $autor->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection


