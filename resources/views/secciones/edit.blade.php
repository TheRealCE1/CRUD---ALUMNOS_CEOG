@extends('layouts.app')

@section('content')
<h2>Editar Sección</h2>

<form action="{{ route('secciones.update', $seccion) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="seccion">Sección:</label>
    <input type="text" name="seccion" id="seccion" value="{{ $seccion->seccion }}" required>
    <br>
    <label for="aula">Aula:</label>
    <input type="text" name="aula" id="aula" value="{{ $seccion->aula }}" required>
    <br>
    <button type="submit">Actualizar</button>
</form>
@endsection
