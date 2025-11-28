<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Seccion;

class Alumno extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'nombre',
        'correo',
        'fecha_nacimiento',
        'sexo',
        'carrera',
    ];

    public function secciones()
    {
        return $this->belongsToMany(Seccion::class, 'alumno_seccion');
    }
}
