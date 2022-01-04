<?php

namespace App\Controllers;

use App\Models\Country;

class CountriesController extends Controller
{    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        echo view("countries.all", ['countries' => Country::orderBy('country', 'asc')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        /*
        |--------------------------------------------------------------------------
        |
        | This is an example which deletes a particular row. 
        | You can un-comment it to use this example
        |
        */
        // $row = new Country;
        // $row->column = requestData("column");
        // $row->delete();
    }

    /**
     * Display the specified resource.
     */
    public function show($name)
    {
        $id = Country::where('country', $name)->first();
        $row = Country::find($id["id"]);
        echo view("countries.show", ['country' => $row]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        /*
        |--------------------------------------------------------------------------
        |
        | This is an example which edits a particular row. 
        | You can un-comment it to use this example
        |
        */
        // $row = Country::find($id);
        // $row->column = requestData("column");
        // $row->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        /*
        |--------------------------------------------------------------------------
        |
        | This is an example which deletes a particular row. 
        | You can un-comment it to use this example
        |
        */
        // $row = Country::find($id);
        // $row->delete();
    }
}