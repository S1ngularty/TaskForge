<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


    Route::apiResource('user',UserController::class)->names("user");
    Route::middleware("auth:api")->group(function(){
        Route::get("task/sys_update",[TaskController::class,"sys_update"])->name("task.sys_update");
        Route::apiResource('task',TaskController::class)->names("task");
    });  

