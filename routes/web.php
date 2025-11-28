<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\SeccionController;

Route::resource('alumnos', AlumnoController::class);
Route::resource('secciones', SeccionController::class);

Route::post('/secciones/{seccion}/inscribir',
    [SeccionController::class, 'inscribirAlumno'])->name('secciones.inscribir');
