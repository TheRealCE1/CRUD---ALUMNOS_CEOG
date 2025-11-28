<?php

namespace App\Http\Controllers;

use App\Models\Seccion;
use App\Models\Alumno;
use Illuminate\Http\Request;

class SeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $secciones = Seccion::all();
        return view('secciones.index', compact('secciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('secciones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'seccion' => 'required|string|max:255',
            'aula' => 'required|string|max:255',
        ]);

        Seccion::create($validated);

        return redirect()->route('secciones.index')
            ->with('success', 'Sección creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Seccion $seccion)
    {
        $alumnos = Alumno::all();
        return view('secciones.show', compact('seccion', 'alumnos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seccion $seccion)
    {
        return view('secciones.edit', compact('seccion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Seccion $seccion)
    {
        $validated = $request->validate([
            'seccion' => 'required|string|max:255',
            'aula' => 'required|string|max:255',
        ]);

        $seccion->update($validated);

        return redirect()->route('secciones.index')
            ->with('success', 'Sección actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seccion $seccion)
    {
        $seccion->delete();

        return redirect()->route('secciones.index')
            ->with('success', 'Sección eliminada correctamente.');
    }


    /**
     * Relacionar un alumno con la sección
     */
    public function inscribirAlumno(Request $request, Seccion $seccion)
    {
        $request->validate([
            'alumno_id' => 'required|exists:alumnos,id',
        ]);

        // Evitar duplicado
        if (!$seccion->alumnos()->where('alumno_id', $request->alumno_id)->exists()) {
            $seccion->alumnos()->attach($request->alumno_id);
        }

        return redirect()->route('secciones.show', $seccion)
            ->with('success', 'Alumno inscrito correctamente.');
    }
}
