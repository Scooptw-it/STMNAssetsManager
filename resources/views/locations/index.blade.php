
@extends('template')

@section('content')
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
            @endif
            <div class="container">         
                <h1>All Locations:</h1>
                <div class="">
                        <a href="/locations/create" class="btn btn-primary" style="margin-top: 5px;">Add A New Location</a>
                </div>
                <hr />
                
                <table border = "1">
                    <tr>
                        <td>Id</td>
                        <td>Location</td>
                        <td>Note</td>
                        <td>CreateDate</td>
                        <td>View Details</td>
                        <td>Edit</td>
                        <td>Delete</td>
                    </tr>

                @foreach ($locations as $location)
                    <tr>
                        <td>{{ $location->id }}</td>
                        <td>{{ $location->location }}</td>
                        <td>{{ $location->note }}</td>
                        <td>{{ $location->created_at}}</td>
                        <td><a href="{{ route('locations.show', $location->id) }}" class="btn btn-primary m-2">View Details</a></td>
                        <td><a href="{{ route('locations.edit', $location->id) }}" class="btn btn-primary m-2">Edit</a></td>
                        <td>
                            <a href="">
                                <form action="{{ route('locations.destroy', $location->id) }}" method="POST">
                                    <button class="btn btn-primary m-2">Delete</button>
                                    @method('DELETE')
                                    @csrf
                                </form>
                            </a>      
                        </td>
                   </tr>
                @endforeach
                </table>
                {!! $locations->links() !!}  {{-- this is for adding pagination function --}}
            </div>
@endsection