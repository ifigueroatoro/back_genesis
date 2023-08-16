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
        Schema::create('itemcotizacions', function (Blueprint $table) {
           $table->bigIncrements('id');
           $table->unsignedBigInteger('cot_id');
           $table->foreign('cot_id')->references('id')->on('cotizacions')->onDelete('cascade');
           $table->string('negocioProyecto');
           $table->string('motivo');
           $table->string('tipoUnidad');
           $table->string('tipoCabina');
           $table->string('traccion');
           $table->string('trasmision');          
           $table->unsignedBigInteger('marcas_id');
           $table->foreign('marcas_id')->references('id')->on('marcas'); 
           $table->string('modelo')->nullable();
           $table->string('color');
           $table->string('tipoCombustible');
           $table->string('GPS');
           $table->unsignedBigInteger('comunas_id');
           $table->foreign('comunas_id')->references('id')->on('comunas'); 

           //$table->string('lugarEntrega');
           $table->integer('plazo');
           $table->integer('kmtMensual');
           $table->integer('cantidad');
           $table->string('observaciones');           
           $table->string('tipoCupula')->nullable();
           $table->string('neumaticos')->nullable();
           $table->string('portaEscala')->nullable();
           $table->string('barras')->nullable();
           $table->string('alarmaRobo')->nullable();
           $table->string('sensorRetroceso')->nullable();   
           $table->string('laminasSeguridad')->nullable();           
           $table->string('mallaLuneta')->nullable();
           $table->string('cubrePickup')->nullable();
           $table->string('cajaHerramienta')->nullable();
           $table->string('cajaKitInvierno')->nullable();          
           $table->string('pertiga')->nullable();
           $table->string('cunas')->nullable();
           $table->string('cocoArrastre')->nullable();
           $table->string('segundaRuedaRep')->nullable();
           $table->string('tiroArrastre')->nullable(); 

           //estado de los item de la cotizacion y sus fechas.

           $table->date('fechaEnvioEjecEst')->nullable();
           $table->date('fechaCotValorizada')->nullable();              
           $table->string('folioCotizacion')->nullable();
           $table->date('fechaEnvioCliente')->nullable();
           $table->date('fechaRespuestaCliente')->nullable();
           $table->string('estadoItemsCot')->nullable();
           $table->date('fechaEnvioAceptacion')->nullable();              
           $table->date('fechaEntregaUnidad')->nullable();       
         
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itemcotizacions');
    }
};
