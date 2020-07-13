@extends('template')

@section('content')
    <div class="container">
        <h1>{{ $location->location }}</h1>
        <h2>{{ $sublocation->sublocation }}</h2>
        <p class="lead">
            {{ $sublocation->note }}
        </p> 
        <hr />
    </div>
@endsection