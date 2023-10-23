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
        Schema::create('contrasenas_grupos', function (Blueprint $table) {
            $table->id("IDD_CONTRASENA_GRUPO");
            $table->foreignId("IDD_CONTRASENA");
            $table->foreignId("IDD_GRUPO");
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
        Schema::dropIfExists('contrasenas_grupos');
    }
};

