@extends('layouts.master')

@section('content')
    <div class="text-center">
        <h1>Welcome to Laravel ToDo App</h1>
        <hr/>

        @include('partials.flash_notification')

        
        <h3>Mostafa Bayumi</h3>
        <h5><a href="http://mos-tafa.com" target="_blank">My Portfolio</a></h5>
        <h5><a href="mailto:mostafa0220@gmail.com">mostafa0220@gmail.com</a></h5>
    </div>
@endsection
