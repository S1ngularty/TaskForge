<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\PlayerController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


    Route::apiResource('user',UserController::class)->names("user");
    Route::middleware("auth:api")->group(function(){
        Route::put("task/taskDone/{id}",[TaskController::class,"taskDone"])->name("task.task_done")->middleware('load.player');
        Route::get("task/task_records",[TaskController::class,"taskRecords"])->name("task.task_records");
        Route::get("task/sys_update",[TaskController::class,"sys_update"])->name("task.sys_update")->middleware('load.player');
        Route::apiResource('task',TaskController::class)->names("task");
    });  

   Route::middleware(["auth:api",'load.player'])->prefix('player')->group(function(){
     Route::get('/',[PlayerController::class,"getPlayer"])->name("getPlayer");
   });

