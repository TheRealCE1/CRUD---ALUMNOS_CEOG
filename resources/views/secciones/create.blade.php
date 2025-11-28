@extends('layouts.app')

@section('content')
<h2>Nueva Sección</h2>

<form action="{{ route('secciones.store') }}" method="POST">
    @csrf
    <label for="seccion">Sección:</label>
    <input type="text" name="seccion" id="seccion" required>
    <br>
    <label for="aula">Aula:</label>
    <input type="text" name="aula" id="aula" required>
    <br>
    <button type="submit">Guardar</button>
</form>
@endsection
