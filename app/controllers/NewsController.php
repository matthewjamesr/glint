<?php

namespace App\Controllers;

use App\Models\Country;
use App\Models\News;
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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();
        echo view('news.create', ['countries' => $countries]);
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

        $Parsedown = new Parsedown();
        $data = Form::body();

        Form::rule('country', function ($field, $value) {
            if (($value == 'Choose country')) {
                Form::addError($field, "$field is not selected");
                return false;
            }
        });

        Form::rule('type', function ($field, $value) {
            if (($value == 'Choose type')) {
                Form::addError($field, "$field is not selected");
                return false;
            }
        });

        $validatorSuccess = Form::validate([
            'type' => ['required', 'type'],
            'title' => ['required', 'text', 'max:60'],
            'description' => ['required', 'max:120'],
            'country' => ['required', 'country']
          ]);
          
          if (!$validatorSuccess) {
            response()->throwErr(Form::errors());
            Router::push("/");
          } else {
            $row = new News;
            $row->title = $data['title'];
            $row->description = $data['description'];
            $row->type = $data['type'];
            $row->country = $data['country'];
            $row->markdown = $data['markdown'];
            $row->processed_html = $Parsedown->text($data['markdown']);
            $row->video_url = $data['video_url'];
            $row->save();
            
            if ($data['type'] == 'article') {
                Router::push('/'.strtolower($data['country']).'/'.str_replace(' ', '_', $data['title']));
            }

            if ($data['type'] == 'video') {
                Router::push('/'.strtolower($data['country']));
            }
          }
    }

    /**
     * Display the specified resource.
     */
    public function showChina($title)
    {
        $title = str_replace('_', ' ', $title);
        $article = News::where(['country' => 'China', 'type' => 'article', 'title' => $title])->first();
        echo view('news.show', ['article' => $article]);
    }

    public function showDPRK($title)
    {
        $title = str_replace('_', ' ', $title);
        $article = News::where(['country' => 'DPRK', 'type' => 'article', 'title' => $title])->first();
        echo view('news.show', ['article' => $article]);
    }

    public function showRussia($title)
    {
        $title = str_replace('_', ' ', $title);
        $article = News::where(['country' => 'Russia', 'type' => 'article', 'title' => $title])->first();
        echo view('news.show', ['article' => $article]);
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