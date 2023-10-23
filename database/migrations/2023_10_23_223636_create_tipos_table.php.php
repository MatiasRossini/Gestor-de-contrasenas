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
        Schema::create('temas', function (Blueprint $table) {
            $table->id("IDD_TIPO");
            $table->string("STR_NOMBRE", 100);
            $table->string("STR_DESCRIPCION", 512);
            $table->bigInteger("INT_NIVEL");
            $table->float("FLT_VALOR");
            $table->date("DTE_ALTA");
            $table->date("DTE_MOD");
            $table->date("DTE_BAJA")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temas');
    }
};
