<?php

namespace App\Controllers;

use App\Models\News;

class PagesController extends Controller
{
    public function index()
    {
        $news = News::limit(8)->orderBy('created_at', 'DESC')->get();
        echo view("pages.welcome", ['news' => $news]);
    }
}
