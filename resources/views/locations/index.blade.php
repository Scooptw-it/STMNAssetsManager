
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
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter{{ $location->id }}">
                            Delete
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter{{ $location->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                   
                                    <form action="{{ route('locations.destroy', $location->id) }}" method="POST">
                                    
                                        @method('DELETE')
                                        @csrf

                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                                        </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </td>
                   </tr>
                @endforeach
                </table>
                {!! $locations->links() !!}  {{-- this is for adding pagination function --}}
            </div>
@endsection