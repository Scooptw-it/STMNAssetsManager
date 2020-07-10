@extends('template')

@section('content')
    <div class="container">
        <h1>{{ $category->category }}</h1>
        <p class="lead">
            {{ $category->note }}
        </p> 
        <hr />
    </div>
@endsection

