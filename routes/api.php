<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


    Route::apiResource('user',UserController::class)->names("user");
    Route::apiResource('task',TaskController::class)->names("task")->middleware('auth:api');    

