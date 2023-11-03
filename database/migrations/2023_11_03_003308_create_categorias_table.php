<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id('IDD_CATEGORIA');
            $table->string('STR_CATEGORIA', 100);
            $table->string('STR_DESCRIPCION', 512);
            $table->mediumInteger('INT_NIVEL');
            $table->strin('FLT_VALOR', 255);
            $table->date('DTE_ALTA');
            $table->date('DTE_MOD');
            $table->date('DTE_BAJA')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};
