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
        Schema::create('tbl_comunidadesautonomas', function (Blueprint $table) {
            $table->comment('Afiliados de alta');
            $table->tinyInteger('id')->default(0)->primary();
            $table->string('nombre', 50)->default('')->index('nombre');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_comunidadesautonomas');
    }
};
