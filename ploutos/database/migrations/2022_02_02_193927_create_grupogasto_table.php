<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupogastoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupogasto', function (Blueprint $table) {
            $table->id();
            $table->string('grupo');
            $table->bigInteger('gasto_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('gasto_id')->references('id')->on('gastos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupogasto');
    }
}
