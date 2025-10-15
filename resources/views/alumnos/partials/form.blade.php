<div class="mb-3">
    <label>Código</label>
    <input type="text" name="codigo" class="form-control" value="{{ old('codigo', $alumno->codigo ?? '') }}">
</div>

<div class="mb-3">
    <label>Nombre</label>
    <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $alumno->nombre ?? '') }}">
</div>

<div class="mb-3">
    <label>Correo</label>
    <input type="email" name="correo" class="form-control" value="{{ old('correo', $alumno->correo ?? '') }}">
</div>

<div class="mb-3">
    <label>Fecha de nacimiento</label>
    <input type="date" name="fecha_nacimiento" class="form-control" value="{{ old('fecha_nacimiento', $alumno->fecha_nacimiento ?? '') }}">
</div>

<div class="mb-3">
    <label>Sexo</label>
    <select name="sexo" class="form-control">
        <option value="">Seleccione</option>
        <option value="M" @selected(old('sexo', $alumno->sexo ?? '') == 'M')>Masculino</option>
        <option value="F" @selected(old('sexo', $alumno->sexo ?? '') == 'F')>Femenino</option>
        <option value="O" @selected(old('sexo', $alumno->sexo ?? '') == 'O')>Otro</option>
    </select>
</div>

<div class="mb-3">
    <label>Carrera</label>
    <input type="text" name="carrera" class="form-control" value="{{ old('carrera', $alumno->carrera ?? '') }}">
</div>

<button type="submit" class="btn btn-success">{{ $btnText }}</button>
<a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Cancelar</a>
