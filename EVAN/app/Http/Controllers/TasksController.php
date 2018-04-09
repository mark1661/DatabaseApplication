<?php

namespace App\Http\Controllers;

use App\Task;

class TasksController extends Controller
{
    public function index(){
      $tasks=Task::latest()->get();
      return view('tasks/index',compact('tasks'));
    }

    public function show($id){
      $task=Task::find($id);
      return $task;
      return view('tasks/show',compact('task'));
    }
    //model route binding
    // public function show(Task $id){
    //   return $id;
    // }
}
