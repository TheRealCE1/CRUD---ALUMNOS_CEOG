@extends('layouts.app')

@section('content')
<h1>Detalles de la Sección</h1>

<p><strong>Sección:</strong> {{ $seccion->seccion }}</p>
<p><strong>Aula:</strong> {{ $seccion->aula }}</p>

<h2>Alumnos Inscritos</h2>
<ul>
    @forelse ($seccion->alumnos as $alumno)
        <li>{{ $alumno->nombre }} ({{ $alumno->codigo }})</li>
    @empty
        <li>No hay alumnos inscritos.</li>
    @endforelse
</ul>

<h2>Inscribir Alumno</h2>
<form action="{{ route('secciones.inscribir', $seccion) }}" method="POST">
    @csrf
    <label for="alumno_id">Seleccionar Alumno:</label>
    <select name="alumno_id" id="alumno_id" required>
        <option value="">-- Seleccionar --</option>
        @foreach ($alumnos as $alumno)
            <option value="{{ $alumno->id }}">{{ $alumno->nombre }} ({{ $alumno->codigo }})</option>
        @endforeach
    </select>
    <br>
    <button type="submit">Inscribir</button>
</form>

<a href="{{ route('secciones.index') }}">Volver a la lista</a>
@endsection
