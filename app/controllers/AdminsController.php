<?php

namespace App\Controllers;

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
}
