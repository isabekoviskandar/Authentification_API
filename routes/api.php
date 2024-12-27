<?php

use App\Http\Controllers\CatgeoryController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/category' , [CatgeoryController::class , 'index']);
Route::get('/category/{catgeory}' , [CatgeoryController::class , 'show']);
Route::post('/category' , [CatgeoryController::class , 'create']);
Route::put('/category/{category}' , [CatgeoryController::class , 'update']);
Route::delete('/category/{category}' , [CatgeoryController::class , 'delete']);

Route::get('/post' , [PostController::class , 'index']);
Route::get('/post/{post}' , [PostController::class , 'show']);
Route::post('/post' , [PostController::class , 'create']);
Route::put('/post/{post}' , [PostController::class , 'update']);
Route::delete('/post/{post}', [PostController::class , 'delete']);