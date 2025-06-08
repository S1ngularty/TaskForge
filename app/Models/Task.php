<?php

namespace App\Models;
use App\Models\User;
use App\Models\task_status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $primaryKey="task_id";
    protected $fillable=[
        'user_id',
        'title',
        'description',
        'occurence',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function task_status(){
        return $this->hasMany(task_status::class,'task_id');
    }
}
