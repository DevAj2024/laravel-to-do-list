<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;

class TaskManager extends Controller
{
    public function aboutPage(Request $request) 
    {
        return view("about");
    }

    public function logsPage(Request $request) 
    {
        return view("logs");
    }
    public function listTask(Request $request) 
    {
        $tasks = Tasks::where("user_id", auth()->user()->id)->where("status", "Pending")->paginate(3);

        foreach ($tasks as $task) {
            if ($task->deadline->isToday()) {
                $task->status = "Failed";
                $task->save();
            }
        }

        return view("welcome", compact("tasks"));
    }

    public function logsTask(Request $request)
    {
        $logs = Tasks::where("user_id", auth()->user()->id)->paginate(5);

        return view("logs", compact("logs"));
    }
    
    public function addTask(Request $request) 
    {
        return view("tasks.add");
    }

    public function addTaskPost(Request $request) 
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required'
        ]);

        $task = new Tasks();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->deadline = $request->deadline;
        $task->user_id = auth()->id();
        $task->save();
        if($task->save()) {
            return redirect(route("home"))->with("success", "Task added successfully!");
        }
        return redirect(route("task.add"))->with("error","Task not added");
    }

    public function updateTaskStatus($id) 
    {
        if(Tasks::where("user_id", auth()->user()->id)->where('id', $id)->update(['status' => "Completed"])) 
        {
            return redirect(route("home"))->with("success","Task completed!");
        }
            return redirect(route("home"))->with("error","Error occured while updating, please try again.");
    }

    public function deleteTaskStatus($id) 
    {
        if(Tasks::where("user_id", auth()->user()->id)->where('id', $id)->delete()) 
        {
            return redirect(route("home"))->with("success","Task deleted!");
        }
            return redirect(route("home"))->with("error","Error occured while deleting, please try again.");
    }
}
