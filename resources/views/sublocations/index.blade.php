@extends('template')

@section('content')
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
            @endif

            <div class="container">         
                <h1>All Sublocations:</h1>
                <div class="">
                    <a href="/sublocations/create" class="btn btn-primary" style="margin-top: 5px;">Add A New Sublocation</a>
                </div>
                <hr />
                <table class="table table-striped table-bordered text-center table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="text-center">Id</td>
                            <th scope="col" class="text-center">LocationID</td>
                            <th scope="col" class="text-center">Sublocation</td>
                            <th scope="col" class="text-center">Note</td>
                            <th scope="col" class="text-center">CreateDate</td>
                            <th scope="col" class="text-center">View Details</td>
                            <th scope="col" class="text-center">Edit</td>
                            <th scope="col" class="text-center">Delete</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sublocations as $sublocation)
                        <tr>
                            <td>{{ $sublocation->id }}</td>
                            <td>{{ $sublocation->location_id }}</td>
                            <td>{{ $sublocation->sublocation }}</td>
                            <td>{{ $sublocation->note }}</td>
                            <td>{{ $sublocation->created_at}}</td>
                            <td><a href="{{ route('sublocations.show', $sublocation->id) }}" class="btn btn-primary m-2">View Details</a></td>
                            <td><a href="{{ route('sublocations.edit', $sublocation->id) }}" class="btn btn-primary m-2">Edit</a></td>
                            <td><a href="{{ route('sublocations.edit', $sublocation->id) }}" class="btn btn-primary m-2">Delete</a></td>  
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              
            </div>
@endsection