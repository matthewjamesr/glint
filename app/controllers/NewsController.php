<?php

namespace App\Controllers;

use App\Models\Country;
use App\Models\News;
use Leaf\Auth;
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
        Auth::guard('auth');
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

        Auth::guard('auth');

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

        if ($data['type'] == 'article') {
            $validatorSuccess = Form::validate([
                'type' => ['required', 'type'],
                'title' => ['required', 'text', 'max:60'],
                'description' => ['required', 'max:120'],
                'country' => ['required', 'country'],
                'markdown' => ['required']
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
                $row->save();
                Router::push('/'.strtolower($data['country']).'/'.str_replace(' ', '_', $data['title']));
            }
        }

        if ($data['type'] == 'video') {
            $validatorSuccess = Form::validate([
                'type' => ['required', 'type'],
                'country' => ['required', 'country'],
                'video_url' => ['required']
            ]);
              
            if (!$validatorSuccess) {
                response()->throwErr(Form::errors());
                Router::push("/");
            } else {  
                header('Content-Type: text/html; charset=ISO-8859-1');

                $video = $data['video_url'];
                $vString = explode("v=", $video);
                $video_id = $vString[1];

                $row = new News;

                $youtube_api_path = 
                    'https://www.googleapis.com/youtube/v3/videos?id=' 
                    . $video_id . '&key=' . getenv('YOUTUBE_API_KEY') . '&part=snippet';

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                /* Set the URL and options  */
                curl_setopt($ch, CURLOPT_URL, $youtube_api_path);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_VERBOSE, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $curlResource = curl_exec($ch);
                curl_close($ch);

                $youtubeData = json_decode($curlResource);
                $youtubeVals = json_decode(json_encode($youtubeData), true);

                $row->description = $youtubeVals['items'][0]['snippet']['title'];
                $row->type = 'video';
                $row->country = $data['country'];
                $row->video_url = $video;

                $youtube_api_path = 
                'https://www.googleapis.com/youtube/v3/channels?id=' 
                . $youtubeVals['items'][0]['snippet']['channelId'] . '&key=' . getenv('YOUTUBE_API_KEY') . '&part=snippet';

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                /* Set the URL and options  */
                curl_setopt($ch, CURLOPT_URL, $youtube_api_path);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_VERBOSE, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $curlResource = curl_exec($ch);
                curl_close($ch);

                $youtubeData = json_decode($curlResource);
                $youtubeVals = json_decode(json_encode($youtubeData), true);

                $row->title = $youtubeVals['items'][0]['snippet']['title'];
                $row->save();
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