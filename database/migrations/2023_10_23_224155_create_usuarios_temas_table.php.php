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
        Schema::create('usuarios_temas', function (Blueprint $table) {
            $table->id("IDD_USUARIO_TEMA");
            $table->foreignId("IDD_USUARIO");
            $table->foreignId("IDD_TEMA");
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
        Schema::dropIfExists('usuarios_temas');
    }
};
