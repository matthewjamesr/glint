<?php

namespace App\Controllers\Auth;

use Leaf\Auth;
use Leaf\Router;

class AccountController extends Controller
{
    public function user()
    {
        Auth::guard("auth");

        $user = Auth::user("users", ["password"]);

        if (!$user) {
            Session::destroy("GUARD_LOGIN");
        }

        echo view("pages.auth.account", [
            "user" => $user,
            "keys" => array_keys($user),
        ]);
    }

    public function show_update()
    {
        Auth::guard("auth");

        $user = Auth::user();

        echo view("pages.auth.update", [
            "user" => Auth::id(),
            "username" => $user["username"] ?? null,
            "email" => $user["email"] ?? null,
            "fullname" => $user["fullname"] ?? null,
        ]);
    }

    public function update()
    {
        Auth::guard("auth");

        $userId = Auth::id();

        $credentials = request()->try(["username", "email", "fullname"]);
        $dataKeys = array_keys($credentials);

        $where = ["id" => $userId];

        $uniques = ["username", "email"];

        foreach ($uniques as $key => $unique) {
            if (!isset($credentials[$unique])) {
                unset($uniques[$key]);
            }
        }

        $user = Auth::update("users", $credentials, $uniques);

        if (!$user) {
            echo view("pages.auth.update", [
                "errors" => Auth::errors(),
                "username" => $credentials["username"] ?? null,
                "email" => $credentials["email"] ?? null,
                "fullname" => $credentials["fullname"] ?? null,
            ]);
        }

        Router::push("/user");
    }
}
