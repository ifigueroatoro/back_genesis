<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
   // use HasFactory;


     protected $fillable = [
       'rut','nombreEmp','razonSocial','Direccion',
       'comunas_id','telefono' 

       ];
}
