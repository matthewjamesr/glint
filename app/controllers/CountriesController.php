<?php

namespace App\Controllers;

use App\Models\Country;
use App\Models\News;

use Leaf\Auth;

class CountriesController extends Controller
{    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->status()) {
            $user = Auth::user("users", ["password"]);
            echo view("countries.all", ['user' => $user, 'countries' => Country::orderBy('country', 'asc')->get()]);
        } else {
            echo view("countries.all", ['countries' => Country::orderBy('country', 'asc')->get()]);
        }
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
    public function showChina()
    {
        $name = 'China';
        $country = Country::where('country', $name)->first();
        $row = Country::find($country["id"]);

        $articles = News::where(['country' => $name, 'type' => 'article', 'published' => true])->take(10)->orderBy('created_at', 'DESC')->get();
        $blips = News::where(['country' => $name, 'type' => 'blip', 'published' => true])->take(10)->orderBy('created_at', 'DESC')->get();
        $videos = News::where(['country' => $name, 'type' => 'video', 'published' => true])->take(10)->orderBy('created_at', 'DESC')->get();

        if (auth()->status()) {
            $user = Auth::user("users", ["password"]);
            echo view("countries.show", ['user' => $user, 'country' => $row, 'articles' => $articles, 'blips' => $blips, 'videos' => $videos]);
        } else {
            echo view("countries.show", ['country' => $row, 'articles' => $articles, 'blips' => $blips, 'videos' => $videos]);
        }
    }

    public function showDPRK()
    {
        $name = 'DPRK';
        $country = Country::where('country', $name)->first();
        $row = Country::find($country["id"]);

        $articles = News::where(['country' => $name, 'type' => 'article', 'published' => true])->take(10)->orderBy('created_at', 'DESC')->get();
        $blips = News::where(['country' => $name, 'type' => 'blip', 'published' => true])->take(10)->orderBy('created_at', 'DESC')->get();
        $videos = News::where(['country' => $name, 'type' => 'video', 'published' => true])->take(10)->orderBy('created_at', 'DESC')->get();

        if (auth()->status()) {
            $user = Auth::user("users", ["password"]);
            echo view("countries.show", ['user' => $user, 'country' => $row, 'articles' => $articles, 'blips' => $blips, 'videos' => $videos]);
        } else {
            echo view("countries.show", ['country' => $row, 'articles' => $articles, 'blips' => $blips, 'videos' => $videos]);
        }
    }

    public function showRussia()
    {
        $name = 'Russia';
        $country = Country::where('country', $name)->first();
        $row = Country::find($country["id"]);

        $articles = News::where(['country' => $name, 'type' => 'article', 'published' => true])->take(10)->orderBy('created_at', 'DESC')->get();
        $blips = News::where(['country' => $name, 'type' => 'blip', 'published' => true])->take(10)->orderBy('created_at', 'DESC')->get();
        $videos = News::where(['country' => $name, 'type' => 'video', 'published' => true])->take(10)->orderBy('created_at', 'DESC')->get();

        if (auth()->status()) {
            $user = Auth::user("users", ["password"]);
            echo view("countries.show", ['user' => $user, 'country' => $row, 'articles' => $articles, 'blips' => $blips, 'videos' => $videos]);
        } else {
            echo view("countries.show", ['country' => $row, 'articles' => $articles, 'blips' => $blips, 'videos' => $videos]);
        }
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