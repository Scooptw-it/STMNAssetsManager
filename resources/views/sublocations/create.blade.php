<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>STMN Assets Manager</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1>Add a new sublocation:</h1>
            <hr />
            <form action="{{ route('sublocations.store') }}" method="POST"> 
                <!-- csrf will prevent cross-browser submission
                csrf_field() will create hidden field with token values in the form
                so the form can be submitted successfully to the database
                -->
                {{ csrf_field() }} 


                <div class="form-group">
                    <label for="location_id">Location</label>
                    <select name="location_id" id="location_id" class="form-control">
                    @foreach ($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->location }}</option>
                    @endforeach
                    </select>
                </div>
                <label for="sublocation">Sublocation: </label>
                <input type="text" name="sublocation" id="sublocation" class="form-control @error('location') is-invalid @enderror" />    
                @error('location')
                    <span class="invalid-feedback font-weight-bold text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <br /><br />
                <label for="note">More Information (Note): </label>
                <textarea class="form-control" name="note" id="note" rows="4"></textarea>
                <br />
                <input type="submit" class="" value="Add" />
            </form>
        </div> 

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>