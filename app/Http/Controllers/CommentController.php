<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'author'=>'required',
            'content'=>'required',
            'gameId'=>'required',
            'password'=>'required'
        ]);
        
        if ($validator ->fails()){
            $data = [
                'message'=>'Error en la validacion de los datos',
                'errors'=> $validator->errors(),
                'status'=> 400
            ];
            return response()->json($data,400);
        }

        $comment = Comment::create([
            'author'=>$request->author,
            'content'=>$request->content,
            'gameId'=>$request->gameId,
            'password'=>$request->password
        ]);

        if (!$comment){
            $data = [
                'message'=>'Error al crear al estudiante',
                'status'=> 500
            ];
            return response()->json($data,500);
        }

        $data = [
            'comment'=> $comment,
            'status'=> 201
        ];
        return response()->json($data,201);
    }



    /**
     * Display the specified resource.
     */
    public function show($gameId)
    {
        $comments = Comment::where('gameId', $gameId)->get();
    

        if ($comments->isEmpty()) {
            $data = [
                'message' => 'No hay comentarios coincidentes',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
    
        return response()->json($comments);
    }

        /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $comment = Comment::find($id);
        

        if (!$comment) {
            $data = [
                'message' => 'No hay comentarios coincidentes',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(),[
            'content'=>'required',
        ]);
        
        if ($validator ->fails()){
            $data = [
                'message'=>'Error en la validacion de los datos',
                'errors'=> $validator->errors(),
                'status'=> 400
            ];
            return response()->json($data,400);
        }

        $comment->content = $request->content;


        $comment->save();

        $data = [
            'message'=>'Comentario actualizado',
                ];
        return response()->json($data);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);

        if (!$comment) {
            $data = [
                'message' => 'No hay comentarios coincidentes',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $comment->delete();

        $data = [
            'message' => 'Estudiante Eliminado',
            'status' => 200
        ];
        return response()->json($data, 200);
    }
}
