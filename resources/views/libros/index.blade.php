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
    <h1>Libros</h1>
    <a href="{{ route('libros.create') }}" class="btn btn-primary">Añadir Libro</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Fecha de Publicación</th>
                <th>Autor</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($libros as $libro)
                <tr>
                    <td>{{ $libro->id }}</td>
                    <td>{{ $libro->titulo }}</td>
                    <td>{{ $libro->fecha_publicacion }}</td>
                    <td>{{ $libro->autor->nombre }} {{ $libro->autor->apellido }}</td>
                    <td>{{ $libro->precio }}</td>
                    <td>
                        <a href="{{ route('libros.edit', $libro->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('libros.destroy', $libro->id) }}" method="POST" style="display:inline-block;">
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

