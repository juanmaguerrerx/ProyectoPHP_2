<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropForeignKeyFromTable extends Migration
{
    public function up()
    {
        Schema::table('cuotas', function (Blueprint $table) {
            $table->dropForeign('cuotas_ibfk_1');
        });
    }

    public function down()
    {
        // Si necesitas revertir la eliminación de la foreign key, puedes hacerlo aquí.
    }
}
