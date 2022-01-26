<?php

namespace App\Controllers;

use App\Models\News;
use Leaf\Auth;
use Leaf\Auth\Session;

class PagesController extends Controller
{
    public function index()
    {
        if (auth()->status()) {
            $user = Auth::user("users", ["password"]);
            $news = News::limit(9)->orderBy('created_at', 'DESC')->get();
            echo view("pages.welcome", ['user' => $user, 'news' => $news]);
        } else {
            $news = News::limit(9)->orderBy('created_at', 'DESC')->get();
            echo view("pages.welcome", ['news' => $news]);
        }
    }
}
