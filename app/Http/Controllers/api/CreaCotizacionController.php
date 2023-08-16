<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cotizacion;
use App\Models\Itemcotizacion;
use App\Models\Estadocotizacion;
use App\Models\Empresa;
use App\Models\Marca;
use App\Models\Comuna;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CreaCotizacionController extends Controller
{
   public function creaCotizacion(Request $request)
   {
        $data=$request->all();
        $lastid=Cotizacion::create($data)->id; 


    if($request !=null){
        foreach($request[0] as $key=> $item)
        {
            $crea=new Itemcotizacion;
            $crea->cot_id=$lastid;
            $crea->negocioProyecto=$item['negocioProyecto'];
            $crea->motivo=$item['motivo'];
            $crea->tipoUnidad=$item['tipoUnidad'];
            $crea->tipoCabina=$item['tipoCabina'];
            $crea->traccion=$item['traccion'];
            $crea->trasmision=$item['trasmision'];
            $crea->marcas_id=$item['marcas_id'];
            $crea->modelo=$item['modelo'];
            $crea->color=$item['color'];
            $crea->tipoCombustible=$item['tipoCombustible'];
            $crea->GPS=$item['GPS'];            
            $crea->comunas_id=$item['comunas_id'];
            $crea->plazo=$item['plazo'];
            $crea->kmtMensual=$item['kmtMensual'];
            $crea->cantidad=$item['cantidad'];
            $crea->observaciones=$item['observaciones']; 
            $crea->tipoCupula=$item['tipoCupula'];
            $crea->neumaticos=$item['neumaticos'];
            $crea->portaEscala=$item['portaEscala'];
            $crea->barras=$item['barras'];
            $crea->alarmaRobo=$item['alarmaRobo'];
            $crea->sensorRetroceso=$item['sensorRetroceso'];        
            $crea->laminasSeguridad=$item['laminasSeguridad'];          
            $crea->mallaLuneta=$item['mallaLuneta'];
            $crea->cubrePickup=$item['cubrePickup'];
            $crea->cajaHerramienta=$item['cajaHerramienta'];
            $crea->cajaKitInvierno=$item['cajaKitInvierno'];
            $crea->pertiga=$item['pertiga'];
            $crea->cunas=$item['cunas'];
            $crea->cocoArrastre=$item['cocoArrastre'];
            $crea->segundaRuedaRep=$item['segundaRuedaRep'];
            $crea->tiroArrastre=$item['tiroArrastre'];
           
            $crea->save();
        }

          return response()->json([
            'status'=>200,
            'message'=>'Cotizacion creada Correctamente!!',  ]); 
    }
}


   public function listaCotizacion()
   {
   
    $cotizacion=Cotizacion::select(
        'cotizacions.id',
         'cotizacions.fechaSolicitud',
         'cotizacions.empresas_id',
         'cotizacions.solicita',
         'empresas.nombreEmp',
        )
    ->join('empresas','cotizacions.empresas_id','=','empresas.id')
    ->orderBy( 'id','desc')
    ->get();  

 
    return response()->json([
        'status'=>200,
        'cotizacion'=>$cotizacion,
    ]);
}


 public function eliminarCotizacion($id)
{
     $cotizacion=Cotizacion::find($id);
     if($cotizacion)
     {
          $cotizacion->delete(); 
          return response()->json([
            'status'=>200,
            'message'=>'Cotizacion eliminada!!!',
        ]);

     }
     else
     {
          return response()->json([
            'status'=>404,
            'message'=>'No se Encuentra la cotización!!!',
        ]);

     }


}






public function listaItem(Request $request,$cot_id)
{
   $empresa=Empresa::all();
   $marca=Marca::all();
   $comuna=Comuna::all();
   $cotizacion=Cotizacion::all();
   $itemCotizacion=Itemcotizacion::select(  
    'cotizacions.id',    
    'cotizacions.fechaSolicitud',  
    'cotizacions.empresas_id',
    'empresas.id',
    'empresas.nombreEmp', 
    'itemcotizacions.id',     
    'itemcotizacions.cot_id',
    'itemcotizacions.negocioProyecto',
    'itemcotizacions.motivo',
    'itemcotizacions.tipoUnidad',
    'itemcotizacions.tipoCabina',
    'itemcotizacions.traccion',
    'itemcotizacions.trasmision',
    'itemcotizacions.marcas_id',
     'marcas.marca',
     'itemcotizacions.comunas_id',
     'comunas.comuna',
    'itemcotizacions.modelo',
    'itemcotizacions.color',
    'itemcotizacions.tipoCombustible',
    'itemcotizacions.GPS',
    'itemcotizacions.comunas_id',
    'itemcotizacions.plazo',
    'itemcotizacions.kmtMensual',
    'itemcotizacions.cantidad',
    'itemcotizacions.observaciones',
    'itemcotizacions.tipoCupula',
    'itemcotizacions.neumaticos',
    'itemcotizacions.portaEscala',
    'itemcotizacions.barras', 
    'itemcotizacions.alarmaRobo',  
    'itemcotizacions.sensorRetroceso', 
    'itemcotizacions.laminasSeguridad',    
    'itemcotizacions.mallaLuneta', 
    'itemcotizacions.cubrePickup', 
    'itemcotizacions.cajaHerramienta', 
    'itemcotizacions.cajaKitInvierno', 
    'itemcotizacions.pertiga', 
    'itemcotizacions.cunas',   
    'itemcotizacions.cocoArrastre',    
    'itemcotizacions.segundaRuedaRep', 
    'itemcotizacions.tiroArrastre'

)
     ->join('cotizacions','itemcotizacions.cot_id','=','cotizacions.id')
    ->join('empresas','cotizacions.empresas_id','=','empresas.id')
    ->join('marcas','itemcotizacions.marcas_id','=','marcas.id')
    ->join('comunas','itemcotizacions.comunas_id','=','comunas.id')
  

   ->where('itemcotizacions.cot_id','=',$cot_id)
   ->get();

   return response()->json([
    'status'=>200,
    'itemCotizacion'=>$itemCotizacion,
]); 

}


    public function eliminarItem($id)
{
     $item=Itemcotizacion::find($id);
     if($item)
     {
          $item->delete(); 
          return response()->json([
            'status'=>200,
            'message'=>'Item eliminado!!!',
        ]);

     }
     else
     {
          return response()->json([
            'status'=>404,
            'message'=>'No se Encuentra El Item!!!',
        ]);

     }

}
 public function editFlota($id)
{
    $flota=Flota::find($id);
    if($flota){
     return response()->json([
        'status'=>200,
        'flota'=>$flota,]);
 }else{
     return response()->json([
        'status'=>404,
        'message'=>'No se encuentra el id de la Patente',]);
 }

}









}
