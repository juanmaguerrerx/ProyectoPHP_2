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
        Schema::create('cuotas', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('cif_cliente')->index('cif_cliente');
            $table->string('concepto');
            $table->date('fecha_emision');
            $table->double('importe', 8, 2);
            $table->boolean('pagada')->default(false);
            $table->date('fecha_pago')->nullable();
            $table->string('notas')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuotas');
    }
};
