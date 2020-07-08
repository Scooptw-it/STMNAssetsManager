
@extends('template')

@section('content')
            <div class="container">         
                <h1>All Locations:</h1>
                <hr />
                
                <table border = "1">
                    <tr>
                        <td>Id</td>
                        <td>Location</td>
                        <td>Note</td>
                        <td>CreateDate</td>
                        <td>View Details</td>
                    </tr>

                @foreach ($locations as $location)
                    <tr>
                        <td>{{ $location->id }}</td>
                        <td>{{ $location->location }}</td>
                        <td>{{ $location->note }}</td>
                        <td>{{ $location->created_at}}</td>
                        <td><a href="{{ route('locations.show', $location->id) }}" class="btn">View Details</a></td>
                    </tr>
                @endforeach

                {!! $locations->links() !!}  {{-- this is for adding pagination function --}}
            </div>
@endsection