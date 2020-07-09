@extends('template')

@section('content')
    <div class="container">
        <h1>{{ $brand->brand }}</h1>
        <p class="lead">
            {{ $brand->note }}
        </p> 
        <hr />
    </div>
@endsection