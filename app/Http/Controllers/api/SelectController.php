<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comuna;
use App\Models\Empresa;
use App\Models\Marca;

class SelectController extends Controller
{
       public function listaComunas()
   {
    $comuna=Comuna::all();
    return response()->json([
        'status'=>200,
        'comuna'=>$comuna,
    ]);
}

public function listaEmpresas()
   {
    $empresa=Empresa::all();
    return response()->json([
        'status'=>200,
        'empresa'=>$empresa,
    ]);
}

public function listaMarcas()
   {
    $marca=Marca::all();
    return response()->json([
        'status'=>200,
        'marca'=>$marca,
    ]);
}

}
