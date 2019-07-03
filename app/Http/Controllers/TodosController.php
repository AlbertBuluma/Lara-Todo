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
//    public function show(Todo $todo){  //Route model binding

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
        session()->flash('success', 'Todo created successfully');
        return redirect('/todos');
    }

    public function edit($todoId){

        $todo = Todo::find($todoId);
        return view('todos.edit', compact('todo'));
    }

    public function update($todoId){
        $this->validate(request(),[
            'name' => 'required|min:6|max:6',
            'description' => 'required'
        ]);

        $data = request()->all();

        $todo = Todo::find($todoId);

        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->save();
        session()->flash('success', 'Todo updated successfully');
        return redirect('/todos');

    }

    public function destroy($todoId){
        $todo = Todo::find($todoId);
        $todo->delete();
        session()->flash('success', 'Todo deleted successfully');
        return redirect('/todos');
    }

    public function complete($todoId){

        $todo = Todo::find($todoId);
        $todo->completed = true;
        $todo->save();
        session()->flash('success', 'Todo completed successfully');
        return redirect('/todos');
    }
}
