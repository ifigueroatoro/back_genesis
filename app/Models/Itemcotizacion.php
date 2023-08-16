<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itemcotizacion extends Model
{
    //use HasFactory;
    protected $fillable=[

        'cot_id',
        'negocioProyecto',
        'motivo',
        'tipoUnidad',
        'tipoCabina',
        'traccion',
        'trasmision',
        'marcas_id',
        'modelo',
        'color',        
        'tipoCombustible',
        'GPS',        
        'comunas_id',
        'plazo',
        'kmtMensual',
        'cantidad',
        'observaciones',

                       
        'tipoCupula',
        'neumaticos',
        'portaEscala',         
        'barras',
        'alarmaRobo',
        'sensorRetroceso',      
        'laminasSeguridad',       
        'mallaLuneta',
        'cubrePickup',
        'cajaHerramienta',
        'cajaKitInvierno',
        'pertiga',
        'cunas',
        'cocoArrastre',
        'segundaRuedaRep',
        'tiroArrastre',
        'fechaEnvioEjecEst',//fechaEnvioEjecEst cuando se envia formulario a Ejecutivo de estudio
        'fechaCotValorizada',//fechaCotValorizada: cuando ejec de Estudio valoriza y envia a 
                            // Coordinador o Ejecutivo, la cotizacion en formato pdf.
        'folioCotizacion',// numero de folio de la cotizacion
        'fechaEnvioCliente',//fechaEnvioCliente: cuando se envia la cotizacion a cliente
        'fechaRespuestaCliente',//fechaRespuestaCliente: cuando cliente da su aceptacion o rechazo
        'estadoItemsCot',// estadoCot: Pendiente, Aceptada, Rechazada
        'fechaEnvioAceptacion',   
        //fechaEnvioAceptacion:cuando se envia a ejec de estudio la aceptacion de la cotizacion
        'fechaEntregaUnidad',//fechaEntregaUnidad: cuando se entre la unidad a cliente.
       
    ];
}
