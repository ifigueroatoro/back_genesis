<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Rules\MatchOldPassWord;


class UserController extends Controller

{

   public function ingresarUsuario(Request $request){
     $validator = Validator::make($request->all(),[
        'name'=>'required|max:191',
        'email'=>'required|email|max:191|unique:users,email',
        'password'=>'required|min:8',
        'role'=>'required|max:1',
        'cargo'=>'required|max:1',]);



     if($validator->fails())
     {
        return response()->json([
           // 'status'=>400,
            'validation_errors'=>$validator->messages(),
        ]);

    }
    else
    {

        $user = new User();
        $user ->name=$request->name;
        $user ->email=$request->email;
        $user ->password= Hash::make($request->password);
        $user ->role=$request->role;  
        $user ->cargo=$request->cargo;  
        $user->save();
        return response()->json([
            "status"=>200,
            "message"=>"Usuario creado exitosamente!!"

        ]);

    }

}

public function login(Request $request){
   $validator = Validator::make($request->all(),[
    'email'=>'required|email|max:191',
    'password'=>'required',
]);

   if($validator->fails())
   {
    return response()->json([
        'validation_errors'=>$validator->messages(),

    ]);
}
else
{
    $user=User::where('email',$request->email)->first(); 

    if(! $user || ! Hash::check($request->password, $user->password)){
        return response()->json([
            'status'=>401,
            'message'=>'Email o password no son correctos',
        ]);
    }
    else
    {           

               //Creacion de token
        $token=$user->createToken("auth_token")->plainTextToken;
        return response()->json([
            "status"=>200,
            "message"=>"-",
            "access_token"=>$token,
            'user'=>$user,
        ]);
    }

}

}



public function userProfile(){
//Muestra en la barra nav al usuario y en la cotizacion en el select "Ingrese usuario"
 return response()->json(auth()->user());

    /* return response()->json([
        "status"=>0,
        "msg"=>"Perfil de Usuario ",
        "data"=>auth()->user()

    ]);*/

}



public function logout(){
    auth()->user()->tokens()->delete();
    return response()->json([
        "status"=>1,
        "msg"=>"Cierre de sesion ",
    ]);


}



public function cambioPass(Request $request)

{



   $validator = Validator::make($request->all(),[

      'password' => ['required', new MatchOldPassword],

      'newPassword' => ['required'],

 // 'new_confirm_password' => ['same:new_password'],



  ]);



   if($validator->fails())

   {

    return response()->json([

        'validation_errors'=>$validator->messages(),

    ]);

}

else

{



  User::find(auth('sanctum')->user()->id)->update(['password'=> Hash::make($request->newPassword)]);



  return response()->json([

    'status'=>200,

             //"access_token"=>$token,

    'message'=>'Contraseña cambiada',

]);



}



}



public function listUsers()
{
    $user=User::all();
    return response()->json([
        'status'=>200,
        'users'=>$user,
    ]);
}




//trae los datos del usuario que se editara

public function editaUsuarios($id)
{
    $user=User::find($id);
    if($user)
    {
       return response()->json([
        'status'=>200,
        'user'=>$user,
    ]);
   }
   else
   {
       return response()->json([
        'status'=>404,
        'message'=>'No se encuentra el id del usuario',
    ]);

   }
}



//Edita el usuario finalmente

public function editarUsuarios(Request $request, $id)

{

  $validator = Validator::make($request->all(),[

    'name'=>'required|max:191',
    'email'=>'required',
 //'email'=>'required|email|max:191|unique:users,email',
    'role'=>'required',
    'cargo'=>'required',

]);
  if($validator->fails())
  {
    return response()->json([
     'status'=>422,
     'errors'=>$validator->messages(),
 ]);

}
else
{
    $user=User::find($id);
    if($user)
    {

        $user->name= $request->input('name');
        $user->email=$request->input('email'); 
        $user->role= $request->input('role');
        $user->cargo= $request->input('cargo');
        $user->save();
        return response()->json([
            'status'=>200,
            'message'=>'Cambios realizados!!'
        ]);
    }
    else
    {
      return response()->json([
        'status'=>404,
        'message'=>'Usuario no encontrado!!!',
    ]);

  }
}
}



//Elimina Usuario

public function eliminarUsuario($id)

{
   $user=User::find($id);
   if($user)
   {
      $user->delete();
      return response()->json([
        'status'=>200,
        'message'=>'Usuario eliminado!!!',
    ]);


  }

}


  public function user()
   {
    $user=User::select('*')
    ->where('name',auth('sanctum')->user()->name)
      
      ->get();
    return response()->json([
        'status'=>200,
       // 'user'=>$user,
    ]);
}

}