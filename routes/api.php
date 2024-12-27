<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CatgeoryController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('/category' , [CatgeoryController::class , 'index']);
        Route::get('/category/{catgeory}' , [CatgeoryController::class , 'show']);
        Route::post('/category' , [CatgeoryController::class , 'create']);
        Route::put('/category/{category}' , [CatgeoryController::class , 'update']);
        Route::delete('/category/{category}' , [CatgeoryController::class , 'delete']);
    });

    Route::middleware('check')->group(function () {
        Route::post('/category' , [CatgeoryController::class , 'create']);
        Route::put('/category/{category}' , [CatgeoryController::class , 'update']);
        Route::delete('/category/{category}' , [CatgeoryController::class , 'delete']);

        Route::post('/post' , [PostController::class , 'create']);
        Route::put('/post/{post}' , [PostController::class , 'update']);
        Route::delete('/post/{post}', [PostController::class , 'delete']);
    });
});


Route::post('/login', [AuthController::class , 'login']);
Route::post('/register', [AuthController::class , 'register']);
Route::post('/logout', [AuthController::class , 'logout']);
