<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\task_status;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Throwable;

class TaskController extends Controller
{

    private $currDate;

    public function __construct()
    {
        $this->currDate=date("Y-m-d");
    }
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $tasks = Task::whereHas('user', function ($query) {
        $query->where('user_id', auth('api')->user()->user_id);
    })->withwhereHas('task_status',function($query){
        $query->select('ts_id','task_id');
        $query->where('recreate',0);
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
    // return response()->json($task);
    if($task->save()){
        $task->task_id=$task->task_id;
        $stage= new task_status();
        $stage->task_id=$task->task_id;
        $stage->task_end=$this->occurrence($task->occurence,$this->currDate);
        if($stage->save()){
            return response()->json([
                'status' => 201,
                'message' => 'successfully stored',
                'data' => $task,
                'stage'=>$stage
            ]);
        }
    }else{
            return response()->json("failed to store and stage the file");
        }  
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
        }
        
    }

    public function taskDone(Request $reques,$id){
        $ts= task_status::find($id);
        $ts->is_complete=1;
         if($ts->save()){
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



    public function sys_update(){
        // return response()->json("reached");
        
        $curdate=date("Y-m-d");
      try{
        $tasks=task_status::whereHas('task',function($query) use($curdate){
                $query->whereDate("task_end","<",$curdate)
            ->where("recreate",0);
            })->get();
            // return response()->json($tasks);
        foreach($tasks as $task){
            if(date($curdate)>date($task->task_end)){
                $newTask=new task_status();
                $newTask->task_id = $task->task_id;
                $newTask->task_start = $curdate;
                $newTask->task_end= $this->occurrence($task->task->occurence,$curdate);
                $recUpdate=DB::table('task_status')->where("task_id",$task->task_id)->update([
                    "recreate"=>1
                ]);
                $newTask->save();  
            }
        }
      }catch(Throwable $e){
        if($e instanceof ModelNotFoundException){
            return response()->json([
              'success' => false,
                'error_type' => get_class($e),     // Ex: Illuminate\Database\Eloquent\ModelNotFoundException
                'message' => $e->getMessage(),     // Error message
                'trace' => $e->getTrace(),         // Stack trace (array form)
                'file' => $e->getFile(),           // File where error happened
                'line' => $e->getLine(),    
            ],500);
        }
      }
      return response ()->json("system is up to date");
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

    public function TaskRecords(){

      $result = Task::whereHas('user',function($query){
         $query->where('user_id', auth('api')->user()->user_id);
      })->select('task_id', 'title') // Always include id for relationships
        ->withwhereHas('task_status', function($query) {
        $query->select('task_id')
              ->selectRaw('COUNT(*) as total')
              ->groupBy('task_id')
              ->where('is_complete',1);
    })
    ->get();

return response()->json($result);

    }
}
