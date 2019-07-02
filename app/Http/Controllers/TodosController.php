<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodosController extends Controller
{
    public function index(){    ////Displaying all ToDo items

        $todos = Todo::all();
        return view('todos.index')->with('todos',$todos);
    }

    public function show($todoId){  //Display ToDo item details

        $todo = Todo::find($todoId);
//        return view('todos.show')->with('todos',$todo);
        return view('todos.show', compact('todo'));
    }

    public function create(){   //Create Todo item
        return view('todos.create');
    }

    public function store(){    //Storing new Todo item in database

        $this->validate(request(),[
            'name' => 'required|min:6|max:12',
            'description' => 'required'
        ]);

        $data = request()->all();

        $todo = new Todo();
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed = false;
        $todo->save();
        return redirect('/todos');
    }
}
