<?php

namespace App\Controllers\Auth;

use Leaf\Auth;

class RegisterController extends Controller
{
    public function show()
    {
        Auth::guard("guest");

        echo view("pages.auth.register");
    }
    
    public function store()
    {

        Auth::guard("guest");

        $credentials = request(["username", "email", "password"]);

        $validation = $this->form->validate([
            "username" => "validUsername",
            "email" => "email",
            "password" => "required"
        ]);

        if (!$validation) {
            // validation errors will be found in form->errors
            echo view("pages.auth.register", array_merge(
                ["errors" => array_merge(Auth::errors(), $this->form->errors())],
                $credentials
            ));
        } else {
            Auth::config("SESSION_ON_REGISTER", true);

            $user = Auth::register("users", $credentials, [
                "username", "email"
            ]);
    
            if (!$user) {
                echo view("pages.auth.register", array_merge(
                    ["errors" => array_merge(Auth::errors(), $this->form->errors())],
                    $credentials
                ));
            }
        }
    }
}
