<?php

namespace App\Models;
use App\Models\User;
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
        'occurence'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
