<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index(){    ////Displaying all ToDo items

        $todos = Todo::all();
        return view('todos.index')->with('todos',$todos);
    }

    public function show($todoId){  //Display ToDo item details

        $todo = Todo::find($todoId);
        return view('todos.show')->with('todos',$todo);
    }
}
