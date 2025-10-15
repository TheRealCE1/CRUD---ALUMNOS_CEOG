@extends('layouts.app')

@section('content')
<h2>Nuevo Alumno</h2>

<form action="{{ route('alumnos.store') }}" method="POST">
    @csrf
    @include('alumnos.partials.form', ['btnText' => 'Guardar'])
</form>
@endsection
