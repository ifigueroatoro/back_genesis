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
        Schema::create('cotizacions', function (Blueprint $table) {
           $table->bigIncrements('id');   
           $table->date('fechaSolicitud');     
           $table->string('usuario');
           $table->string('solicita');           
           $table->unsignedBigInteger('empresas_id');
           $table->foreign('empresas_id')->references('id')->on('empresas');
          
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotizacions');
    }
};
