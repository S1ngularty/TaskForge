<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\task_status;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Contracts\JWTSubject;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::whereHas('user', function ($query) {
        $query->where('user_id', auth('api')->user()->user_id);
    })->whereHas('task_status',function($query){
        $query->where('is_complete',0);
    })->get();

return response()->json($tasks);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{

    // return response()->json(auth('api')->user());
    $user= auth('api')->user();
    
    $task = new Task();
    $task->user_id = $user->user_id;
    $task->title = $request['title'];
    $task->occurence = $request['occurence'];
    $task->description=$request['description'];
    $task->save();  


    return response()->json([
        'status' => 201,
        'message' => 'successfully stored',
        'data' => $task
    ]);
}

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
         return response()->json($task);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        // return response()->json($request->all());
        if($request->update=='true'){
        $task->title=$request->title;
        $task->occurence=$request->occurence;
        $task->description=$request->description;
        $task->save();
        return response()->json($request->all());
        }else{
            $task->is_complete=1;
            $task->save();
            return response()->json("task completed!");
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        if($task->delete()){
            return response()->json("success!");
        }
        return response()->json("failed to delete the task, please atry again.");
    }
}
