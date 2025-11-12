<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;

class TaskManager extends Controller
{
    public function ListTasks()
    {
        $tasks = Tasks::all();
        return view("welcome" , compact("tasks"));
    }

    public function addTask()
    {
        return view('tasks.addTask');
    }

    public function addTaskPost(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required'
        ]);
        $task = new Tasks();
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->deadline = $request->input('deadline');
        $task->save();
        if($task->save()) {
            return redirect(route('home'))->with('success', 'Task added successfully');
        }
        return redirect(route('task.add'))->with('error', 'Failed to add task');

    }
}
