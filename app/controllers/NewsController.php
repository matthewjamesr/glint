<?php

namespace App\Controllers;

use App\Models\Country;
use App\Models\News;
use Leaf\Auth;
use Leaf\Flash;
use Leaf\Form;
use Leaf\Router;
use Parsedown;

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
     * Display the specified resource.
     */
    public function showChina($title)
    {
        $title = str_replace('_', ' ', $title);
        $article = News::where(['country' => 'China', 'type' => 'article', 'title' => $title])->first();

        if (auth()->status()) {
            $user = Auth::user("users", ["password"]);
            echo view('news.show', ['user' => $user, 'article' => $article]);
        } else {
            echo view('news.show', ['article' => $article]);
        }
    }

    public function showDPRK($title)
    {
        $title = str_replace('_', ' ', $title);
        $article = News::where(['country' => 'DPRK', 'type' => 'article', 'title' => $title])->first();
        
        if (auth()->status()) {
            $user = Auth::user("users", ["password"]);
            echo view('news.show', ['user' => $user, 'article' => $article]);
        }

        if (!$article->published && !auth()->status()) {
            Flash::set("That content isn't quiet ready yet.", "alert");
            Flash::set("warning", "alertType");
            Router::push("/");
        }

        if ($article->published) {
            echo view('news.show', ['user' => $user, 'article' => $article]);
        }
    }

    public function showRussia($title)
    {
        $title = str_replace('_', ' ', $title);
        $article = News::where(['country' => 'Russia', 'type' => 'article', 'title' => $title])->first();
        
        if (auth()->status()) {
            $user = Auth::user("users", ["password"]);
            echo view('news.show', ['user' => $user, 'article' => $article]);
        } else {
            echo view('news.show', ['article' => $article]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        Auth::guard('auth');
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

        Auth::guard('auth');
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

        Auth::guard('auth');
    }
}