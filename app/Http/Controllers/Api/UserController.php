<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Votacion;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate(
            [
                "name" => ["required"],
                "email" => ["required", "email", "unique:users"],
                "password" => ["required"],
                "rol" => ["required"],
                "partido" => ["required"]
            ]

        );

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->rol = $request->rol;
        $user->partido = $request->partido;
        $user->save();

        return response()->json([
            "status" => "OK",
            "message" => "Registro exitoso"
        ]);
    }

    public function login(Request $request)
    {
        $request->validate(
            [
                "email" => ["required", "email"],
                "password" => ["required"]
            ]
        );


        $user = User::where("email", "=", $request->email)->first();

        if (isset($user->id)) {

            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken("auth_token")->plainTextToken;

                return response()->json([
                    "status" => 200,
                    "message" => "Create Token succefull",
                    "Token" => $token
                ]);
            } else {
                return response()->json([
                    "status" => 0,
                    "message" => "Password invalid"
                ]);
            }
        } else {
            return response()->json([
                "status" => 0,
                "message" => "User not register"
            ]);
        }
    }



    public function userProfile()
    {

        $user = auth()->user();

        $voto = Votacion::where('user_id', $user->id)->get();


        if (count($voto) > 0) {
            return response()->json([

                'status' => 'OK',
                'data' => [
                    'name' => $user->name,
                    'email' => $user->email,
                    'rol' => $user->rol,
                    'partido' => $user->partido,
                    'voto' => 1
                ]
            ]);


        }

        return response()->json([
            'status' => 'OK',

            'data' => [
                'name' => $user->name,
                'email' => $user->email,
                'rol' => $user->rol,
                'partido' => $user->partido,
            ]
        ]);


    }

    public function logOut()
    {


        auth()->user()->tokens()->delete();
        return response()->json([
            "status" => 200,
            "message" => "Session Closed"
        ]);
    }


}
