@extends('layouts.app')

@section('content')
<h1>Lista de Secciones</h1>

<a href="{{ route('secciones.create') }}" class="btn btn-primary">➕ Nueva Sección</a>

@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Sección</th>
        <th>Aula</th>
        <th>Acciones</th>
    </tr>
    @foreach ($secciones as $seccion)
        <tr>
            <td>{{ $seccion->id }}</td>
            <td>{{ $seccion->seccion }}</td>
            <td>{{ $seccion->aula }}</td>
            <td>
                <a href="{{ route('secciones.show', $seccion) }}">👁️ Ver</a> |
                <a href="{{ route('secciones.edit', $seccion) }}">✏️ Editar</a> |
                <form action="{{ route('secciones.destroy', $seccion) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('¿Eliminar esta sección?')">🗑️ Eliminar</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
@endsection
