@extends('template')

@section('content')
    <div class="container"> 
       <div class="form-group">
            <label for="location" class="font-weight-bold"><h1>主儲放地點:</h1></label>
            <input type="text" class="form-control text-primary font-weight-bold badge-light input-lg" id="location" readonly value="{{ $sublocation->location->location }}">
        </div>
        <div class="form-group">
            <label for="sublocation"><h2>次儲放地點:</h2></label>
            <input type="text" class="form-control text-primary font-weight-bold badge-light input-lg" id="sublocation" readonly value="{{ $sublocation->sublocation }}">
        </div>
        <div class="form-group">
            <label for="sublocationNote"><h2>備注 (Note):</h2></label>
            <textarea class="form-control rounded-0 text-primary input-lg" id="sublocationNote" readonly rows="5"> {{ $sublocation->note }}</textarea>
        </div>
    </div>
@endsection