@extends('layouts.app')
@section('title')
    Todo List
@endsection
@section('content')
    <h1 class="text-center my-5">Todos Page</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-deault">
                <div class="card-header">ToDos</div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($todos as $todo)
                            <li class="list-group-item">
                                {{ $todo->name }}
                                <a href="/todos/{{ $todo->id }}/complete" class="btn btn-warning btn-sm float-right">Complete</a>
                                <a href="/todos/{{ $todo->id }}" class="btn btn-primary btn-sm float-right mr-2">View</a>
                                {{--<button class="btn btn-primary btn-sm float-right">View</button>--}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection