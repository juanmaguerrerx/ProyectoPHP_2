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
        Schema::create('tbl_provincias', function (Blueprint $table) {
            $table->comment('Provincias de españa; 99 para seleccionar a Nacional');
            $table->char('cod', 2)->default('00')->primary()->comment('Código de la provincia de dos digitos');
            $table->string('nombre', 50)->default('')->index('nombre')->comment('Nombre de la provincia');
            $table->tinyInteger('comunidad_id')->index('FK_ComunidadAutonomaProv')->comment('Código de la comunidad a la que pertenece');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_provincias');
    }
};
