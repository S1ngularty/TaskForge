<?php

namespace App\Services;
use App\Models\Task;
use App\Models\UserInfo;
use App\Models\task_status;

class PlayerService
{


     public function increaseExp($id,$life,$exp,$lvl): array{
        $expNeeded=100*(1.5**($lvl-1));
        $curr_exp=$exp+51;
        $player=UserInfo::find($id);
        // return $player;
        
        $player->lvl = ($curr_exp>=$expNeeded) ? $lvl+1 : $lvl;
        $player->exp= ($curr_exp>=$expNeeded) ? 0 : $curr_exp;
        $player->life=($curr_exp>=$expNeeded) ? (($life+20<=100) ? $life+20 : 100) : $life;
        if($player->save()) return [true,$player];
        
        return [false];
    }

     public function decreaseHP($data,$count){
        $player=UserInfo::find($data->user_id);
        $hp=(($data->life-(20 * $count))>0) ? [($data->life-(20 * $count)),false] : [50,true] ;
        $player->life= $hp[0];
        if($hp[1]==true){
            $minusExp=($player->exp-20 > 0) ? $player->exp-20 : 0;
            $player->exp= $minusExp;
            $player->lvl= ($minusExp>0) ? $player->lvl : abs($player->lvl-1);
        }
        $player->save();
        return  $player;
    }

    
}
