<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;  //need to define path here so Location model can be referenced correctly

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //go to the model and get a group of records

        //return the view, and pass in the group of records to loop through
        //$loc = Location::all();  //retrieve all records

        //$loc = Location::paginate(3); this is the default pagination, order in ascending order

        //Order by will display the latest location entries first, in desc order
        $loc = Location::orderBy('id', 'desc')->paginate(3);  //retrieve records in paginations format, 3 per page.

        //return view('locations.index')->with('locations', $loc);
        return view('locations.index')->with('locations', $loc);
    }

    /**
     * Show the form for creating a new location
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //go to the view folder and look for locations folder and then
        //a file named create.blade.php
        return view('locations.create');  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the form date, and make this field required and set up max length to 255 varchar
        $this->validate($request, ['location'=>'required|max:255']);
          
        //$user = auth()->user();
        $loc = new Location();
        $loc->location = $request->location;
        $loc->note = $request->note;
        //$loc->create_user = $user->name;

        //if insert is successful then we want to redirect to view to show to the user
        if ($loc->save()){
            return redirect()->route('locations.show', $loc->id);
        }
        else {
            return redirect()->route('locations.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //use the model to get 1 record from the database

        //show the view and pass the record to the view
        $loc = Location::findOrFail($id); //In case the id is not found

        //return the view with some info, first parameter is the name of the data
        //we want to refer to. Second parameter is the actual data we want to pass into
        return view('locations.show')->with('location', $loc); 

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $location = Location::find($id); //In case the id is not found
        return view('locations.edit', compact('location')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $loc = Location::findOrFail($id); //In case the id is not found
        $this->validate($request, ['location'=>'required|max:255']);

        return view('locations.show')->with('location', $loc); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
