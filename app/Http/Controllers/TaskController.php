<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    function createTask(Request $request){
              
       return Task::create([
          'name'=> $request->input('name'),
          'title' => $request->input('title'),
          'description' => $request->input('description'),
          'duration' => $request->input('duration'),

        ]);

    }

    function ReadTask(Request $request){
        return Task::all();
    }
    function UpdateTask(Request $request,$id){
       
        $name = $request->input('name');
        $title = $request->input('title');
        $duration = $request->input('duration');
        $description = $request->input('description');

        return Task::where('id','=',$id)
                   ->update([
                    'name'=>$name,
                    'title'=>$title,
                    'duration'=>$duration,
                    'description'=>$description,
                    
                   ]);

        
    }
    function DeleteTask(Request $request,$id){
        
        return Task::where('id','=',$id)->delete();
    }
}
