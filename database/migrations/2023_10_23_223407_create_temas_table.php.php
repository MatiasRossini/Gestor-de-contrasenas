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
            $table->id("IDD_TEMA");
            $table->string("STR_NOMBRE", 100);
            $table->string("LNK_FONDO", 512);
            $table->string("STR_COLOR_A", 100);
            $table->string("STR_COLOR_B", 100);
            $table->string("STR_COLOR_C", 100);
            $table->foreignId("IDD_CREADOR");
            $table->foreignId("IDD_TIPO");
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
