<?php

namespace App\Controllers;

use App\Models\Country;
use App\Models\News;
use Leaf\Auth;
use Leaf\Form;
use Leaf\Flash;
use Leaf\Router;
use Parsedown;

class AdminsController extends Controller
{
    public function dashboard()
    {
        Auth::guard("auth");

        $user = Auth::user("users", ["password"]);

        if ($user["admin_level"] >= 1) {
            echo view("pages.admin.dashboard", [
                "user" => $user
            ]);
        } else {
            Flash::set("You do not have the appropriate access for that resource.", "alert");
            Flash::set("warning", "alertType");
            Router::push("/");
        }
    }

    public function account()
    {
        Auth::guard("auth");

        $user = Auth::user("users", ["password"]);

        echo view("pages.admin.account", [
            "user" => $user,
            "keys" => array_keys($user)
        ]);
    }

    public function contentShow() {
        Auth::guard("auth");

        $user = Auth::user("users", ["password"]);
        $content = News::orderBy('created_at', 'DESC')->get();

        echo view("pages.admin.content.all", [
            "user" => $user,
            "content" => $content,
            "articleCount" => News::where(["type" => "article"])->count(),
            "videoCount" =>  News::where(["type" => "video"])->count(),
            "blipCount" =>  News::where(["type" => "blip"])->count()
        ]);
    }

    public function contentCreate () {
        $type = $_REQUEST["type"];

        echo view("pages.admin.content.add", [
            "countries" => Country::all(),
            "type" => $type
        ]);
    }

    public function contentStore () {
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
                //Flash::set("You must have missed something:" . json_encode(Form::errors()), "alert");
                //Flash::set("warning", "alertType");
                //Router::push("/dashboard/content/new?type=article");
                echo view('pages.admin.content.add', [
                    "countries" => Country::all(),
                    "type" => "article",
                    "alert" => Form::errors(),
                    "alertType" => "warning",
                    "data" => $data,
                    "errors" => Form::errors()
                ]);
            } else {            
                $row = new News;
                $row->title = $data['title'];
                $row->description = $data['description'];
                $row->type = $data['type'];
                $row->country = $data['country'];
                $row->markdown = $data['markdown'];
                $row->processed_html = $Parsedown->text($data['markdown']);
                $row->author = auth()->id();
                if ($data['command'] == 'publish') {
                    $row->published = true;
                }
                $row->save();
                Router::push('/dashboard/content');
            }
        }

        if ($data['type'] == 'video') {
            $validatorSuccess = Form::validate([
                'type' => ['required', 'type'],
                'country' => ['required', 'country'],
                'video_url' => ['required']
            ]);
              
            if (!$validatorSuccess) {
                echo view('pages.admin.content.add', [
                    "countries" => Country::all(),
                    "type" => "video",
                    "alert" => Form::errors(),
                    "alertType" => "warning",
                    "data" => $data,
                    "errors" => Form::errors()
                ]);
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
                $row->author = auth()->id();
                if ($data['command'] == 'publish') {
                    $row->published = true;
                }
                $row->save();
                Router::push('/dashboard/content');
            }
        }
    }
}
