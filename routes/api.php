<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\creaCotizacionController;
use App\Http\Controllers\api\SelectController;

Route::post('login',[UserController::class,'login']);

 //Route::get('listaItem/{id}',[creaCotizacionController::class,'listaItem']);

Route::group(['middleware'=>["auth:sanctum"]],function(){
     Route::post('userProfile',[UserController::class,'userProfile']);//muestra el usuario conectado

     Route::post('ingresarUsuario',[UserController::class,'ingresarUsuario']);





     Route::post('creaCotizacion',[creaCotizacionController::class,'creaCotizacion']);
     Route::get('user',[UserController::class,'user']);
     Route::get('listUsers',[UserController::class,'listUsers']);
     Route::get('editaUsuarios/{id}',[UserController::class,'editaUsuarios']);//Trae los datos de usuario a Editar
     Route::put('editarUsuarios/{id}',[UserController::class,'editarUsuarios']);



     Route::get('listaComunas',[SelectController::class,'listaComunas']);
      Route::get('listaEmpresas',[SelectController::class,'listaEmpresas']);
      Route::get('listaMarcas',[SelectController::class,'listaMarcas']);
     Route::get('listaCotizacion',[creaCotizacionController::class,'listaCotizacion']);
     Route::get('listaItem/{cot_id}',[creaCotizacionController::class,'listaItem']);
     Route::delete('eliminarItem/{id}',[creaCotizacionController::class,'eliminarItem']);
      Route::delete('eliminarCotizacion/{id}',[creaCotizacionController::class,'eliminarCotizacion']);




});

//NO USAR
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
