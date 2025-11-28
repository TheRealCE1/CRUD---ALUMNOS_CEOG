@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-8">

    {{-- Mensaje de éxito --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Título --}}
    <h1 class="text-3xl font-bold mb-4">Detalles de la Sección</h1>

    {{-- Datos de la sección --}}
    <div class="bg-white shadow rounded p-4 mb-6">
        <p><strong>Sección:</strong> {{ $seccion->seccion }}</p>
        <p><strong>Aula:</strong> {{ $seccion->aula }}</p>
    </div>

    {{-- Formulario para inscribir alumno --}}
    <div class="bg-white shadow rounded p-4 mb-6">
        <h2 class="text-xl font-semibold mb-3">Inscribir Alumno</h2>

        {{-- Mostrar errores --}}
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-3">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('secciones.inscribir', $seccion) }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block mb-1">Seleccionar Alumno</label>
                <select name="alumno_id" class="border rounded w-full p-2">
                    <option value="">-- Selecciona un alumno --</option>
                    @foreach ($alumnos as $alumno)
                        <option value="{{ $alumno->id }}">{{ $alumno->nombre }} - {{ $alumno->codigo }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                Inscribir
            </button>
        </form>
    </div>

    {{-- Alumnos inscritos --}}
    <div class="bg-white shadow rounded p-4 mb-6">
        <h2 class="text-xl font-semibold mb-3">Alumnos Inscritos</h2>

        @if ($seccion->alumnos->isEmpty())
            <p class="text-gray-500">No hay alumnos inscritos en esta sección.</p>
        @else
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-left">
                        <th class="border px-3 py-2">ID</th>
                        <th class="border px-3 py-2">Nombre</th>
                        <th class="border px-3 py-2">Código</th>
                        <th class="border px-3 py-2">Correo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($seccion->alumnos as $alumno)
                        <tr>
                            <td class="border px-3 py-2">{{ $alumno->id }}</td>
                            <td class="border px-3 py-2">{{ $alumno->nombre }}</td>
                            <td class="border px-3 py-2">{{ $alumno->codigo }}</td>
                            <td class="border px-3 py-2">{{ $alumno->correo }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    {{-- Botón regresar --}}
    <a href="{{ route('secciones.index') }}" 
       class="inline-block bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded">
        Regresar
    </a>
</div>
@endsection
