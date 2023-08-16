<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
   // use HasFactory;
   protected $fillable = [
       'fechaSolicitud',
       'usuario',//Coordinador o Ejecutivo
       'solicita', // Contacto de la empresa que solicito la cotizaccion
       'empresas_id', // Empresa que solicita       
        'estadoCotizacion',// estadoCot: Pendiente, Aceptada, Rechazada
   ];
}
