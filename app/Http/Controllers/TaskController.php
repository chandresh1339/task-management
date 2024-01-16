<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Index page to display all the tasks
     */
    public function index()
    {
       $task=Task::all();
       return view('tasks.index',compact('tasks'));
    }

    /**
     * Show the form for creating a new task
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created task in storage.
     */
    public function store(Request $request)
    {
        //Validation can be added here
      Task::create($request->all());
      return redirect()->route('tasks.index');
    }

    /**
     * Display the specified task.
     */
    public function show(Task $task)
    {
        return view('tasks.show',compact('tasks'));
    }
    /**
     * Editing the specified Task.
     */
    public function edit(Task $task)
    {
    return view('tasks.edit',compact('tasks'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //Validation can be addedd here
        $task->update;
        return redirect()->route('tasks.index');
    }

     // Update the order of tasks
     public function updateOrder(Request $request)
     {
         $taskOrder = $request->input('taskOrder');
 
         // Update task order in the database
         foreach ($taskOrder as $index => $taskId) {
             Task::where('id', $taskId)->update(['order' => $index + 1]);
         }
 
         return response()->json(['message' => 'Task order updated successfully']);
     }

    /**
     * Delete the specified task
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
