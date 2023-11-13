<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Votacion;
use Illuminate\Http\Request;


class VotacionController extends Controller
{
    public function createVoto(Request $request)
    {

        $request->validate([
            'partido' => 'required',
        ]);


        $votacion = new Votacion();


        $votacion->partido = $request->partido;


        $votacion->save();

        return response()->json([
            'status' => 'OK',
            'message' => ' Vote created successfully'
        ]);



    }



    public function listVoto()
    {
        $partidoLla = 'La Libertad Avanza';
        $partidoUxp = 'Union Por La Patria';

        $votoLla = Votacion::where('partido', $partidoLla)->count();

        $votoUxp = Votacion::where('partido', $partidoUxp)->count();
        $totalDatos = Votacion::count();


        return response()->json([
            'status' => 'OK',
            'data' => [

                'total' => $totalDatos,
                'Libertad' => $votoLla,
                'UnionxPatria' => $votoUxp,
            ]
        ]);

    }
}
