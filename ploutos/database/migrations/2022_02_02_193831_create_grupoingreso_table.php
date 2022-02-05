<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupoingresoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupoingreso', function (Blueprint $table) {
            $table->id();
            $table->string('grupo');
            $table->bigInteger('ingreso_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('ingreso_id')->references('id')->on('ingresos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupoingreso');
    }
}
