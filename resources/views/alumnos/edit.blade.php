@extends('layouts.app')

@section('content')
<h2>Editar Alumno</h2>

<form action="{{ route('alumnos.update', $alumno) }}" method="POST">
    @csrf
    @method('PUT')
    @include('alumnos.partials.form', ['btnText' => 'Actualizar'])
</form>
@endsection
