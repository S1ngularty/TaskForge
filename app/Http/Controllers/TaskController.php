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
        // return response()->json($task->task_id);
        if($request->update=='true'){
        $task->title=$request->title;
        $task->occurence=$request->occurence;
        $task->description=$request->description;
        $task->save();
        return response()->json($request->all());
        }else{
            $taskDone= task_status::where('task_id',$task->task_id)->first();
            $taskDone->is_complete=1;
            if($taskDone->save()){
                 return response()->json("task completed!");
            }
           
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

    public function sys_update(){
        // return response()->json("reached");
        $tasks=task_status::withwhereHas('task')->get();
        // return response()->json($tasks);
        $curdate= date("Y-m-d");
       foreach($tasks as $task){
         if(date($curdate)>date($task->task_end)){
            $newTask=new task_status();
            $newTask->task_id = $task->task_id;
            $newTask->task_start = $curdate;
            $newTask->task_end= $this->occurrence($task->task->occurence,$curdate);
            if($newTask->save()){
                return response ()->json("system is up to date");
            }else{
                return response()->json("failed to update your system");
            }
        }
       }
    }

     private function occurrence($occ,$newDate){
        switch($occ){
            case "daily":
                return date("Y-m-d",strtotime("$newDate +1 day"));
            case "weekly":
                 return date("Y-m-d",strtotime("$newDate +1 week"));
            case "monthly":
                return date("Y-m-d",strtotime("$newDate +1 month"));
            case "yearly":
                return date("Y-m-d",strtotime("$newDate +1 year"));
        }
    }
}
