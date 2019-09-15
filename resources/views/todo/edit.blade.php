@extends('layouts.master')

@section('content')
    <h1>Edit New Todo</h1>
    <hr/>

    
    <form method="post" action="{{action('TodoController@update', $id)}}" class= 'form-horizontal' role='form' >
            {{csrf_field()}}
            <input name="_method" type="hidden" value="PATCH">
        <!-- Name Field -->
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            
            <label for="name" class="col-sm-3 control-label">Todo Name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" placeholder="Todo Name" name="name" value="{{$todo->name}}">
                
                <span class="help-block text-danger">
                    {{ $errors -> first('name') }}
                </span>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-5">
               
                <button type="submit" class="btn btn-primary">
                    Update
                </button>
            </div>
        </div>
    </form>
@endsection