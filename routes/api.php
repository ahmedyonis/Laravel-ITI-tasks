<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/posts',[PostController::class,"index"]);//->middleware(middleware:'auth:sanctum');
Route::get('/posts/{id}',[PostController::class,"show"]);
Route::post('/posts',[PostController::class,"store"]);
Route::post('/posts/{id}/edit',[PostController::class,"update"]);


Route::get('/users',[UserController::class,"index"]);
Route::get('/users/{id}',[UserController::class,"show"]);
Route::post('/users',[UserController::class,"store"]);
Route::post('/users/{id}/edit',[UserController::class,"update"]);


