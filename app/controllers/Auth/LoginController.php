<?php

namespace App\Controllers\Auth;

use App\Models\User;
use Leaf\Auth;
use Leaf\Http\Session;
use Leaf\Router;

class LoginController extends Controller
{
    public function show()
    {
        Auth::guard("guest");

        echo view("pages.auth.login");
    }

    public function store()
    {
        Auth::guard("guest");

        $credentials = request(["username", "password"]);

        $this->form->validate([
            "username" => "validUsername",
            "password" => "required"
        ]);

        $user = Auth::login("users", $credentials, [
            "username", "password"
        ]);
        
        if (!$user) {
            echo view("pages.auth.login", array_merge(
                ["errors" => array_merge(Auth::errors(), $this->form->errors())],
                $credentials
            ));
        }
    }

    public function logout()
    {
        Auth::guard("auth");

        Session::destroy();
        Router::push("/");
    }
}

