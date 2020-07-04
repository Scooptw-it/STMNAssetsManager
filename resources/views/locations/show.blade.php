@extends('template')

@section('content')
    <div class="container">
        <h1>{{ $location->location }}</h1>
        <p class="lead">
            {{ $location->note }}
        </p> 
        <hr />
    </div>
@endsection