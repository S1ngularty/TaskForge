<?php

namespace App\Services;
use App\Models\Task;
use App\Models\UserInfo;
use App\Models\task_status;
use App\Services\PlayerService;

use Illuminate\Support\Facades\DB;

class TaskService
{
    // public function __construct()
    // {
    //     //
    // }

    public function taskUpdate ($data,$id): Task {
        $task= Task::find($id);
        // dd($task);
         $task->title=$data->title;
        $task->occurence=$data->occurence;
        $task->description=$data->description;
        return $task->save() ? $task : null ;
    }

    public function system_update($currDate,$data){
        $missed=0;
        $playerService= new playerService();
         $tasks=task_status::whereHas('task',function($query) use ($currDate){
                $query->whereDate("task_end","<=",$currDate)
            ->where("recreate",0);
            })->get();
        foreach($tasks as $task){
            if($currDate>=date($task->task_end)){
                if($task->is_complete!=1) $missed++; 
                $newTask=new task_status();
                $newTask->task_id = $task->task_id;
                $newTask->task_start = $currDate;
                $newTask->task_end= $this->occurrence($task->task->occurence,$currDate);
                $recUpdate=DB::table('task_status')->where("task_id",$task->task_id)->update([
                    "recreate"=>1
                ]);
                $newTask->save();  
            }
       $player= $playerService->decreaseHP($data->player->user_info,$missed);
        // dd($player);
        }
    }

    public function occurrence($occ,$newDate){
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

    public function taskRecord(){

        $result = Task::whereHas('user',function($query){
        $query->where('user_id', auth('api')->user()->user_id);
        })->select('task_id', 'title') 
        ->withCount([
        'task_status as completed' => function ($query) {
            $query->where('is_complete', 1);
        },
        'task_status as missed' => function ($query) {
            $query->where('is_complete', 0);
        }
        ])->get();

        return $result;
    }
   
}


