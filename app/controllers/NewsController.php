<?php

namespace App\Controllers;

use App\Models\News;

class NewsController extends Controller
{    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        |
        | This is an example which retrieves all the data (rows)
        | from our model. You can un-comment it to use this
        | example
        |
        */
        // response(News::all());
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
        // $row = new News;
        // $row->column = requestData("column");
        // $row->delete();
    }

    /**
     * Display the specified resource.
     */
    public function showChina($title)
    {
        $title = str_replace('_', ' ', $title);
        $article = News::where(['country' => 'China', 'type' => 'article', 'title' => $title])->first();
        echo view("news.show", ['article' => $article]);
    }

    public function showDPRK($title)
    {
        $title = str_replace('_', ' ', $title);
        $article = News::where(['country' => 'DPRK', 'type' => 'article', 'title' => $title])->first();
        echo view("news.show", ['article' => $article]);
    }

    public function showRussia($title)
    {
        $title = str_replace('_', ' ', $title);
        $article = News::where(['country' => 'Russia', 'type' => 'article', 'title' => $title])->first();
        echo view("news.show", ['article' => $article]);
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
        // $row = News::find($id);
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
        // $row = News::find($id);
        // $row->delete();
    }
}