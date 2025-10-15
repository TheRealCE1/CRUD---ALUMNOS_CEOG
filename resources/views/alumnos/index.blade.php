@extends('layouts.app')

@section('content')
<h1>Lista de Alumnos</h1>

<a href="{{ route('alumnos.create') }}" class="btn btn-primary">➕ Nuevo Alumno</a>

@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Código</th>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Carrera</th>
        <th>Acciones</th>
    </tr>
    @foreach ($alumnos as $alumno)
        <tr>
            <td>{{ $alumno->id }}</td>
            <td>{{ $alumno->codigo }}</td>
            <td>{{ $alumno->nombre }}</td>
            <td>{{ $alumno->correo }}</td>
            <td>{{ $alumno->carrera }}</td>
            <td>
                <a href="{{ route('alumnos.show', $alumno) }}">👁️ Ver</a> |
                <a href="{{ route('alumnos.edit', $alumno) }}">✏️ Editar</a> |
                <form action="{{ route('alumnos.destroy', $alumno) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('¿Eliminar este alumno?')">🗑️ Eliminar</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

{{ $alumnos->links() }}
@endsection
