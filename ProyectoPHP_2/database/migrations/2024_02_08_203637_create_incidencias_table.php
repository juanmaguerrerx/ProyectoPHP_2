<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidencias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cif_cliente');
            $table->string('persona_contacto');
            $table->string('telefono_contacto', 20);
            $table->text('descripcion');
            $table->string('correo');
            $table->string('direccion');
            $table->string('poblacion');
            $table->string('codigo_postal', 10);
            $table->integer('provincia');
            $table->char('estado');
            $table->date('fecha_creacion');
            $table->string('dni_empleado');
            $table->date('fecha_realizacion');
            $table->text('anotaciones_anteriores');
            $table->text('anotaciones_posteriores');
            $table->string('fichero_resumen')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incidencias');
    }
};
