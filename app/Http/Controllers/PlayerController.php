<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\task_status;
use Illuminate\Http\Request;
use Auth;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Redis;
use Throwable;

class PlayerController extends Controller
{
    private $user_id;
    private $life;
    private $exp;
    private $level;

    private function setPlayer($request){
       $this->life=$request->player->user_info->life;
       $this->exp=$request->player->user_info->exp;
       $this->level=$request->player->user_info->lvl;
    }
    
    public function getPlayer(Request $request){
        $this->setPlayer($request);
        return response()->json(
         data:[$this->level,$this->exp,$this->life]    
        );
    }

    public function decreaseExp(){

    }
}
