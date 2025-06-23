<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\task_status;
use App\PlayerService as AppPlayerService;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Throwable;

//Services

use App\Services\TaskService;
use App\Services\PlayerService;



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
    public function store(Request $request,TaskService $service)
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
        $stage->task_end=$service->occurrence($task->occurence,$this->currDate);
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
    public function update(Request $request, Task $task, TaskService $service)
    {
        if($request->update=='true'){
            if($service->taskUpdate($request,$task->task_id))
        return response()->json($request->all());
        }
    }

    public function taskDone(Request $request,PlayerService $service,$id){
        $exp=$request->player->user_info->exp;
        $life=$request->player->user_info->life;
        $lvl=$request->player->user_info->lvl;
        $playerId=$request->player->user_id;
        $ts= task_status::find($id);
        $ts->is_complete=1;

         if($ts->save()){
           $flag=$service->increaseExp($playerId,$life,$exp,$lvl);
             if($flag[0]){
                return response()->json([
                    'message'=>'task complete',
                    'data'=>$flag[1]
                ],200);
            }
             return response()->json("failed to update the player status");  
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



    public function sys_update(Request $request, TaskService $taskService){
      try{
       $taskService->system_update($this->currDate,$request);
      }catch(Throwable $e){
        if($e instanceof ModelNotFoundException){
            return response()->json([
              'success' => false,
                'error_type' => get_class($e),     
                'message' => $e->getMessage(),     
                'trace' => $e->getTrace(),        
                'file' => $e->getFile(),           
                'line' => $e->getLine(),    
            ],500);
        }
      }
      return response ()->json("system is up to date");
    }

   

     

    public function TaskRecords(TaskService $service){

     
        return response()->json($service->taskRecord());

    }
}
