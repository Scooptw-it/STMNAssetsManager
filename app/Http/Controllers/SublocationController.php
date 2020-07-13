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
        //
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
        //$sublocation = Sublocation::findOrFail($id); //In case the id is not found

        //return the view with some info, first parameter is the name of the data
        //we want to refer to. Second parameter is the actual data we want to pass into
        //return view('sublocations.show')->with('sublocation', $sublocation); 

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
