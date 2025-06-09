<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class task_status extends Model
{
    use HasFactory;
    protected $primaryKey="ts_id";
    protected $table = "task_status";
    protected $fillable=[
        'task_id',
        'is_complete',
        'recreate',
        'task_start',
        'task_end'
    ];

    public $timestamps=false;

    public function task (){
        return $this->belongsTo(Task::class,'task_id');
    }
}
