<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\support\Facades\Auth;
use App\Models\User;

class PlayerInfo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user=Auth::guard('api')->user() ?? null;
        // echo $user;
        if($user){
        $player = User::where('user_id',$user->user_id)
        ->with('user_info') // eager load the relationship
        ->first();
            
            if ($player){
                $request->merge([
                    'player'=>$player
                ]);
            }
        }

        return $next($request);
    }
}
