<?php

namespace App\Controllers;

class PagesController extends Controller
{
    public function index()
    {
        echo view("pages.welcome");
    }
}
