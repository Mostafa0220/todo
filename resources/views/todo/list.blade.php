@extends('layouts.master')

@section('content')
    <h1>Todo List <a href="{{ url('/todo/create') }}" class="btn btn-primary pull-right btn-sm">Add New Todo</a></h1>
    <hr/>

    @include('partials.flash_notification')

    @if(count($todoList))
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>ToDo Name</th>
                    <th>Completed</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                @foreach($todoList as $todo)
                    <tr>
                        <td>{{ $todo->name }}</td>
                        <td>{{ $todo->complete? 'Completed' : 'Pending' }}</td>
                        <td><form action="{{action('TodoController@changeStatus', $todo->id)}}" method="post" class='form-inline'>
                                    {{csrf_field()}}
                                    <input name="_method" type="hidden" value="PUT">
                                    @if($todo->complete)
                                        <button class="btn btn-info btn-xs" type="submit">Incomplete</button>
                                    @else
                                        <button class="btn btn-success btn-xs" type="submit">Complete</button>
                                    @endif    
                                </form>
                                <a href="{{action('TodoController@edit', $todo->id)}}" class="btn btn-warning btn-xs">Edit</a>


                                

                            

                            <form action="{{action('TodoController@destroy', $todo->id)}}" method="post" class='form-inline'>
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-danger btn-xs" type="submit">Delete</button>
                            </form>
                            
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="text-center">
            {!! $todoList->render() !!}
        </div>
    @else
        <div class="text-center">
            <h3>No todos available yet</h3>
            <p><a href="{{ url('/todo/create') }}">Create new todo</a></p>
        </div>
    @endif
@endsection