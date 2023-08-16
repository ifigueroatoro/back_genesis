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
        Schema::create('empresas', function (Blueprint $table) {
           $table->bigIncrements('id');   
           $table->date('rut');     
           $table->string('nombreEmp');
           $table->string('razonSocial');
           $table->string('Direccion');
           $table->unsignedBigInteger('comunas_id');
           $table->foreign('comunas_id')->references('id')->on('comunas');
           $table->string('telefono');
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
