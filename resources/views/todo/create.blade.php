@extends('layouts.master')

@section('content')
    <h1>Create New Todo</h1>
    <hr/>

    
    <form method="post" action="{{url('todo')}}" class= 'form-horizontal' role='form' >
            {{csrf_field()}}
        <!-- Name Field -->
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            
            <label for="name" class="col-sm-3 control-label">Todo Name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" placeholder="Todo Name" name="name">
                
                <span class="help-block text-danger">
                    {{ $errors -> first('name') }}
                </span>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-5">
               
                <button type="submit" class="btn btn-primary">
                    Create
                </button>
            </div>
        </div>
    </form>
@endsection