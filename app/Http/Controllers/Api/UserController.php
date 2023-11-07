<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request){
    $request->validate([
        'name' => ['required'],
        'email' => ['required'],
        'password' => ['required']
    ]);

    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->save();

    return response()->json([
        "status" => "OK",
        "message" => "Registro exitoso"
    ]);
}

    public function login(Request $request){

    }

    public function userProfile(){

    }

    public function logOut(){

    }


}
