<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskManager extends Controller
{
    public function addTask()
    {
        return view('tasks.addTask');
    }

    public function addTaskPost(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required|date'
        ]);

        // Here you would typically save the task to the database
        // For demonstration, we'll just return a success message

        return redirect()->route('tasks.add')->with('success', 'Task added successfully!');
    }
}
