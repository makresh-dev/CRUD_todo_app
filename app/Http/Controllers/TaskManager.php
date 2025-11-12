<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;

class TaskManager extends Controller
{
    public function ListTasks()
    {
       $tasks = Tasks::whereIn('status', ['pending', 'done'])
              ->orWhereNull('status')
              ->orderBy('created_at', 'desc')
              ->paginate(4);

        return view("welcome", compact("tasks"));

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

    public function updateStatus($id)
    {
      if(Tasks::where('id', $id)->update(['status' => 'Done'])) {
        return redirect(route('home'))->with('success', 'Task Completed');
    }else{
        return redirect(route('home'))->with('error', 'Failed to update task status, try again');
    }
}

    public function deleteTask($id)
    {
      $task = Tasks::find($id);

    // 🧩 1️⃣ Check if task exists
    if (!$task) {
        return redirect()->back()->with('error', 'Task not found.');
    }

    // 🧩 2️⃣ Handle null or empty status (treat as Pending)
    $status = strtolower($task->status ?? 'pending');

    // 🧩 3️⃣ Prevent deletion if task is pending
    if ($status !== 'done' && $status !== 'completed') {
        return redirect()->back()->with('error', 'Pending tasks cannot be deleted.');
    }

    // 🧩 4️⃣ Delete the task
    $task->delete();

    return redirect()->back()->with('success', 'Task deleted successfully.');
}
}
