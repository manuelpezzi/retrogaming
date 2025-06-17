<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Videogame;
use Illuminate\Http\Request;

class VideogameController extends Controller
{
    public function index(){
        //prendo tutti i videogames dat database

        $videogames = Videogame::with('producer','genres')->get();    
    
        return response()->json(
            [
                "success"=>true,
                "data"=> $videogames
            ]
            );
    }

      public function show(Videogame $videogame)
    {
        // Carico le relazioni produttore e generi
        $videogame->load(['producer', 'genres']);

        return response()->json([
            'success' => true,
            'data' => $videogame
        ]);
    }
}

