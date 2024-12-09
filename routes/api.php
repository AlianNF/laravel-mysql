<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\CommentController;

Route::get('/games',[GameController::class,'index']);

Route::post('/games', [GameController::class, 'create']);

Route::get('/comments/{gameId}',[CommentController::class,'show']);

Route::post('/comments',[CommentController::class,'create']);

Route::put('/comments/{id}',[CommentController::class,'update']);

Route::delete('/comments/{id}',[CommentController::class,'destroy']);