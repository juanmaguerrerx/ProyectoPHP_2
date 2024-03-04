<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class AddTimestampsToAllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // $tables = DB::select('SHOW TABLES');

        // foreach ($tables as $table) {
        //     $tableName = reset($table);

        //     Schema::table($tableName, function ($table) {
        //         $table->timestamps(); // Agrega las columnas created_at y updated_at
        //     });
        // }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // No necesitamos revertir la migración en este caso
    }
}