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
        Schema::create('paises', function (Blueprint $table) {
            $table->unsignedSmallInteger('id')->primary();
            $table->char('iso2', 2)->unique('iso2');
            $table->char('iso3', 3)->unique('iso3');
            $table->unsignedSmallInteger('prefijo');
            $table->string('nombre', 100);
            $table->string('continente', 16)->nullable();
            $table->string('subcontinente', 32)->nullable();
            $table->string('iso_moneda', 3)->nullable();
            $table->string('nombre_moneda', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paises');
    }
};
