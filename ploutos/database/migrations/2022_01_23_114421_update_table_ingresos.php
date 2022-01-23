<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableIngresos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('ingresos', function(Blueprint $table) {
            $table->renameColumn('cantidad_ingresada', 'cantidad');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('ingresos', function(Blueprint $table) {
            $table->renameColumn('cantidad', 'cantidad_ingresada');
        });
    }
}
