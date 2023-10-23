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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id("IDD_USUARIO");
            $table->string("STR_USUARIO", 255);
            $table->boolean("STR_USUARIO");
            $table->string("STR_NOMBRE", 100);
            $table->string("STR_APELLIDO", 100);
            $table->date("DTE_FECHA_NAC");
            $table->string("STR_CORREO", 255);
            $table->string("STR_CONTRASENA_US", 512);
            $table->foreignId("IDD_TIPO");
            $table->string("LNK_FOTO", 512);
            $table->foreginId("IDD_ULT_TEMA");
            $table->dateTime("DTC_ULT_CONEXION");
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
        Schema::dropIfExists('usuarios');
    }
};
