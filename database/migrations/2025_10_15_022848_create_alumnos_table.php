<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('alumnos', function (Blueprint $table) {
        $table->id(); // ID autoincrementable
        $table->string('codigo')->unique(); // Código único
        $table->string('nombre');           // Nombre del alumno
        $table->string('correo')->unique(); // Correo único
        $table->date('fecha_nacimiento')->nullable(); // Fecha de nacimiento opcional
        $table->enum('sexo', ['M','F','O'])->nullable(); // M=Masculino, F=Femenino, O=Otro
        $table->string('carrera')->nullable(); // Carrera del alumno
        $table->timestamps(); // created_at y updated_at
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnos');
    }
};
