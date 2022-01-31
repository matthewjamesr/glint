<?php

namespace App\Controllers;

use App\Models\Country;
use App\Models\News;
use Leaf\Auth;
use Leaf\Flash;
use Leaf\Router;

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
        $type = request("type");

        echo view("pages.admin.content.add", [
            "countries" => Country::all(),
            "type" => $type
        ]);
    }

    public function contentStore () {
    }
}
