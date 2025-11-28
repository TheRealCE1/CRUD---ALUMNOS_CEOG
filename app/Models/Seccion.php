<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Alumno;

class Seccion extends Model
{
    use HasFactory;

    protected $fillable = ['seccion', 'aula'];

    protected $table = 'secciones'; // Solo necesario si la tabla no sigue la convención

    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class, 'alumno_seccion');
    }
}
