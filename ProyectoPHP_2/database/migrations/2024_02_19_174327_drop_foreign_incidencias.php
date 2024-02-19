<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropForeignIncidencias extends Migration
{
    public function up()
    {
        Schema::table('incidencias', function (Blueprint $table) {
            $table->dropForeign('incidencias_cif_cliente_foreign');
        });
    }

    public function down()
    {
        // Si necesitas revertir la eliminación de la foreign key, puedes hacerlo aquí.
    }
}
