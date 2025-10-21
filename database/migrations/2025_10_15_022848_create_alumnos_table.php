<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('alumnos', function (Blueprint $table) {
        $table->id();
        $table->string('codigo')->unique();
        $table->string('nombre');
        $table->string('correo')->unique();
        $table->date('fecha_nacimiento')->nullable();
        $table->enum('sexo', ['M','F','O'])->nullable();
        $table->string('carrera')->nullable();
        $table->timestamps();
    });
}
    public function down(): void
    {
        Schema::dropIfExists('alumnos');
    }
};
