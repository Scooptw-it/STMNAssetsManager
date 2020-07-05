
@extends('template')

@section('content')
            <div class="container">         
                <h1>All Locations:</h1>
                <hr />
                
                @foreach ($locations as $location)
                    <div class="well">
                        <h3>{{ $location->location }} </h3>
                        <p>
                            {{ $location->note}}
                        </p>
                        <a href="{{ route('locations.show', $location->id) }}" class="btn">View Details</a>
                    </div>
                    <hr />
                @endforeach

            </div>
@endsection