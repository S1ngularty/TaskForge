<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

        $task = new Task();
    // Manually assign attributes
    $task->name = $request['name'];
    $task->occurence = $request['occurence'];
    $task->user_id=auth()->user()->id();
    $task->description="dasdsa";

        if(!$task){
            return response()->json(['status'=>500,'message'=>'failed to store','data'=>$task]);
        }

        return response()->json(array('status'=>201,'message'=>'successfully store','data'=>$request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
