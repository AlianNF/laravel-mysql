<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::all();

        return response()->json($games,200);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'description' => 'required',
            'imageUrl' => 'required',
            'hours' => 'required',
            'genres' => 'required',
            'trailer' => 'required',
            'metascore' => 'required',
            'releaseDate' => 'required',
        ]);
        
        if ($validator ->fails()){
            $data = [
                'message'=>'Error en la validacion de los datos',
                'errors'=> $validator->errors(),
                'status'=> 400
            ];
            return response()->json($data,400);
        }

        $game = Game::create([
            'title' =>$request->title,
            'description' =>$request->description,
            'imageUrl' =>$request->imageUrl,
            'hours' =>$request->hours,
            'genres' =>$request->genres,
            'trailer' =>$request->trailer,
            'metascore' =>$request->metascore,
            'releaseDate' =>$request->releaseDate
        ]);

        if (!$game){
            $data = [
                'message'=>'Error al crear al estudiante',
                'status'=> 500
            ];
            return response()->json($data,500);
        }

        $data = [
            'game'=> $game,
            'status'=> 201
        ];
        return response()->json($data,201);
    }

    
    
}


