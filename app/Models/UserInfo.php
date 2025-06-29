<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;
    protected $table="user_info";
    protected $primaryKey="user_id";
    protected $fillable=[
        'user_id',
        'IGN',
        'lvl',
        'life',
        'exp',
        'bio',
        'last_active'
    ];
    public $timestamps=false;

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

}
