<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\Sublocation;

class SublocationController extends Controller
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
        $sublocation = Sublocation::all();  //retrieve all records

        //$loc = Location::paginate(3); this is the default pagination, order in ascending order

        //Order by will display the latest location entries first, in desc order
        //$loc = Location::orderBy('id', 'desc')->paginate(3);  //retrieve records in paginations format, 3 per page.

        //return view('locations.index')->with('locations', $loc);
        return view('sublocations.index')->with('sublocations', $sublocation);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::all();

        //go to the view folder and look for locations folder and then
        //a file named create.blade.php
        return view('sublocations.create', compact('locations'));  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['sublocation'=>'required|max:255']);

        $sublocation = new Sublocation();
        $sublocation->location_id = $request->location_id;
        $sublocation->sublocation = $request->sublocation;
        $sublocation->note = $request->note;

        //if insert is successful then we want to redirect to view to show to the user
        if ($sublocation->save()){
            return redirect()->route('sublocations.show', $sublocation->id);
        }
        else {
            return redirect()->route('sublocations.create');
        }

        //Sublocation::create($validatedData);
        return redirect()->back()->with('message', 'Sublocation created!');
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
        $sublocation = Sublocation::findOrFail($id); //In case the id is not found
        $location = Sublocation::findOrFail($sublocation->location_id);

        //return the view with some info, first parameter is the name of the data
        //we want to refer to. Second parameter is the actual data we want to pass into
        //return view('sublocations.show')->with('sublocation', $sublocation); 
        return view('sublocations.show', compact('sublocation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //edit sublocation
        $sublocation = Sublocation::findOrFail($id); //In case the id is not found
        return view('sublocations.edit', compact('sublocation')); 
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
        $sublocation = Sublocation::findOrFail($id); //In case the id is not found
        $this->validate($request, ['sublocation'=>'required|max:255']);

        $sublocation->sublocation = $request->get('sublocation');
        $sublocation->note = $request->get('note'); 
        $sublocation->save();

        return redirect()->route('sublocations.index')->with('message', 'Sublocation Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete a sublocation
        $sublocation = Sublocation::findOrFail($id); //In case the id is not found
        $sublocation->delete();

        return redirect()->route('sublocations.index')->with('message', 'Sublocation Deleted.');
    }
}
